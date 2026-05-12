<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\CustomerQuotation;
use App\Models\backend\QuotationItem;
use App\Models\backend\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class CustomerQuotationController
{
    protected $userId;
    protected $table;
    protected $module;
    /** @var string Blade view folder under resources/views/backend (kept separate from route name prefix). */
    protected $viewModule;
    protected $notify_title;

    public function __construct()
    {
        $this->userId = currentUserId(); // global helper
        $this->table = CustomerQuotation::class;
        $this->module = 'quotations';
        $this->viewModule = 'customer-quotations';
        $this->notify_title = 'Customer Quotation';
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $moduleName = collect($segments)->last();
        $moduleTitle = 'Customer Quotation';

        $getData = ($this->table)::with('creator', 'items')->latest()->get();
        $columns = [
            'id',
            'quotation_number',
            'client_name',
            'client_email',
            'quotation_date',
            'valid_until',
            'total',
            'tax_rate',
            'tax_amount',
            'status',
            'created_at',
            'created_by'
        ];

        // columns to hide
        $hiddenColumns = [
            'id',
            'tax_amount',
            'valid_until',
            'quotation_date',
            'created_by',
            'client_email'
        ];

        return view('backend.' . $this->viewModule . '.listing', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'moduleName'       => $moduleName,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
            'meta_title'       => "Customer Quotations List | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function create(Request $request)
    {
        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 2] ?? null;
        $moduleTitle = 'Customer Quotation';

        $getStatus = ['draft', 'sent', 'accepted', 'rejected', 'expired'];
        $quotationNumber = CustomerQuotation::generateQuotationNumber('sales');
        $currencies = ['USD' => '$', 'AED' => 'AED', 'EUR' => '€', 'GBP' => '£'];

        return view('backend.' . $this->viewModule . '.form', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'getStatus'        => $getStatus,
            'quotationNumber'  => $quotationNumber,
            'currencies'       => $currencies,
            'meta_title'       => "Create New Customer Quotation | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function store(Request $request)
    {
        $action = $request->submitBtn;

        // Generate quotation number based on invoice type
        $invoiceType = $request->invoice_type ?? 'sales';
        $quotationNumber = CustomerQuotation::generateQuotationNumber($invoiceType);

        // Update the request with the generated quotation number
        $request->merge(['quotation_number' => $quotationNumber]);

        $validator = Validator::make($request->all(), [
            'quotation_number' => 'required|unique:customer_quotations,quotation_number',
            'client_name' => 'required|string|max:255',
            'client_email' => 'nullable|email',
            'quotation_date' => 'required|date',
            'valid_until' => 'required|date|after_or_equal:quotation_date',
            'status' => 'required|in:draft,sent,accepted,rejected,expired',
            'currency' => 'required|in:USD,AED,EUR,GBP',
            'items.*.item_name' => 'required|string',
            'items.*.quantity' => 'required|numeric|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
            'letterhead' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'signature' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'stamp' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors.');
        }

        try {
            DB::beginTransaction();

            // Calculate totals
            $subtotal = 0;
            if ($request->has('items')) {
                foreach ($request->items as $item) {
                    $itemAmount = $item['quantity'] * $item['unit_price'];
                    // Apply item discount if present
                    if (isset($item['discount']) && $item['discount'] > 0) {
                        $itemAmount -= $item['discount'];
                    }
                    $subtotal += $itemAmount;
                }
            }

            $taxAmount = ($subtotal * ($request->tax_rate ?? 0)) / 100;
            $vatAmount = ($subtotal * ($request->vat_rate ?? 0)) / 100;
            $total = $subtotal + $taxAmount + $vatAmount - ($request->discount ?? 0);

            // Handle file uploads
            $letterheadPath = null;
            $signaturePath = null;
            $stampPath = null;

            if ($request->hasFile('letterhead')) {
                $letterheadPath = imageHandling($request, null, 'letterhead', 'quo-assets');
            }
            if ($request->hasFile('signature')) {
                $signaturePath = imageHandling($request, null, 'signature', 'quo-assets');
            }
            if ($request->hasFile('stamp')) {
                $stampPath = imageHandling($request, null, 'stamp', 'quo-assets');
            }

            // Create quotation
            $quotation = CustomerQuotation::create([
                'quotation_number' => $request->quotation_number,
                'client_name' => $request->client_name,
                'client_email' => $request->client_email,
                'client_phone' => $request->client_phone,
                'client_address' => $request->client_address,
                'quotation_date' => $request->quotation_date,
                'valid_until' => $request->valid_until,
                'status' => $request->status,
                'currency' => $request->currency ?? 'USD',
                'subtotal' => $subtotal,
                'tax_rate' => $request->tax_rate ?? 0,
                'tax_amount' => $taxAmount,
                'vat_rate' => $request->vat_rate ?? 0,
                'vat_amount' => $vatAmount,
                'discount' => $request->discount ?? 0,
                'total' => $total,
                'notes' => $request->notes,
                'terms' => $request->terms,
                'letterhead' => $letterheadPath,
                'signature' => $signaturePath,
                'stamp' => $stampPath,
                'show_discount' => $request->has('show_discount') ? 1 : 0,
                'show_tax' => $request->has('show_tax') ? 1 : 0,
                'show_vat' => $request->has('show_vat') ? 1 : 0,
                'created_by' => $this->userId,
            ]);

            // Create quotation items
            if ($request->has('items')) {
                foreach ($request->items as $item) {
                    $itemAmount = $item['quantity'] * $item['unit_price'];
                    $itemDiscount = $item['discount'] ?? 0;
                    if ($itemDiscount > 0) {
                        $itemAmount -= $itemDiscount;
                    }

                    QuotationItem::create([
                        'quotation_id' => $quotation->id,
                        'item_name' => $item['item_name'],
                        'description' => $item['description'] ?? null,
                        'quantity' => $item['quantity'],
                        'discount' => $itemDiscount,
                        'discount_type' => $item['discount_type'] ?? 0,
                        'unit_price' => $item['unit_price'],
                        'amount' => $itemAmount,
                    ]);
                }
            }

            DB::commit();

            // Success message
            $successMessage = $this->notify_title . ' Created successfully!';

            if ($action === 'save_new') {
                return to_route($this->module.'.create')->with('success', $successMessage);
            } elseif ($action === 'save_stay') {
                return to_route($this->module.'.edit', $quotation->id)->with('success', $successMessage);
            } else {
                return redirect()->route($this->module)->with('success', $successMessage);
            }

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error creating quotation: ' . $e->getMessage());
        }
    }

    public function duplicate($id)
    {
        $source = ($this->table)::withTrashed()->with('items')->findOrFail($id);

        $copyAsset = function (?string $filename, string $folder): ?string {
            if (empty($filename)) {
                return null;
            }
            $dir = public_path('assets/images/' . $folder);
            $src = $dir . DIRECTORY_SEPARATOR . $filename;
            if (!File::exists($src)) {
                return null;
            }
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $newName = uniqid('dup_', true) . ($ext !== '' ? '.' . $ext : '');
            File::copy($src, $dir . DIRECTORY_SEPARATOR . $newName);

            return $newName;
        };

        try {
            DB::beginTransaction();

            $quotationNumber = CustomerQuotation::generateQuotationNumber();

            $quotation = CustomerQuotation::create([
                'quotation_number' => $quotationNumber,
                'client_name'      => $source->client_name,
                'client_email'     => $source->client_email,
                'client_phone'     => $source->client_phone,
                'client_address'   => $source->client_address,
                'quotation_date'   => $source->quotation_date,
                'valid_until'      => $source->valid_until,
                'status'           => $source->status,
                'currency'         => $source->currency,
                'subtotal'         => $source->subtotal,
                'tax_rate'         => $source->tax_rate,
                'tax_amount'       => $source->tax_amount,
                'vat_rate'         => $source->vat_rate,
                'vat_amount'       => $source->vat_amount,
                'discount'         => $source->discount,
                'total'            => $source->total,
                'notes'            => $source->notes,
                'terms'            => $source->terms,
                'letterhead'       => $copyAsset($source->letterhead, 'quo-assets'),
                'signature'        => $copyAsset($source->signature, 'quo-assets'),
                'stamp'            => $copyAsset($source->stamp, 'quo-assets'),
                'show_discount'    => $source->show_discount,
                'show_tax'         => $source->show_tax,
                'show_vat'         => $source->show_vat,
                'created_by'       => $this->userId,
            ]);

            foreach ($source->items as $item) {
                QuotationItem::create([
                    'quotation_id'  => $quotation->id,
                    'item_name'     => $item->item_name,
                    'description'   => $item->description,
                    'quantity'      => $item->quantity,
                    'discount'      => $item->discount,
                    'discount_type' => $item->discount_type,
                    'unit_price'    => $item->unit_price,
                    'amount'        => $item->amount,
                ]);
            }

            DB::commit();

            return redirect()
                ->route($this->module . '.edit', $quotation->id)
                ->with('success', $this->notify_title . ' duplicated as ' . $quotationNumber . '. Review dates and status.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()
                ->route($this->module)
                ->with('error', 'Could not duplicate quotation: ' . $e->getMessage());
        }
    }

    public function editForm($id)
    {
        $getData = ($this->table)::with('items')->findOrFail($id);
        $getStatus = ['draft', 'sent', 'accepted', 'rejected', 'expired'];
        $currencies = ['USD' => '$', 'AED' => 'AED', 'EUR' => '€', 'GBP' => '£'];

        return view('backend.' . $this->viewModule . '.edit', [
            'title'            => 'Customer Quotation',
            'module'           => $this->module,
            'getData'          => $getData,
            'getStatus'        => $getStatus,
            'currencies'       => $currencies,
            'meta_title'       => "Edit Customer Quotation | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function update(Request $request, $id)
    {
        $action = $request->submitBtn;

        $validator = Validator::make($request->all(), [
            'quotation_number' => 'required|unique:customer_quotations,quotation_number,' . $id,
            'client_name' => 'required|string|max:255',
            'client_email' => 'nullable|email',
            'quotation_date' => 'required|date',
            'valid_until' => 'required|date|after_or_equal:quotation_date',
            'status' => 'required|in:draft,sent,accepted,rejected,expired',
            'currency' => 'required|in:USD,AED,EUR,GBP',
            'items.*.item_name' => 'required|string',
            'items.*.quantity' => 'required|numeric|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
            'letterhead' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'signature' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'stamp' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fix the validation errors.');
        }

        try {
            DB::beginTransaction();

            $quotation = CustomerQuotation::findOrFail($id);

            // Calculate totals
            $subtotal = 0;
            if ($request->has('items')) {
                foreach ($request->items as $item) {
                    $itemAmount = $item['quantity'] * $item['unit_price'];
                    // Apply item discount if present
                    if (isset($item['discount']) && $item['discount'] > 0) {
                        $itemAmount -= $item['discount'];
                    }
                    $subtotal += $itemAmount;
                }
            }

            $taxAmount = ($subtotal * ($request->tax_rate ?? 0)) / 100;
            $vatAmount = ($subtotal * ($request->vat_rate ?? 0)) / 100;
            $total = $subtotal + $taxAmount + $vatAmount - ($request->discount ?? 0);

            // Handle file uploads
            $letterheadPath = $quotation->letterhead;
            $signaturePath = $quotation->signature;
            $stampPath = $quotation->stamp;

            // Handle letterhead removal
            if ($request->input('remove_letterhead') == '1') {
                if ($letterheadPath && file_exists(getPublicAssetPath('assets/images/quo-assets/' . $letterheadPath))) {
                    unlink(getPublicAssetPath('assets/images/quo-assets/' . $letterheadPath));
                }
                $letterheadPath = null;
            } elseif ($request->hasFile('letterhead')) {
                // Delete old file if exists
                if ($letterheadPath && file_exists(getPublicAssetPath('assets/images/quo-assets/' . $letterheadPath))) {
                    unlink(getPublicAssetPath('assets/images/quo-assets/' . $letterheadPath));
                }
                $letterheadPath = imageHandling($request, null, 'letterhead', 'quo-assets');
            }

            // Handle signature removal
            if ($request->input('remove_signature') == '1') {
                if ($signaturePath && file_exists(getPublicAssetPath('assets/images/quo-assets/' . $signaturePath))) {
                    unlink(getPublicAssetPath('assets/images/quo-assets/' . $signaturePath));
                }
                $signaturePath = null;
            } elseif ($request->hasFile('signature')) {
                // Delete old file if exists
                if ($signaturePath && file_exists(getPublicAssetPath('assets/images/quo-assets/' . $signaturePath))) {
                    unlink(getPublicAssetPath('assets/images/quo-assets/' . $signaturePath));
                }
                $signaturePath = imageHandling($request, null, 'signature', 'quo-assets');
            }

            // Handle stamp removal
            if ($request->input('remove_stamp') == '1') {
                if ($stampPath && file_exists(getPublicAssetPath('assets/images/quo-assets/' . $stampPath))) {
                    unlink(getPublicAssetPath('assets/images/quo-assets/' . $stampPath));
                }
                $stampPath = null;
            } elseif ($request->hasFile('stamp')) {
                // Delete old file if exists
                if ($stampPath && file_exists(getPublicAssetPath('assets/images/quo-assets/' . $stampPath))) {
                    unlink(getPublicAssetPath('assets/images/quo-assets/' . $stampPath));
                }
                $stampPath = imageHandling($request, null, 'stamp', 'quo-assets');
            }

            // Update quotation
            $quotation->update([
                'quotation_number' => $request->quotation_number,
                'client_name' => $request->client_name,
                'client_email' => $request->client_email,
                'client_phone' => $request->client_phone,
                'client_address' => $request->client_address,
                'quotation_date' => $request->quotation_date,
                'valid_until' => $request->valid_until,
                'status' => $request->status,
                'currency' => $request->currency ?? 'USD',
                'subtotal' => $subtotal,
                'tax_rate' => $request->tax_rate ?? 0,
                'tax_amount' => $taxAmount,
                'vat_rate' => $request->vat_rate ?? 0,
                'vat_amount' => $vatAmount,
                'discount' => $request->discount ?? 0,
                'total' => $total,
                'notes' => $request->notes,
                'terms' => $request->terms,
                'letterhead' => $letterheadPath,
                'signature' => $signaturePath,
                'stamp' => $stampPath,
                'show_discount' => $request->has('show_discount') ? 1 : 0,
                'show_tax' => $request->has('show_tax') ? 1 : 0,
                'show_vat' => $request->has('show_vat') ? 1 : 0,
            ]);

            // Delete old items and create new ones
            QuotationItem::where('quotation_id', $quotation->id)->delete();

            if ($request->has('items')) {
                foreach ($request->items as $item) {
                    $itemAmount = $item['quantity'] * $item['unit_price'];
                    $itemDiscount = $item['discount'] ?? 0;
                    if ($itemDiscount > 0) {
                        $itemAmount -= $itemDiscount;
                    }

                    QuotationItem::create([
                        'quotation_id' => $quotation->id,
                        'item_name' => $item['item_name'],
                        'description' => $item['description'] ?? null,
                        'quantity' => $item['quantity'],
                        'discount' => $itemDiscount,
                        'discount_type' => $item['discount_type'] ?? 0,
                        'unit_price' => $item['unit_price'],
                        'amount' => $itemAmount,
                    ]);
                }
            }

            DB::commit();

            if ($action === 'save_new') {
                return to_route($this->module.'.create')->with('success', $this->notify_title . ' updated Successfully.');
            } elseif ($action === 'save_stay') {
                return to_route($this->module.'.edit', $quotation->id)->with('success', $this->notify_title . ' updated successfully.');
            } else {
                return redirect()->route($this->module)->with('success', $this->notify_title . ' updated successfully!');
            }

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error updating quotation: ' . $e->getMessage());
        }
    }

    public function view($id)
    {
        $getData = ($this->table)::with('items', 'creator')->findOrFail($id);

        return view('backend.' . $this->viewModule . '.view', [
            'title'            => 'Customer Quotation',
            'module'           => $this->module,
            'getData'          => $getData,
            'meta_title'       => "View Customer Quotation | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function deleteAjax($id)
    {
        try {
            $record = ($this->table)::findOrFail($id);
            $record->delete();

            return response()->json([
                'success' => true,
                'message' => $this->notify_title . ' deleted successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting ' . $this->notify_title
            ], 500);
        }
    }

    public function deleteAll(Request $request)
    {
        $selectedIds = $request->ids; // array of IDs
        $trashed = $request->trashed;

        if (is_array($selectedIds) && count($selectedIds)) {
            if ($trashed === 'trashed') {
                ($this->table)::withTrashed()->whereIn('id', $request->ids)->forceDelete();
                return redirect()->route($this->module)->with('success', 'Selected ' . $this->notify_title . ' permanently deleted!');
            }

            ($this->table)::whereIn('id', $selectedIds)->delete();
            return redirect()->route($this->module)->with('success', 'Selected ' . $this->notify_title . ' deleted successfully.');
        }

        return redirect()->route($this->module)->with('error', $this->notify_title . ' not selected.');

    }

    public function updateStatusAjax(Request $request, $id)
    {
        try {
            $record = ($this->table)::findOrFail($id);
            $record->status = $request->status;
            $record->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Status updated successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error updating status'
            ], 500);
        }
    }

    public function trashed(Request $request)
    {
        $segments = $request->segments();
        $trashed = collect($segments)->last();
        $moduleName = $segments[count($segments) - 2] ?? null;
        $moduleTitle = 'Customer Quotation';

        $getData = ($this->table)::onlyTrashed()->with('creator')->latest()->get();
        $columns = [
            'quotation_number',
            'client_name',
            'quotation_date',
            'valid_until',
            'total',
            'status',
            'deleted_at'
        ];

        $hiddenColumns = [];

        return view('backend.' . $this->viewModule . '.listing', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'moduleName'       => $moduleName,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
            'moduleName'       => $trashed,
            'meta_title'       => "Trashed Customer Quotations | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function restore($id)
    {
        try {
            $record = ($this->table)::onlyTrashed()->findOrFail($id);
            $record->restore();

            return redirect()->back()->with('success', $this->notify_title . ' restored successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error restoring ' . $this->notify_title);
        }
    }

    public function forceDelete($id)
    {
        try {
            $record = ($this->table)::onlyTrashed()->findOrFail($id);
            $record->forceDelete();

            return redirect()->back()->with('success', $this->notify_title . ' permanently deleted!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting ' . $this->notify_title);
        }
    }

    public function modalView($id)
    {
        $getData = ($this->table)::with('items')->findOrFail($id);
        return view('backend.components.viewModal', [
            'getData' => $getData,
            'module' => $this->module
        ]);
    }

    public function downloadPdf($id)
    {
        $getData = ($this->table)::with('items', 'creator')->findOrFail($id);

        // Get currency symbol
        $currencySymbols = [
            'USD' => '$',
            'AED' => 'AED',
            'EUR' => '€',
            'GBP' => '£'
        ];
        $currencySymbol = $currencySymbols[$getData->currency] ?? '$';

        $pdf = Pdf::loadView('backend.customer-quotations.pdf', [
            'getData' => $getData,
            'currencySymbol' => $currencySymbol
        ]);

        // Set paper size and orientation
        $pdf->setPaper('A4', 'portrait');

        return $pdf->download($getData->quotation_number . '.pdf');
    }
}






