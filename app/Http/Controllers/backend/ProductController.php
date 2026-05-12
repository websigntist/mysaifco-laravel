<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\Brand;
use App\Models\backend\Product;
use App\Models\backend\ProductCategory;
use App\Models\backend\ProductTypeOption;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductController
{
    protected $userId;
    protected $table;
    protected $module;
    protected $module_s;
    protected $db;
    protected $notify_title;

    public function __construct()
    {
        $this->userId = currentUserId();
        $this->table = Product::class;
        $this->module = 'products';
        $this->module_s = 'product';
        $this->db = 'products';
        $this->notify_title = 'Product';
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $_moduleName = collect($segments)->last();
        $moduleName = Str::singular($_moduleName);

        $getData = ($this->table)::with(['categories', 'creator'])->latest()->get();

        $columns = [
            'image',
            'regular_price',
            'sku',
            'categories',
            'status',
            'ordering',
        ];

        $hiddenColumns = [
            'title',
            'ordering',
            'created_at',

        ];

        return view('backend.'.$this->module.'.listing', [
            'title'               => $moduleName,
            'module'              => $moduleName,
            '_module'             => $_moduleName,
            'getData'             => $getData,
            'columns'             => $columns,
            'hiddenColumns'       => $hiddenColumns,
            'productListSummary'  => $this->productListSummary(),
            'meta_title'          => 'Products | Admin Panel',
            'meta_keywords'       => '',
            'meta_description'    => '',
        ]);
    }

    public function create(Request $request)
    {
        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 2] ?? null;
        $moduleTitle = Str::singular($moduleName);
        $categories = Str::plural($moduleName);

        $productCategories = ProductCategory::query()
            ->where('status', 'Active')
            ->orderBy('title')
            ->get();

        $productTypeOptions = ProductTypeOption::query()->orderBy('ordering')->orderBy('name')->get();

        $brands = $this->brandsForProductForm(null);

        return view('backend.'.$this->module.'.form', [
            'title'               => $moduleTitle,
            'module'              => $moduleName,
            '_module'             => $categories,
            'product'             => null,
            'productCategories'   => $productCategories,
            'productTypeOptions'  => $productTypeOptions,
            'brands'              => $brands,
            'enumStockStatus'     => getEnumValues($this->db, 'stock_status'),
            'enumDiscount'        => getEnumValues($this->db, 'discount'),
            'enumProductTag'      => getEnumValues($this->db, 'product_tag'),
            'enumStatus'          => getEnumValues($this->db, 'status'),
            'enumVisibility'      => getEnumValues($this->db, 'visibility'),
            'meta_title'          => 'Create product | Admin Panel',
            'meta_keywords'       => '',
            'meta_description'    => '',
        ]);
    }

    public function store(Request $request)
    {
        if (! $request->isMethod('post')) {
            return back()->with('error', 'Invalid request method.');
        }

        $action = $request->submitBtn ?? 'default';
        $activeTab = $request->input('active_tab');
        $allowedTypes = ProductTypeOption::query()->pluck('name')->all();

        $request->validate([
            'title'                 => 'required|string|max:255',
            'friendly_url'          => 'required|string|max:255|unique:products,friendly_url',
            'quantity'              => 'required|integer|min:0',
            'stock_status'          => ['required', Rule::in(getEnumValues($this->db, 'stock_status'))],
            'product_type'          => 'required|array|min:1',
            'product_type.*'        => ['string', Rule::in($allowedTypes)],
            'brand_id'              => 'required|exists:brands,id',
            'discount'              => ['nullable', Rule::in(getEnumValues($this->db, 'discount'))],
            'style_no'              => 'nullable|string|max:255',
            'product_tag'           => ['nullable', Rule::in(getEnumValues($this->db, 'product_tag'))],
            'video_lint'            => 'nullable|string|max:1000',
            'sku'                   => 'nullable|string|max:100|unique:products,sku',
            'isbn'                  => 'nullable|string|max:100',
            'weight'                => 'nullable|numeric',
            'length'                => 'nullable|numeric',
            'width'                 => 'nullable|numeric',
            'height'                => 'nullable|numeric',
            'short_description'     => 'nullable|string',
            'full_description'      => 'nullable|string',
            'product_features'      => 'nullable|string',
            'product_specifications'=> 'nullable|string',
            'regular_price'         => 'nullable|numeric|min:0',
            'sale_price'            => 'nullable|numeric|min:0',
            'sale_start'            => 'nullable|date',
            'sale_end'              => 'nullable|date|after_or_equal:sale_start',
            'image_alt'             => 'nullable|string|max:255',
            'image_title'           => 'nullable|string|max:255',
            'status'                => ['required', Rule::in(getEnumValues($this->db, 'status'))],
            'visibility'            => ['required', Rule::in(getEnumValues($this->db, 'visibility'))],
            'product_categories'    => 'required|array|min:1',
            'product_categories.*'  => 'integer|exists:product_categories,id',
            'ordering'              => 'nullable|integer|min:0',
            'meta_title'            => 'required|string|max:255',
            'meta_keywords'         => 'nullable|string',
            'meta_description'      => 'nullable|string',
            'gallery_images'        => 'nullable|array',
            'gallery_images.*'      => ['nullable', 'string', 'max:255'],
            'product_images'        => 'nullable|array',
            'product_images.*'      => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,gif', 'max:5120'],
        ]);

        $colors = $this->normalizeRepeaterRows($request->input('product-colors'));
        $sizes = $this->normalizeRepeaterRows($request->input('product-sizes'));

        $mainImage = imageHandling($request, null, 'main_image', 'products');

        $dataToStore = [
            'title'                  => $request->title,
            'friendly_url'           => $request->friendly_url,
            'quantity'               => (int) $request->quantity,
            'stock_status'           => $request->stock_status,
            'product_types'          => array_values($request->product_type),
            'brand_id'               => (int) $request->brand_id,
            'discount'               => $request->discount,
            'style_no'               => $request->style_no,
            'product_tag'            => $request->product_tag,
            'video_lint'             => $request->video_lint,
            'sku'                    => $request->sku,
            'isbn'                   => $request->isbn,
            'weight'                 => $request->weight,
            'length'                 => $request->length,
            'width'                  => $request->width,
            'height'                 => $request->height,
            'short_description'      => $request->short_description,
            'full_description'       => $request->full_description,
            'product_features'       => $request->product_features,
            'product_specifications' => $request->product_specifications,
            'regular_price'          => $request->regular_price,
            'sale_price'             => $request->sale_price,
            'sale_start'             => $request->sale_start,
            'sale_end'               => $request->sale_end,
            'main_image'             => $mainImage,
            'image_alt'              => $request->image_alt,
            'image_title'            => $request->image_title,
            'status'                 => $request->status,
            'visibility'             => $request->visibility,
            'ordering'               => (int) ($request->ordering ?? 0),
            'meta_title'             => $request->meta_title,
            'meta_keywords'          => $request->meta_keywords,
            'meta_description'       => $request->meta_description,
            'created_by'             => currentUserId(),
        ];

        $row = ($this->table)::create($dataToStore);

        $row->categories()->sync($request->product_categories);
        $this->syncProductColors($row, $colors);
        $this->syncProductSizes($row, $sizes);

        $galleryFilenames = array_merge(
            $this->normalizedGalleryFilenames($request),
            $this->storeProductImageUploads($request)
        );
        $this->attachGalleryImages($row, $galleryFilenames);

        if ($action === 'save_new') {
            return to_route($this->module_s.'.create', ['active_tab' => $activeTab])->with('success', $this->notify_title.' created successfully.');
        }
        if ($action === 'save_stay') {
            return to_route($this->module_s.'.edit', ['id' => $row->id, 'active_tab' => $activeTab])->with('success', $this->notify_title.' created successfully.');
        }

        return redirect()->route('products')->with('success', $this->notify_title.' created successfully.');
    }

    public function editForm(Request $request, $id)
    {
        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 3] ?? null;
        $moduleTitle = Str::singular($moduleName);
        $_categories = Str::plural($moduleName);

        $data = ($this->table)::with(['categories', 'productImages', 'productColors', 'productSizes'])->findOrFail($id);

        $productCategories = ProductCategory::query()
            ->where('status', 'Active')
            ->orderBy('title')
            ->get();

        $productTypeOptions = ProductTypeOption::query()->orderBy('ordering')->orderBy('name')->get();

        $brands = $this->brandsForProductForm($data);

        return view('backend.'.$this->module.'.form', [
            'product'            => $data,
            'title'              => $moduleTitle,
            'module'             => $moduleName,
            '_module'            => $_categories,
            'productCategories'  => $productCategories,
            'productTypeOptions' => $productTypeOptions,
            'brands'             => $brands,
            'enumStockStatus'    => getEnumValues($this->db, 'stock_status'),
            'enumDiscount'       => getEnumValues($this->db, 'discount'),
            'enumProductTag'     => getEnumValues($this->db, 'product_tag'),
            'enumStatus'         => getEnumValues($this->db, 'status'),
            'enumVisibility'     => getEnumValues($this->db, 'visibility'),
            'meta_title'         => 'Edit product | Admin Panel',
            'meta_keywords'      => '',
            'meta_description'   => '',
        ]);
    }

    public function update(Request $request, $id)
    {
        $action = $request->submitBtn ?? 'default';
        $activeTab = $request->input('active_tab');
        $allowedTypes = ProductTypeOption::query()->pluck('name')->all();

        $request->validate([
            'title'                 => 'required|string|max:255',
            'friendly_url'          => 'required|string|max:255|unique:products,friendly_url,'.$id,
            'quantity'              => 'required|integer|min:0',
            'stock_status'          => ['required', Rule::in(getEnumValues($this->db, 'stock_status'))],
            'product_type'          => 'required|array|min:1',
            'product_type.*'        => ['string', Rule::in($allowedTypes)],
            'brand_id'              => 'required|exists:brands,id',
            'discount'              => ['nullable', Rule::in(getEnumValues($this->db, 'discount'))],
            'style_no'              => 'nullable|string|max:255',
            'product_tag'           => ['nullable', Rule::in(getEnumValues($this->db, 'product_tag'))],
            'video_lint'            => 'nullable|string|max:1000',
            'sku'                   => 'nullable|string|max:100|unique:products,sku,'.$id,
            'isbn'                  => 'nullable|string|max:100',
            'weight'                => 'nullable|numeric',
            'length'                => 'nullable|numeric',
            'width'                 => 'nullable|numeric',
            'height'                => 'nullable|numeric',
            'short_description'     => 'nullable|string',
            'full_description'      => 'nullable|string',
            'product_features'      => 'nullable|string',
            'product_specifications'=> 'nullable|string',
            'regular_price'         => 'nullable|numeric|min:0',
            'sale_price'            => 'nullable|numeric|min:0',
            'sale_start'            => 'nullable|date',
            'sale_end'              => 'nullable|date|after_or_equal:sale_start',
            'image_alt'             => 'nullable|string|max:255',
            'image_title'           => 'nullable|string|max:255',
            'status'                => ['required', Rule::in(getEnumValues($this->db, 'status'))],
            'visibility'            => ['required', Rule::in(getEnumValues($this->db, 'visibility'))],
            'product_categories'    => 'required|array|min:1',
            'product_categories.*'  => 'integer|exists:product_categories,id',
            'ordering'              => 'nullable|integer|min:0',
            'meta_title'            => 'required|string|max:255',
            'meta_keywords'         => 'nullable|string',
            'meta_description'      => 'nullable|string',
            'gallery_images'        => 'nullable|array',
            'gallery_images.*'      => ['nullable', 'string', 'max:255'],
            'product_images'        => 'nullable|array',
            'product_images.*'      => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,gif', 'max:5120'],
        ]);

        try {
            $row = ($this->table)::findOrFail($id);

            $colors = $this->normalizeRepeaterRows($request->input('product-colors'));
            $sizes = $this->normalizeRepeaterRows($request->input('product-sizes'));

            $dataToUpdate = [
                'title'                  => $request->title,
                'friendly_url'           => $request->friendly_url,
                'quantity'               => (int) $request->quantity,
                'stock_status'           => $request->stock_status,
                'product_types'          => array_values($request->product_type),
                'brand_id'               => (int) $request->brand_id,
                'discount'               => $request->discount,
                'style_no'               => $request->style_no,
                'product_tag'            => $request->product_tag,
                'video_lint'             => $request->video_lint,
                'sku'                    => $request->sku,
                'isbn'                   => $request->isbn,
                'weight'                 => $request->weight,
                'length'                 => $request->length,
                'width'                  => $request->width,
                'height'                 => $request->height,
                'short_description'      => $request->short_description,
                'full_description'       => $request->full_description,
                'product_features'       => $request->product_features,
                'product_specifications' => $request->product_specifications,
                'regular_price'          => $request->regular_price,
                'sale_price'             => $request->sale_price,
                'sale_start'             => $request->sale_start,
                'sale_end'               => $request->sale_end,
                'image_alt'              => $request->image_alt,
                'image_title'            => $request->image_title,
                'status'                 => $request->status,
                'visibility'             => $request->visibility,
                'ordering'               => (int) ($request->ordering ?? 0),
                'meta_title'             => $request->meta_title,
                'meta_keywords'          => $request->meta_keywords,
                'meta_description'       => $request->meta_description,
                'created_by'             => currentUserId(),
            ];

            $dataToUpdate['main_image'] = imageHandling($request, $row, 'main_image', 'products');

            $row->update($dataToUpdate);
            $row->categories()->sync($request->product_categories);
            $this->syncProductColors($row, $colors);
            $this->syncProductSizes($row, $sizes);

            $row->productImages()->delete();
            $galleryFilenames = array_merge(
                $this->normalizedGalleryFilenames($request),
                $this->storeProductImageUploads($request)
            );
            $this->attachGalleryImages($row, $galleryFilenames);

            if ($action === 'save_new') {
                return to_route($this->module_s.'.create', ['active_tab' => $activeTab])->with('success', $this->notify_title.' updated successfully.');
            }
            if ($action === 'save_stay') {
                return to_route($this->module_s.'.edit', ['id' => $row->id, 'active_tab' => $activeTab])->with('success', $this->notify_title.' updated successfully.');
            }

            return redirect()->route('products')->with('success', $this->notify_title.' updated successfully.');
        } catch (\Exception $e) {
            Log::error('Product update failed: '.$e->getMessage());

            return back()->with('error', 'An error occurred while updating: '.$e->getMessage());
        }
    }

    public function duplicate(Request $request, $id)
    {
        $original = ($this->table)::with(['categories', 'productImages', 'productColors', 'productSizes'])->findOrFail($id);

        $copy = $original->replicate();
        $base = Str::slug($original->friendly_url.'-copy');
        $copy->friendly_url = $this->uniqueProductFriendlyUrl($base);
        $copy->sku = $original->sku ? $this->uniqueSku($original->sku.'-copy') : null;
        $copy->title = $original->title.' (Copy)';
        $copy->save();

        $copy->categories()->sync($original->categories->pluck('id')->all());

        foreach ($original->productImages as $g) {
            $copy->productImages()->create([
                'path'      => $g->path,
                'ordering'  => $g->ordering,
            ]);
        }

        foreach ($original->productColors as $c) {
            $copy->productColors()->create([
                'item_name'  => $c->item_name,
                'value'      => $c->value,
                'price'      => $c->price,
                'description'=> $c->description,
                'ordering'   => $c->ordering,
            ]);
        }

        foreach ($original->productSizes as $s) {
            $copy->productSizes()->create([
                'item_name'  => $s->item_name,
                'value'      => $s->value,
                'price'      => $s->price,
                'description'=> $s->description,
                'ordering'   => $s->ordering,
            ]);
        }

        return redirect()->route($this->module_s.'.edit', $copy->id)->with('success', 'Product duplicated.');
    }

    public function updateStatusAjax(Request $request, $id)
    {
        $row = ($this->table)::findOrFail($id);
        $row->status = $row->status === 'Published' ? 'Unpublished' : 'Published';
        $row->save();

        return response()->json([
            'success' => true,
            'status'  => $row->status,
            'message' => $this->notify_title." status updated to {$row->status}",
        ]);
    }

    public function updateOrderingAjax(Request $request)
    {
        $request->validate([
            'id'       => 'required|integer|exists:products,id',
            'ordering' => 'required|integer|min:0',
        ]);

        $row = ($this->table)::findOrFail($request->id);
        $row->ordering = $request->ordering;
        $row->save();

        return response()->json([
            'success'  => true,
            'message'  => $this->notify_title.' ordering updated successfully',
            'id'       => $row->id,
            'ordering' => $row->ordering,
        ]);
    }

    public function deleteAjax($id)
    {
        try {
            $row = ($this->table)::findOrFail($id);
            $row->delete();

            return response()->json([
                'success' => true,
                'message' => $this->notify_title.' deleted successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $this->notify_title.' failed to delete: '.$e->getMessage(),
            ], 500);
        }
    }

    public function modalView($id)
    {
        $row = ($this->table)::with([
            'categories',
            'creator',
            'brand'
        ])->findOrFail($id);

        return response()->json([
            'id'                => $row->id,
            'title'             => $row->title,
            'friendly_url'      => $row->friendly_url,
            'sku'               => $row->sku,
            'regular_price'     => $row->regular_price,
            'currency'           => strtoupper(get_setting('site_currency')),
            'status'            => $row->status,
            'short_description' => $row->short_description,
            'main_image'        => $row->main_image,
            'ordering'          => $row->ordering,
            'quantity'          => $row->quantity,
            'stock_status'      => $row->stock_status,
            'product_types'     => $row->product_types,
            'brand'             => $row->brand?->name,
            'categories'        => $row->categories->pluck('title')->implode(', '),
            'created_at'        => $row->created_at ? $row->created_at->format('M d, Y') : null,
            'created_by_name'   => $row->creator ? trim(($row->creator->first_name ?? '') . ' ' . ($row->creator->last_name ?? '')) : '-',
        ]);
    }

    public function deleteAll(Request $request)
    {
        $selectedIds = $request->ids;
        $trashed = $request->trashed;

        if (is_array($selectedIds) && count($selectedIds)) {
            if ($trashed === 'trashed') {
                ($this->table)::withTrashed()->whereIn('id', $request->ids)->forceDelete();

                return redirect()->route('products')->with('success', 'Selected '.$this->notify_title.'s permanently deleted!');
            }

            ($this->table)::whereIn('id', $selectedIds)->delete();

            return redirect()->route('products')->with('success', 'Selected '.$this->notify_title.'s deleted successfully.');
        }

        return redirect()->route('products')->with('error', $this->notify_title.' not selected.');
    }

    public function export()
    {
        $fileName = 'products_export_'.now()->format('Y-m-d_H-i-s').'.csv';
        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => "attachment; filename={$fileName}",
            'Cache-Control'       => 'no-cache, no-store, must-revalidate',
        ];

        $columns = [
            'ID',
            'Title',
            'Friendly URL',
            'SKU',
            'ISBN',
            'Brand',
            'Discount',
            'Product Tag',
            'Style No',
            'Video Link',
            'Status',
            'Visibility',
            'Stock Status',
            'Quantity',
            'Product Types',
            'Categories',
            'Regular Price',
            'Sale Price',
            'Sale Start',
            'Sale End',
            'Weight',
            'Length',
            'Width',
            'Height',
            'Main Image',
            'Gallery Images',
            'Colors',
            'Sizes',
            'Short Description',
            'Full Description',
            'Product Features',
            'Product Specifications',
            'Image Alt',
            'Image Title',
            'Ordering',
            'Meta Title',
            'Meta Keywords',
            'Meta Description',
            'Created By',
            'Created At',
            'Updated At',
            'Deleted At',
        ];

        $tableClass = $this->table;

        $callback = function () use ($columns, $tableClass) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $columns);

            $tableClass::withTrashed()
                ->with(['brand', 'categories', 'productImages', 'productColors', 'productSizes', 'creator'])
                ->orderBy('id')
                ->chunkById(200, function ($rows) use ($handle) {
                foreach ($rows as $row) {
                    $productTypes = is_array($row->product_types) ? implode(', ', array_filter($row->product_types)) : (string) ($row->product_types ?? '');
                    $categories = $row->categories->pluck('title')->filter()->implode(', ');
                    $galleryImages = $row->productImages->pluck('path')->filter()->implode(' | ');
                    $colors = $row->productColors->map(function ($color) {
                        return trim(
                            ($color->item_name ?? '').': '.
                            ($color->value ?? '').' | Price: '.
                            ($color->price ?? '').' | '.
                            ($color->description ?? '')
                        );
                    })->filter()->implode(' || ');
                    $sizes = $row->productSizes->map(function ($size) {
                        return trim(
                            ($size->item_name ?? '').': '.
                            ($size->value ?? '').' | Price: '.
                            ($size->price ?? '').' | '.
                            ($size->description ?? '')
                        );
                    })->filter()->implode(' || ');
                    $createdBy = $row->creator ? trim(($row->creator->first_name ?? '').' '.($row->creator->last_name ?? '')) : null;

                    fputcsv($handle, [
                        $row->id,
                        $row->title,
                        $row->friendly_url,
                        $row->sku,
                        $row->isbn,
                        $row->brand?->name,
                        $row->discount,
                        $row->product_tag,
                        $row->style_no,
                        $row->video_lint,
                        $row->status,
                        $row->visibility,
                        $row->stock_status,
                        $row->quantity,
                        $productTypes,
                        $categories,
                        $row->regular_price,
                        $row->sale_price,
                        $row->sale_start?->format('Y-m-d'),
                        $row->sale_end?->format('Y-m-d'),
                        $row->weight,
                        $row->length,
                        $row->width,
                        $row->height,
                        $row->main_image,
                        $galleryImages,
                        $colors,
                        $sizes,
                        $row->short_description,
                        $row->full_description,
                        $row->product_features,
                        $row->product_specifications,
                        $row->image_alt,
                        $row->image_title,
                        $row->ordering,
                        $row->meta_title,
                        $row->meta_keywords,
                        $row->meta_description,
                        $createdBy,
                        $row->created_at?->format('Y-m-d H:i:s'),
                        $row->updated_at?->format('Y-m-d H:i:s'),
                        $row->deleted_at?->format('Y-m-d H:i:s'),
                    ]);
                }
            });

            fclose($handle);
        };

        return response()->streamDownload($callback, $fileName, $headers);
    }

    public function importForm(Request $request)
    {
        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 2] ?? null;
        $moduleTitle = Str::singular($moduleName);
        $categories = Str::plural($moduleName);

        return view('backend.'.$this->module.'.import', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'categories'       => $categories,
            'meta_title'       => 'Import products | Admin Panel',
            'meta_keywords'    => '',
            'meta_description' => '',
        ]);
    }

    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt|max:10240',
        ]);

        $file = $request->file('csv_file');
        if (! $file || ! $file->isValid()) {
            return redirect()->route('products')->with('error', 'Invalid CSV file upload.');
        }

        $handle = fopen($file->getRealPath(), 'r');
        if ($handle === false) {
            return redirect()->route('products')->with('error', 'Failed to open CSV file.');
        }

        $header = fgetcsv($handle, 0, ',');
        if (! is_array($header) || count($header) === 0) {
            fclose($handle);

            return redirect()->route('products')->with('error', 'CSV header row is missing or invalid.');
        }

        $header = array_map(fn ($col) => $this->normalizeCsvHeader((string) $col), $header);
        $allowedTypes = ProductTypeOption::query()->pluck('name')->all();
        $allowedTypeMap = collect($allowedTypes)->mapWithKeys(fn ($name) => [mb_strtolower(trim((string) $name)) => $name])->all();
        $allowedStatus = getEnumValues($this->db, 'status');
        $allowedVisibility = getEnumValues($this->db, 'visibility');
        $allowedStockStatus = getEnumValues($this->db, 'stock_status');
        $allowedDiscount = getEnumValues($this->db, 'discount');
        $allowedProductTag = getEnumValues($this->db, 'product_tag');

        $brandsByName = Brand::query()
            ->select(['id', 'name'])
            ->get()
            ->mapWithKeys(fn ($b) => [mb_strtolower(trim((string) $b->name)) => $b->id])
            ->all();

        $categoriesByName = ProductCategory::query()
            ->select(['id', 'title'])
            ->get()
            ->mapWithKeys(fn ($c) => [mb_strtolower(trim((string) $c->title)) => $c->id])
            ->all();

        $imported = 0;
        $skipped = 0;
        $rowNumber = 1;
        $errors = [];

        while (($row = fgetcsv($handle, 0, ',')) !== false) {
            $rowNumber++;

            if (empty(array_filter($row, fn ($v) => trim((string) $v) !== ''))) {
                continue;
            }

            if (count($row) !== count($header)) {
                $skipped++;
                $errors[] = "Row {$rowNumber}: column count mismatch.";
                continue;
            }

            $data = array_combine($header, $row);
            if (! is_array($data)) {
                $skipped++;
                $errors[] = "Row {$rowNumber}: invalid CSV row.";
                continue;
            }

            $friendlyUrl = trim((string) ($data['friendly_url'] ?? ''));
            $title = trim((string) ($data['title'] ?? ''));

            if ($friendlyUrl === '' && $title !== '') {
                $friendlyUrl = Str::slug($title);
            }

            if ($friendlyUrl === '') {
                $skipped++;
                $errors[] = "Row {$rowNumber}: missing friendly_url.";
                continue;
            }

            $friendlyUrl = Str::slug($friendlyUrl);
            $product = Product::withTrashed()->firstOrNew(['friendly_url' => $friendlyUrl]);

            $rawBrand = trim((string) ($data['brand'] ?? ''));
            $brandId = null;
            if ($rawBrand !== '') {
                if (ctype_digit($rawBrand) && Brand::query()->where('id', (int) $rawBrand)->exists()) {
                    $brandId = (int) $rawBrand;
                } else {
                    $brandId = $brandsByName[mb_strtolower($rawBrand)] ?? null;
                }
            }

            $productTypeList = collect($this->parseCsvList((string) ($data['product_types'] ?? '')))
                ->map(fn ($v) => $allowedTypeMap[mb_strtolower($v)] ?? null)
                ->filter()
                ->values()
                ->all();

            $status = trim((string) ($data['status'] ?? ''));
            if (! in_array($status, $allowedStatus, true)) {
                $status = 'Published';
            }

            $visibility = trim((string) ($data['visibility'] ?? ''));
            if (! in_array($visibility, $allowedVisibility, true)) {
                $visibility = 'Public';
            }

            $stockStatus = trim((string) ($data['stock_status'] ?? ''));
            if (! in_array($stockStatus, $allowedStockStatus, true)) {
                $stockStatus = 'In Stock';
            }

            $discount = trim((string) ($data['discount'] ?? ''));
            $discount = in_array($discount, $allowedDiscount, true) ? $discount : null;

            $productTag = trim((string) ($data['product_tag'] ?? ''));
            $productTag = in_array($productTag, $allowedProductTag, true) ? $productTag : null;

            if (! $product->exists) {
                $product->created_by = currentUserId();
            }

            $product->fill([
                'title'                  => $title !== '' ? $title : ('Product '.$friendlyUrl),
                'friendly_url'           => $friendlyUrl,
                'quantity'               => (int) ($data['quantity'] ?? 0),
                'stock_status'           => $stockStatus,
                'product_types'          => $productTypeList,
                'brand_id'               => $brandId,
                'discount'               => $discount,
                'style_no'               => $this->nullableString($data['style_no'] ?? null),
                'product_tag'            => $productTag,
                'video_link'             => $this->nullableString($data['video_link'] ?? ($data['video_lint'] ?? null)),
                'sku'                    => $this->nullableString($data['sku'] ?? null),
                'isbn'                   => $this->nullableString($data['isbn'] ?? null),
                'weight'                 => $this->nullableDecimal($data['weight'] ?? null),
                'length'                 => $this->nullableDecimal($data['length'] ?? null),
                'width'                  => $this->nullableDecimal($data['width'] ?? null),
                'height'                 => $this->nullableDecimal($data['height'] ?? null),
                'short_description'      => $this->nullableString($data['short_description'] ?? null),
                'full_description'       => $this->nullableString($data['full_description'] ?? null),
                'product_features'       => $this->nullableString($data['product_features'] ?? null),
                'product_specifications' => $this->nullableString($data['product_specifications'] ?? null),
                'regular_price'          => $this->nullableDecimal($data['regular_price'] ?? null),
                'sale_price'             => $this->nullableDecimal($data['sale_price'] ?? null),
                'sale_start'             => $this->nullableDate($data['sale_start'] ?? null),
                'sale_end'               => $this->nullableDate($data['sale_end'] ?? null),
                'main_image'             => $this->nullableString($data['main_image'] ?? null),
                'image_alt'              => $this->nullableString($data['image_alt'] ?? null),
                'image_title'            => $this->nullableString($data['image_title'] ?? null),
                'status'                 => $status,
                'visibility'             => $visibility,
                'ordering'               => (int) ($data['ordering'] ?? 0),
                'meta_title'             => $this->nullableString($data['meta_title'] ?? null) ?? ($title !== '' ? $title : $friendlyUrl),
                'meta_keywords'          => $this->nullableString($data['meta_keywords'] ?? null),
                'meta_description'       => $this->nullableString($data['meta_description'] ?? null),
            ]);

            $product->save();

            $categoryIds = collect($this->parseCsvList((string) ($data['categories'] ?? '')))
                ->map(fn ($name) => $categoriesByName[mb_strtolower($name)] ?? null)
                ->filter()
                ->values()
                ->all();
            $product->categories()->sync($categoryIds);

            $galleryItems = $this->parsePipeList((string) ($data['gallery_images'] ?? ''));
            $product->productImages()->delete();
            foreach ($galleryItems as $i => $imagePath) {
                $product->productImages()->create([
                    'path'     => $imagePath,
                    'ordering' => $i,
                ]);
            }

            $this->syncProductColors($product, $this->parseVariantRows((string) ($data['colors'] ?? '')));
            $this->syncProductSizes($product, $this->parseVariantRows((string) ($data['sizes'] ?? '')));

            $deletedAt = $this->nullableDateTime($data['deleted_at'] ?? null);
            if ($deletedAt !== null) {
                if (! $product->trashed()) {
                    $product->delete();
                }
            } elseif ($product->trashed()) {
                $product->restore();
            }

            $imported++;
        }

        fclose($handle);

        $message = "Products import completed. Imported/updated: {$imported}, skipped: {$skipped}.";
        if (! empty($errors)) {
            $message .= ' Issues: '.implode(' | ', array_slice($errors, 0, 8));
            if (count($errors) > 8) {
                $message .= ' | ...';
            }
        }

        return redirect()->route('products')->with('success', $message);
    }

    public function trashed(Request $request)
    {
        $segments = $request->segments();
        $_moduleName = collect($segments)->last();
        $moduleName = $segments[count($segments) - 2] ?? $this->module;

        $getData = ($this->table)::with(['categories'])->onlyTrashed()->latest()->get();

        $columns = [
            'image',
            'title',
            'sku',
            'status',
            'ordering',
            'created_at',
        ];

        return view('backend.'.$this->module.'.listing', [
            'title'               => $moduleName,
            'module'              => $moduleName,
            '_module'             => $_moduleName,
            'getData'             => $getData,
            'columns'             => $columns,
            'hiddenColumns'       => [],
            'productListSummary'  => $this->productListSummary(),
            'meta_title'          => 'Trashed products | Admin Panel',
            'meta_keywords'       => '',
            'meta_description'    => '',
        ]);
    }

    public function restore($id)
    {
        $row = ($this->table)::withTrashed()->findOrFail($id);
        $row->restore();

        return redirect()->route('products')->with('success', $this->notify_title.' restored successfully!');
    }

    public function forceDelete($id)
    {
        $row = ($this->table)::withTrashed()->findOrFail($id);
        $row->forceDelete();

        return redirect()->route('products')->with('success', $this->notify_title.' permanently deleted!');
    }

    private function brandsForProductForm(?Product $product): \Illuminate\Support\Collection
    {
        $brands = Brand::query()
            ->where('status', 'Active')
            ->orderBy('ordering')
            ->orderBy('name')
            ->get();

        if ($product?->brand_id && ! $brands->contains('id', $product->brand_id)) {
            $current = Brand::query()->find($product->brand_id);
            if ($current) {
                $brands = $brands->prepend($current)->values();
            }
        }

        return $brands;
    }

    private function normalizeRepeaterRows(?array $rows): array
    {
        if (! is_array($rows)) {
            return [];
        }

        return collect($rows)
            ->map(fn ($row) => [
                'item_name'   => trim((string) ($row['item_name'] ?? '')),
                'value'       => trim((string) ($row['value'] ?? '')),
                'price'       => trim((string) ($row['price'] ?? '')),
                'description' => trim((string) ($row['description'] ?? '')),
            ])
            ->filter(fn ($r) => $r['item_name'] !== '' || $r['value'] !== '' || $r['price'] !== '' || $r['description'] !== '')
            ->values()
            ->all();
    }

    private function normalizedGalleryFilenames(Request $request): array
    {
        $raw = array_merge(
            (array) $request->input('gallery_images', []),
            (array) $request->input('product_images', [])
        );

        if (! is_array($raw)) {
            return [];
        }

        return collect($raw)
            ->filter(fn ($v) => is_string($v) && trim($v) !== '')
            ->map(fn ($v) => basename(trim($v)))
            ->filter(fn ($v) => $v !== '' && $v !== '.' && $v !== '..')
            ->values()
            ->all();
    }

    private function storeProductImageUploads(Request $request): array
    {
        $files = $request->file('product_images', []);
        if (! is_array($files) || count($files) === 0) {
            return [];
        }

        $basePath = getPublicAssetPath('assets/images/products/gallery');
        if (! File::isDirectory($basePath)) {
            File::makeDirectory($basePath, 0777, true, true);
        }

        $saved = [];
        foreach ($files as $file) {
            if (! $file instanceof UploadedFile || ! $file->isValid()) {
                continue;
            }

            $ext = strtolower($file->getClientOriginalExtension() ?: 'jpg');
            $ext = in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif'], true) ? $ext : 'jpg';
            $name = time().'_'.Str::random(8).'_gallery.'.$ext;
            $file->move($basePath, $name);
            $saved[] = $name;
        }

        return $saved;
    }

    /**
     * @return list<string>
     */
    private function productGalleryDirectories(): array
    {
        $images = [
            getPublicAssetPath('assets/images/products/gallery'),
            public_path('assets/images/products/gallery'),
            base_path('assets/images/products/gallery'),
        ];

        return collect($images)
            ->map(fn ($p) => $p ? rtrim(str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $p), DIRECTORY_SEPARATOR) : '')
            ->filter()
            ->unique()
            ->values()
            ->all();
    }

    private function attachGalleryImages(Product $product, array $filenames): void
    {
        $dirs = $this->productGalleryDirectories();
        $sort = 0;
        $seen = [];

        foreach ($filenames as $name) {
            if (!is_string($name) || $name === '') {
                continue;
            }
            if (!preg_match('/^[a-zA-Z0-9_\-\.]+$/', $name)) {
                continue;
            }
            if (isset($seen[$name])) {
                continue;
            }
            $seen[$name] = true;

            $onDisk = false;
            foreach ($dirs as $dir) {
                $full = $dir . DIRECTORY_SEPARATOR . $name;
                if (File::isFile($full)) {
                    $onDisk = true;
                    break;
                }
            }

            if (!$onDisk) {
                Log::notice('Product image stored without verified file on disk', [
                    'product_id' => $product->id,
                    'filename'   => $name,
                    'checked'    => $dirs,
                ]);
            }

            $product->productImages()->create([
                'path'      => $name,
                'ordering'  => $sort++,
            ]);
        }
    }

    private function syncProductColors(Product $product, array $rows): void
    {
        $product->productColors()->delete();
        foreach (array_values($rows) as $i => $row) {
            $product->productColors()->create([
                'item_name'  => $row['item_name'] ?: null,
                'value'      => $row['value'] ?: null,
                'price'      => $row['price'] !== '' ? $row['price'] : null,
                'description'=> $row['description'] ?: null,
                'ordering'   => $i,
            ]);
        }
    }

    private function syncProductSizes(Product $product, array $rows): void
    {
        $product->productSizes()->delete();
        foreach (array_values($rows) as $i => $row) {
            $product->productSizes()->create([
                'item_name'  => $row['item_name'] ?: null,
                'value'      => $row['value'] ?: null,
                'price'      => $row['price'] !== '' ? $row['price'] : null,
                'description'=> $row['description'] ?: null,
                'ordering' => $i,
            ]);
        }
    }

    private function uniqueProductFriendlyUrl(string $base): string
    {
        $candidate = Str::slug($base);
        $n = 1;
        while (Product::withTrashed()->where('friendly_url', $candidate)->exists()) {
            $candidate = Str::slug($base).'-'.$n;
            $n++;
        }

        return $candidate;
    }

    private function uniqueSku(string $base): string
    {
        $candidate = Str::limit($base, 100, '');
        $n = 1;
        while (Product::withTrashed()->where('sku', $candidate)->exists()) {
            $candidate = Str::limit($base.'-'.$n, 100, '');
            $n++;
        }

        return $candidate;
    }

    private function normalizeCsvHeader(string $value): string
    {
        $value = preg_replace('/^\xEF\xBB\xBF/u', '', $value) ?? $value;
        $value = preg_replace('/[\x00-\x1F\x7F]/u', '', $value) ?? $value;
        $value = trim($value);

        return Str::snake($value);
    }

    private function parseCsvList(string $value): array
    {
        return collect(explode(',', $value))
            ->map(fn ($v) => trim($v))
            ->filter()
            ->unique()
            ->values()
            ->all();
    }

    private function parsePipeList(string $value): array
    {
        return collect(explode('|', $value))
            ->map(fn ($v) => trim($v))
            ->filter()
            ->unique()
            ->values()
            ->all();
    }

    private function parseVariantRows(string $value): array
    {
        $value = trim($value);
        if ($value === '') {
            return [];
        }

        return collect(explode('||', $value))
            ->map(function ($block) {
                $parts = array_map('trim', explode('|', (string) $block));
                $first = $parts[0] ?? '';
                $itemName = '';
                $itemValue = '';
                if (str_contains($first, ':')) {
                    [$itemName, $itemValue] = array_map('trim', explode(':', $first, 2));
                } else {
                    $itemName = trim($first);
                }

                $price = '';
                $description = '';
                foreach (array_slice($parts, 1) as $piece) {
                    if (stripos($piece, 'price:') === 0) {
                        $price = trim((string) substr($piece, 6));
                        continue;
                    }
                    $description = $description === '' ? $piece : ($description.' | '.$piece);
                }

                return [
                    'item_name'   => $itemName,
                    'value'       => $itemValue,
                    'price'       => $price,
                    'description' => $description,
                ];
            })
            ->filter(fn ($row) => $row['item_name'] !== '' || $row['value'] !== '' || $row['price'] !== '' || $row['description'] !== '')
            ->values()
            ->all();
    }

    private function nullableString($value): ?string
    {
        if ($value === null) {
            return null;
        }
        $value = trim((string) $value);

        return $value === '' ? null : $value;
    }

    private function nullableDecimal($value): ?float
    {
        if ($value === null) {
            return null;
        }
        $value = trim((string) $value);
        if ($value === '') {
            return null;
        }
        $normalized = str_replace(',', '', $value);

        return is_numeric($normalized) ? (float) $normalized : null;
    }

    private function nullableDate($value): ?string
    {
        if ($value === null) {
            return null;
        }
        $value = trim((string) $value);
        if ($value === '') {
            return null;
        }

        try {
            return \Carbon\Carbon::parse($value)->format('Y-m-d');
        } catch (\Throwable $e) {
            return null;
        }
    }

    private function nullableDateTime($value): ?string
    {
        if ($value === null) {
            return null;
        }
        $value = trim((string) $value);
        if ($value === '') {
            return null;
        }

        try {
            return \Carbon\Carbon::parse($value)->format('Y-m-d H:i:s');
        } catch (\Throwable $e) {
            return null;
        }
    }

    /**
     * @return array{total: int, published: int, unpublished: int, total_amount: float, currency: string}
     */
    private function productListSummary(): array
    {
        $stats = Product::query()
            ->selectRaw('COUNT(*) as total')
            ->selectRaw("SUM(CASE WHEN status = 'Published' THEN 1 ELSE 0 END) as published")
            ->selectRaw("SUM(CASE WHEN status = 'Unpublished' THEN 1 ELSE 0 END) as unpublished")
            ->selectRaw('SUM(COALESCE(regular_price, 0)) as total_amount')
            ->first();

        $currency = strtoupper(trim((string) (get_setting('site_currency') ?: ''))) ?: 'USD';

        return [
            'total'       => (int) ($stats->total ?? 0),
            'published'   => (int) ($stats->published ?? 0),
            'unpublished' => (int) ($stats->unpublished ?? 0),
            'total_amount'=> (float) ($stats->total_amount ?? 0),
            'currency'    => $currency,
        ];
    }
}
