<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\CustomerInvoice;
use App\Models\backend\InvoiceItem;
use App\Models\backend\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class CustomerInvoiceController
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
        $this->table = CustomerInvoice::class;
        $this->module = 'invoices';
        $this->viewModule = 'customer-invoices';
        $this->notify_title = 'Customer Invoice';
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $moduleName = collect($segments)->last();
        $moduleTitle = 'Customer Invoice';

        $getData = ($this->table)::with('creator', 'items')->latest()->get();
        $columns = [
            'id',
            'invoice_number',
            'client_name',
            'client_email',
            'invoice_date',
            'due_date',
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
            'due_date',
            'invoice_date',
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
            'meta_title'       => "Customer Invoices List | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function create(Request $request)
    {
        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 2] ?? null;
        $moduleTitle = 'Customer Invoice';

        $getStatus = ['draft', 'sent', 'paid', 'overdue', 'cancelled'];
        $invoiceTypes = ['sales' => 'Sales Invoice', 'purchase' => 'Purchase Invoice'];
        $paymentStatus = ['Paid', 'Unpaid'];
        $invoiceNumber = CustomerInvoice::generateInvoiceNumber('sales');
        $currencies = ['USD' => '$', 'AED' => 'AED', 'EUR' => '€', 'GBP' => '£'];

        return view('backend.' . $this->viewModule . '.form', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'getStatus'        => $getStatus,
            'invoiceTypes'     => $invoiceTypes,
            'paymentStatus'    => $paymentStatus,
            'invoiceNumber'    => $invoiceNumber,
            'currencies'       => $currencies,
            'meta_title'       => "Create New Customer Invoice | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function store(Request $request)
    {
        $action = $request->submitBtn;

        // Generate invoice number based on invoice type
        $invoiceType = $request->invoice_type ?? 'sales';
        $invoiceNumber = CustomerInvoice::generateInvoiceNumber($invoiceType);

        // Update the request with the generated invoice number
        $request->merge(['invoice_number' => $invoiceNumber]);

        $validator = Validator::make($request->all(), [
            'invoice_number' => 'required|unique:customer_invoices,invoice_number',
            'invoice_type' => 'required|in:sales,purchase',
            'client_name' => 'required|string|max:255',
            'client_email' => 'nullable|email',
            'invoice_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:invoice_date',
            'status' => 'required|in:draft,sent,paid,overdue,cancelled',
            'payment_status' => 'required|in:Paid,Unpaid',
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
                $letterheadPath = imageHandling($request, null, 'letterhead', 'inv-assets');
            }
            if ($request->hasFile('signature')) {
                $signaturePath = imageHandling($request, null, 'signature', 'inv-assets');
            }
            if ($request->hasFile('stamp')) {
                $stampPath = imageHandling($request, null, 'stamp', 'inv-assets');
            }

            // Create invoice
            $invoice = CustomerInvoice::create([
                'invoice_number' => $request->invoice_number,
                'invoice_type' => $request->invoice_type,
                'client_name' => $request->client_name,
                'client_email' => $request->client_email,
                'client_phone' => $request->client_phone,
                'client_address' => $request->client_address,
                'invoice_date' => $request->invoice_date,
                'due_date' => $request->due_date,
                'status' => $request->status,
                'payment_status' => $request->payment_status ?? 'Paid',
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

            // Create invoice items
            if ($request->has('items')) {
                foreach ($request->items as $item) {
                    $itemAmount = $item['quantity'] * $item['unit_price'];
                    $itemDiscount = $item['discount'] ?? 0;
                    if ($itemDiscount > 0) {
                        $itemAmount -= $itemDiscount;
                    }

                    InvoiceItem::create([
                        'invoice_id' => $invoice->id,
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
                return to_route($this->module.'.edit', $invoice->id)->with('success', $successMessage);
            } else {
                return redirect()->route($this->module)->with('success', $successMessage);
            }

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error creating invoice: ' . $e->getMessage());
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

            $invoiceNumber = CustomerInvoice::generateInvoiceNumber($source->invoice_type ?? 'sales');

            $invoice = CustomerInvoice::create([
                'invoice_number'   => $invoiceNumber,
                'invoice_type'     => $source->invoice_type,
                'client_name'      => $source->client_name,
                'client_email'     => $source->client_email,
                'client_phone'     => $source->client_phone,
                'client_address'   => $source->client_address,
                'invoice_date'     => $source->invoice_date,
                'due_date'         => $source->due_date,
                'status'           => $source->status,
                'payment_status'   => $source->payment_status,
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
                'letterhead'       => $copyAsset($source->letterhead, 'inv-assets'),
                'signature'        => $copyAsset($source->signature, 'inv-assets'),
                'stamp'            => $copyAsset($source->stamp, 'inv-assets'),
                'show_discount'    => $source->show_discount,
                'show_tax'         => $source->show_tax,
                'show_vat'         => $source->show_vat,
                'created_by'       => $this->userId,
            ]);

            foreach ($source->items as $item) {
                InvoiceItem::create([
                    'invoice_id'    => $invoice->id,
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
                ->route($this->module . '.edit', $invoice->id)
                ->with('success', $this->notify_title . ' duplicated as ' . $invoiceNumber . '. Review dates and status.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()
                ->route($this->module)
                ->with('error', 'Could not duplicate invoice: ' . $e->getMessage());
        }
    }

    public function editForm($id)
    {
        $getData = ($this->table)::with('items')->findOrFail($id);
        $getStatus = ['draft', 'sent', 'paid', 'overdue', 'cancelled'];
        $invoiceTypes = ['sales' => 'Sales Invoice', 'purchase' => 'Purchase Invoice'];
        $paymentStatus = ['Paid', 'Unpaid'];
        $currencies = ['USD' => '$', 'AED' => 'AED', 'EUR' => '€', 'GBP' => '£'];

        return view('backend.' . $this->viewModule . '.edit', [
            'title'            => 'Customer Invoice',
            'module'           => $this->module,
            'getData'          => $getData,
            'getStatus'        => $getStatus,
            'invoiceTypes'     => $invoiceTypes,
            'paymentStatus'    => $paymentStatus,
            'currencies'       => $currencies,
            'meta_title'       => "Edit Customer Invoice | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function update(Request $request, $id)
    {
        $action = $request->submitBtn;

        $validator = Validator::make($request->all(), [
            'invoice_number' => 'required|unique:customer_invoices,invoice_number,' . $id,
            'invoice_type' => 'required|in:sales,purchase',
            'client_name' => 'required|string|max:255',
            'client_email' => 'nullable|email',
            'invoice_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:invoice_date',
            'status' => 'required|in:draft,sent,paid,overdue,cancelled',
            'payment_status' => 'required|in:Paid,Unpaid',
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

            $invoice = CustomerInvoice::findOrFail($id);

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
            $letterheadPath = $invoice->letterhead;
            $signaturePath = $invoice->signature;
            $stampPath = $invoice->stamp;

            // Handle letterhead removal
            if ($request->input('remove_letterhead') == '1') {
                if ($letterheadPath && file_exists(getPublicAssetPath('assets/images/inv-assets/' . $letterheadPath))) {
                    unlink(getPublicAssetPath('assets/images/inv-assets/' . $letterheadPath));
                }
                $letterheadPath = null;
            } elseif ($request->hasFile('letterhead')) {
                // Delete old file if exists
                if ($letterheadPath && file_exists(getPublicAssetPath('assets/images/inv-assets/' . $letterheadPath))) {
                    unlink(getPublicAssetPath('assets/images/inv-assets/' . $letterheadPath));
                }
                $letterheadPath = imageHandling($request, null, 'letterhead', 'inv-assets');
            }

            // Handle signature removal
            if ($request->input('remove_signature') == '1') {
                if ($signaturePath && file_exists(getPublicAssetPath('assets/images/inv-assets/' . $signaturePath))) {
                    unlink(getPublicAssetPath('assets/images/inv-assets/' . $signaturePath));
                }
                $signaturePath = null;
            } elseif ($request->hasFile('signature')) {
                // Delete old file if exists
                if ($signaturePath && file_exists(getPublicAssetPath('assets/images/inv-assets/' . $signaturePath))) {
                    unlink(getPublicAssetPath('assets/images/inv-assets/' . $signaturePath));
                }
                $signaturePath = imageHandling($request, null, 'signature', 'inv-assets');
            }

            // Handle stamp removal
            if ($request->input('remove_stamp') == '1') {
                if ($stampPath && file_exists(getPublicAssetPath('assets/images/inv-assets/' . $stampPath))) {
                    unlink(getPublicAssetPath('assets/images/inv-assets/' . $stampPath));
                }
                $stampPath = null;
            } elseif ($request->hasFile('stamp')) {
                // Delete old file if exists
                if ($stampPath && file_exists(getPublicAssetPath('assets/images/inv-assets/' . $stampPath))) {
                    unlink(getPublicAssetPath('assets/images/inv-assets/' . $stampPath));
                }
                $stampPath = imageHandling($request, null, 'stamp', 'inv-assets');
            }

            // Update invoice
            $invoice->update([
                'invoice_number' => $request->invoice_number,
                'invoice_type' => $request->invoice_type,
                'client_name' => $request->client_name,
                'client_email' => $request->client_email,
                'client_phone' => $request->client_phone,
                'client_address' => $request->client_address,
                'invoice_date' => $request->invoice_date,
                'due_date' => $request->due_date,
                'status' => $request->status,
                'payment_status' => $request->payment_status ?? 'Paid',
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
            InvoiceItem::where('invoice_id', $invoice->id)->delete();

            if ($request->has('items')) {
                foreach ($request->items as $item) {
                    $itemAmount = $item['quantity'] * $item['unit_price'];
                    $itemDiscount = $item['discount'] ?? 0;
                    if ($itemDiscount > 0) {
                        $itemAmount -= $itemDiscount;
                    }

                    InvoiceItem::create([
                        'invoice_id' => $invoice->id,
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
                return to_route($this->module.'.edit', $invoice->id)->with('success', $this->notify_title . ' updated successfully.');
            } else {
                return redirect()->route($this->module)->with('success', $this->notify_title . ' updated successfully!');
            }

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error updating invoice: ' . $e->getMessage());
        }
    }

    public function view($id)
    {
        $getData = ($this->table)::with('items', 'creator')->findOrFail($id);

        return view('backend.' . $this->viewModule . '.view', [
            'title'            => 'Customer Invoice',
            'module'           => $this->module,
            'getData'          => $getData,
            'meta_title'       => "View Customer Invoice | Admin Panel",
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
        $moduleTitle = 'Customer Invoice';

        $getData = ($this->table)::onlyTrashed()->with('creator')->latest()->get();
        $columns = [
            'invoice_number',
            'client_name',
            'invoice_date',
            'due_date',
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
            'meta_title'       => "Trashed Customer Invoices | Admin Panel",
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
        $inv_name = strtoupper($getData->invoice_type) . '-' . $getData->invoice_number;

        // Get currency symbol
        $currencySymbols = [
            'USD' => '$',
            'AED' => 'AED',
            'EUR' => '€',
            'GBP' => '£'
        ];
        $currencySymbol = $currencySymbols[$getData->currency] ?? '$';

        $pdf = Pdf::loadView('backend.customer-invoices.pdf', [
            'getData' => $getData,
            'currencySymbol' => $currencySymbol
        ]);

        // Set paper size and orientation
        $pdf->setPaper('A4', 'portrait');

        return $pdf->download($inv_name . '.pdf');
    }
}






