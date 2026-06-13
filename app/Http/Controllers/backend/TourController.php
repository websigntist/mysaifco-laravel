<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\Module;
use App\Models\backend\Tour;
use App\Models\backend\RedTag;
use App\Models\backend\TourType;
use App\Models\backend\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Termwind\Components\Dd;
use Illuminate\Support\Facades\Response;

class TourController
{
    protected $userId;
    protected $table;
    protected $module;
    protected $notify_title;

    public function __construct()
    {
        $this->userId = currentUserId(); // global helper
        $this->table = Tour::class;
        $this->module = 'tours';
        $this->notify_title = 'Tour';
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $moduleName = collect($segments)->last();
        $moduleTitle = Str::singular($moduleName);

        $getData = ($this->table)::latest()->get();
        $columns = [
            'image',
            'title',
            'tour_type',
            'price',
            'status',
            'ordering',
            'created_at',
            'created_by'
        ];

        // columns to hide
        $hiddenColumns = [
            'created_by',
            'ordering',
            'title',
        ];

        return view('backend.' . $this->module . '.listing', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'moduleName'       => $moduleName,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
            'tourTypeMap'      => TourType::pluck('title', 'id'),
            'meta_title'       => "List | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function create(Request $request)
    {
        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 2] ?? null;
        $moduleTitle = Str::singular($moduleName);

        $getStatus = getEnumValues($this->module, 'status');
        $tourTypes = TourType::activeList();
        $selectedTourTypes = $this->resolveTourTypeIds(old('tour_type', []));

        return view('backend.' . $this->module . '.form', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'getStatus'        => $getStatus,
            'tourTypes'        => $tourTypes,
            'redTags'          => RedTag::activeList(),
            'selectedTourTypes' => $selectedTourTypes,
            'meta_title'       => "Create New | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function store(Request $request)
    {
        /*Log::info('tour_type value:', ['tour_type' => $request->tour_type]);
        dd($request->tour_type);*/
        $action = $request->submitBtn;

        if ($request->isMethod('post')) {
            // Log request data for debugging
            Log::info('Request data:', $request->all());

            // Validate input
            $validated = $request->validate([
                'title'         => 'required|string|max:255',
                'friendly_url'  => 'required|string|unique:tours,friendly_url|max:255',
                'tour_duration' => 'required|string|max:255',
                'tour_location' => 'required|string|max:255',
                'max_persons'   => 'required|integer|max:255',
                'price'         => 'required|numeric|min:0',
                'meta_title'    => 'required|string|max:255',
                'image'         => 'nullable|image|mimes:webp,jpeg,png,jpg|max:2048',

                //'tour_type'     => 'nullable|array',      // ← add this
                //'tour_type.*'   => 'nullable|string',     // ← and this
            ]);

            $uploadImage = imageHandling($request, null, 'image', $this->module);

            // Insert into table
            $dataToStore = [
                'title'            => $request->title,
                'friendly_url'     => $request->friendly_url,
                'tour_duration'    => $request->tour_duration,
                'tour_location'    => $request->tour_location,
                'max_persons'      => $request->max_persons,
                'min_age'          => $request->min_age,
                'tour_type'        => $this->encodeTourTypesForStorage($request->tour_type),
                'red_tag_id'       => $request->red_tag_id ?: null,
                'extra_options'    => $request->extra_options,
                'itinerary'        => $request->itinerary,
                'description'      => $request->description,
                'price'            => (int)$request->price,
                'status'           => $request->status,
                'ordering'         => (int)($request->ordering ?? 0),
                'meta_title'       => $request->meta_title,
                'meta_keywords'    => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'created_by'       => currentUserId(),
                'image'            => $uploadImage,
                'image_alt'        => $request->image_alt,
                'image_title'      => $request->image_title,
            ];

            $tour = ($this->table)::create($dataToStore);
            if (!$tour) {
                Log::error('Failed to create', $dataToStore);
                return back()->with('error', 'Failed to create.');
            }

            if ($action === 'save_new') {
                return to_route($this->module . '.create')->with('success', $this->notify_title . ' Created Successfully.');
            } elseif ($action === 'save_stay') {
                return to_route($this->module . '.edit', $tour->id)->with('success', $this->notify_title . ' Created successfully.');
            } else {
                return redirect()->route($this->module)->with('success', $this->notify_title . ' Created successfully.');
            }

        }

        return back()->with('error', 'Invalid request method.');
    }

    public function duplicate($id)
    {
        $source = ($this->table)::withTrashed()->findOrFail($id);

        $baseUrl = $source->friendly_url ?: 'tour';
        $candidateUrl = '';
        for ($i = 0; $i < 50; $i++) {
            $candidateUrl = $baseUrl . '-copy-' . Str::lower(Str::random(6));
            if (strlen($candidateUrl) > 255) {
                $candidateUrl = Str::limit($baseUrl, 220, '') . '-' . Str::lower(Str::random(6));
            }
            if (!($this->table)::where('friendly_url', $candidateUrl)->exists()) {
                break;
            }
        }

        if (($this->table)::where('friendly_url', $candidateUrl)->exists()) {
            return redirect()->route($this->module)->with('error', 'Could not generate a unique URL for the duplicate.');
        }

        $newImage = null;
        if (!empty($source->image)) {
            $dir = public_path('assets/images/' . $this->module);
            $srcPath = $dir . DIRECTORY_SEPARATOR . $source->image;
            if (File::exists($srcPath)) {
                $ext = pathinfo($source->image, PATHINFO_EXTENSION);
                $newImage = uniqid('dup_', true) . ($ext !== '' ? '.' . $ext : '');
                File::copy($srcPath, $dir . DIRECTORY_SEPARATOR . $newImage);
            }
        }

        $tour = ($this->table)::create([
            'title'            => $source->title . ' (Copy)',
            'friendly_url'     => $candidateUrl,
            'tour_duration'    => $source->tour_duration,
            'tour_location'    => $source->tour_location,
            'max_persons'      => $source->max_persons,
            'min_age'          => $source->min_age,
            'tour_type'        => $source->tour_type,
            'red_tag_id'       => $source->red_tag_id,
            'extra_options'    => $source->extra_options,
            'itinerary'        => $source->itinerary,
            'description'      => $source->description,
            'price'            => $source->price,
            'status'           => $source->status,
            'ordering'         => $source->ordering,
            'meta_title'       => $source->meta_title,
            'meta_keywords'    => $source->meta_keywords,
            'meta_description' => $source->meta_description,
            'created_by'       => currentUserId(),
            'image'            => $newImage,
            'image_alt'        => $source->image_alt,
            'image_title'      => $source->image_title,
        ]);

        return redirect()
            ->route($this->module . '.edit', $tour->id)
            ->with('success', $this->notify_title . ' duplicated. Adjust title or URL if needed.');
    }

    public function editForm($id, Request $request)
    {
        $tour = ($this->table)::findOrFail($id);

        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 3] ?? null;
        $moduleTitle = Str::singular($moduleName);

        $getStatus = getEnumValues($this->module, 'status');
        $tourTypes = TourType::activeList();
        $selectedTourTypes = $this->resolveTourTypeIds(
            old('tour_type', $this->parseStoredTourTypes($tour->tour_type))
        );

        return view('backend.' . $this->module . '.edit', [
            'data'             => $tour,
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'getStatus'        => $getStatus,
            'tourTypes'        => $tourTypes,
            'redTags'          => RedTag::activeList(),
            'selectedTourTypes' => $selectedTourTypes,
            'meta_title'       => "Edit | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function update(Request $request, $id)
    {
        $action = $request->submitBtn;
        // Validate input
        $request->validate([
            'title'         => 'required|string|max:255',
            'friendly_url'  => 'required|string|max:255|unique:tours,friendly_url,' . $id,
            'tour_duration' => 'required|string|max:255',
            'tour_location' => 'required|string|max:255',
            'max_persons'   => 'required|integer|max:255',
            'price'         => 'required|numeric|min:0',
            'meta_title'    => 'required|string|max:255',
            'image'         => 'nullable|image|mimes:webp,jpeg,png,jpg|max:2048',
        ]);

        try {
            // Find the
            $tour = ($this->table)::findOrFail($id);

            // Initialize data to update
            $dataToUpdate = [
                'title'            => $request->title,
                'friendly_url'     => $request->friendly_url,
                'tour_duration'    => $request->tour_duration,
                'tour_location'    => $request->tour_location,
                'max_persons'      => $request->max_persons,
                'min_age'          => $request->min_age,
                'tour_type'        => $this->encodeTourTypesForStorage($request->tour_type),
                'red_tag_id'       => $request->red_tag_id ?: null,
                'extra_options'    => $request->extra_options,
                'itinerary'        => $request->itinerary,
                'description'      => $request->description,
                'price'            => (int)$request->price,
                'status'           => $request->status,
                'ordering'         => (int)($request->ordering ?? 0),
                'meta_title'       => $request->meta_title,
                'meta_keywords'    => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'created_by'       => currentUserId(),
                'image_alt'        => $request->image_alt,
                'image_title'      => $request->image_title,
            ];

            $dataToUpdate['image'] = imageHandling($request, $tour, 'image', $this->module);

            // Update
            $tour->update($dataToUpdate);

            if ($action === 'save_new') {
                return to_route('tours.create')->with('success', $this->notify_title . ' Updated! Ready to add another.');
            } elseif ($action === 'save_stay') {
                return to_route('tours.edit', $tour->id)->with('success', $this->notify_title . ' Updated! You can continue editing.');
            } else {
                return redirect()->route($this->module)->with('success', $this->notify_title . ' updated successfully.');
            }

            return redirect()->route($this->module)->with('success', $this->notify_title . ' created successfully.');
        } catch (\Exception $e) {
            Log::error('Tour update failed: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while updating.: ' . $e->getMessage());
        }
    }

    public function status($id)
    {
        $tour = ($this->table)::findOrFail($id);

        // Toggle status
        $newStatus = $tour->status === 'active' ? 'inactive' : 'active';

        $tour->update(['status' => $newStatus]);

        return redirect()->route($this->module)->with('success', $this->notify_title . ' status updated to ' . ucfirst($newStatus) . '.');
    }

    public function view($id)
    {
        $tour = ($this->table)::with(['faqs' => fn ($q) => $q->orderBy('tour_faq.ordering')])->findOrFail($id);

        return view('backend.' . $this->module . '.view', [
            'tour'             => $tour,
            'meta_title'       => "View Detail | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => '',
        ]);
    }

    public function delete($id)
    {
        try {
            $tour = ($this->table)::findOrFail($id);      // Find the
            $tour->delete();                              // Delete it

            return redirect()->route($this->module)->with('success', $this->notify_title . ' deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
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
        $tour = ($this->table)::findOrFail($id);

        // Toggle or set status
        $newStatus = $request->status === 'active' ? 'inactive' : 'active';
        $tour->status = $newStatus;
        $tour->save();

        return response()->json([
            'success' => true,
            'status'  => $newStatus,
            'message' => $this->notify_title . " Status Updated to {$newStatus}"
        ]);
    }

    public function updateTitleAjax(Request $request)
    {
        $request->validate([
            'id'    => 'required|string|exists:tours,id',
            'title' => 'required|string|min:0',
        ]);

        $tour = ($this->table)::findOrFail($request->id);
        $tour->title = $request->title;
        $tour->save();

        return response()->json([
            'success' => true,
            'message' => $this->notify_title . ' title updated successfully',
            'id'      => $tour->id,
            'title'   => $tour->title,
        ]);
    }

    public function updateOrderingAjax(Request $request)
    {
        $request->validate([
            'id'       => 'required|integer|exists:tours,id',
            'ordering' => 'required|integer|min:0',
        ]);

        $tour = ($this->table)::findOrFail($request->id);
        $tour->ordering = $request->ordering;
        $tour->save();

        return response()->json([
            'success'  => true,
            'message'  => $this->notify_title . ' ordering updated successfully',
            'id'       => $tour->id,
            'ordering' => $tour->ordering,
        ]);
    }

    public function deleteAjax($id)
    {
        try {
            // Find the
            $tour = ($this->table)::findOrFail($id);

            // Delete the itself
            $tour->delete();

            return response()->json([
                'success' => true,
                'message' => $this->notify_title . ' deleted successfully.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $this->notify_title . ' failed to delete: ' . $e->getMessage()
            ], 500);
        }
    }

    public function modalView($id)
    {
        // Load the with its parent and creator relationships
        $tour = ($this->table)::with([
            'creator'
        ])->findOrFail($id);

        return response()->json([
            'id'              => $tour->id,
            'price'           => $tour->price,
            'currency'           => strtoupper(get_setting('site_currency')),
            'title'           => $tour->title,
            'friendly_url'    => $tour->friendly_url,
            'tour_duration'   => $tour->tour_duration,
            'tour_location'   => $tour->tour_location,
            'max_persons'     => $tour->max_persons,
            'min_age'         => $tour->min_age,
            'tour_type'       => $tour->tour_type,
            'extra_options'   => $tour->extra_options,
            'itinerary'       => $tour->itinerary,
            'description'     => $tour->description,
            'ordering'        => $tour->ordering,
            'status'          => $tour->status,
            'image'           => $tour->image ?? null,
            'image_alt'       => $tour->image_alt ?? null,
            'image_title'     => $tour->image_title ?? null,
            'created_at'      => $tour->created_at ? $tour->created_at->format('M d, Y') : null,
            'created_by_name' => trim(($tour->creator->first_name ?? '') . ' ' . ($tour->creator->last_name ?? '')),
        ]);
    }

    public function export()
    {
        $fileName = 'tours_export_' . now()->format('Y-m-d_H-i-s') . '.csv';

        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => "attachment; filename={$fileName}",
        ];

        $columns = [
            'ID',
            'Tour Title',
            'Price',
            'Friendly URL',
            'Tour Duration',
            'Tour Location',
            'Max Persons',
            'Min Age',
            'Tour Type',
            'Extra Options',
            'Itinerary',
            'Description',
            'Status',
            'Image',
            'Image Alt',
            'Image Title',
            'Ordering',
            'Created By',
            'Meta Title',
            'Meta Keywords',
            'Meta Description',
            'Created At',
            'Updated At'
        ];

        $callback = function () use ($columns) {
            $handle = fopen('php://output', 'w');

            // Add header
            fputcsv($handle, $columns);

            // Add rows
            ($this->table)::chunk(200, function ($tours) use ($handle) {
                foreach ($tours as $tour) {
                    fputcsv($handle, [
                        $tour->id,
                        $tour->title,
                        $tour->price,
                        $tour->friendly_url,
                        $tour->tour_duration,
                        $tour->tour_location,
                        $tour->max_persons,
                        $tour->min_age,
                        $tour->tour_type,
                        $tour->extra_options,
                        $tour->itinerary,
                        $tour->description,
                        $tour->status,
                        $tour->image,
                        $tour->image_alt,
                        $tour->image_title,
                        $tour->ordering,
                        $tour->creator->first_name . ' ' . $tour->creator->last_name,
                        $tour->meta_title,
                        $tour->meta_keywords,
                        $tour->meta_description,
                        $tour->created_at,
                        $tour->updated_at,
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

        return view('backend.' . $this->module . '.import', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'meta_title'       => "Import CSV List | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt|max:2048',
        ]);

        if (($handle = fopen($request->file('csv_file')->getRealPath(), 'r')) !== false) {

            $header = fgetcsv($handle, 1000, ',');

            // Clean header (removes BOM, whitespace, invisible chars)
            $header = array_map(function ($col) {
                return trim(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $col));
            }, $header);

            // Debug — remove after fixing
            // dd($header);

            $rowNumber = 1;
            $errors = [];

            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                $rowNumber++;

                // Skip empty rows
                if (empty(array_filter($row)))
                    continue;

                // Check column count matches header
                if (count($header) !== count($row)) {
                    $errors[] = "Row $rowNumber: column count mismatch, skipped.";
                    continue;
                }

                $data = array_combine($header, $row);

                // Check required field exists
                if (empty($data['friendly_url'])) {
                    $errors[] = "Row $rowNumber: missing friendly_url, skipped.";
                    continue;
                }

                ($this->table)::updateOrCreate(['friendly_url' => $data['friendly_url']], [
                        'title'            => $data['title'] ?? '',
                        'tour_duration'    => $data['tour_duration'] ?? '',
                        'tour_location'    => $data['tour_location'] ?? '',
                        'max_persons'      => $data['max_persons'] ?? '',
                        'min_age'          => $data['min_age'] ?? '',
                        'tour_type'        => $data['tour_type'] ?? '',
                        'extra_options'    => $data['extra_options'] ?? '',
                        'description'      => $data['description'] ?? '',
                        'itinerary'        => $data['itinerary'] ?? '',
                        'price'            => $data['price'] ?? '',
                        'status'           => $data['status'] ?? 'active',
                        'image'            => $data['image'] ?? null,
                        'image_alt'        => $data['image_alt'] ?? null,
                        'image_title'      => $data['image_title'] ?? null,
                        'ordering'         => $data['ordering'] ?? 0,
                        'created_by'       => auth()->id(),
                        'meta_title'       => $data['meta_title'] ?? '',
                        'meta_keywords'    => $data['meta_keywords'] ?? '',
                        'meta_description' => $data['meta_description'] ?? '',
                        'created_at'       => $data['created_at'] ?? now(),
                        'updated_at'       => $data['updated_at'] ?? now(),
                    ]);
            }

            fclose($handle);

            $message = $this->notify_title . 's imported successfully.';
            if (!empty($errors)) {
                $message .= ' Skipped rows: ' . implode(' | ', $errors);
            }

            return redirect()->route($this->module)->with('success', $message);
        }

        return redirect()->route($this->module)->with('error', 'Failed to open file.');
    }

    public function trashed(Request $request)
    {
        $segments = $request->segments();
        $trashed = collect($segments)->last();
        $moduleTitle = Str::singular($trashed);
        $moduleName = $segments[count($segments) - 2] ?? null;

        $columns = [
            'image',
            'title',
            'tour_type',
            'price',
            'status',
            'ordering',
            'created_at',
            'created_by'
        ];

        // columns to hide
        $hiddenColumns = [
            'created_by',
            'title',
        ];

        $getData = ($this->table)::onlyTrashed()->latest()->get();

        return view('backend.' . $this->module . '.listing', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'moduleName'       => $trashed,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
            'tourTypeMap'      => TourType::pluck('title', 'id'),
            'meta_title'       => "Trashed list | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function restore($id)
    {
        $restore = ($this->table)::withTrashed()->findOrFail($id);
        $restore->restore();

        return redirect()->route($this->module)->with('success', $this->notify_title . ' restored successfully!');
    }

    public function forceDelete($id)
    {
        $forcedelete = ($this->table)::withTrashed()->findOrFail($id);
        $forcedelete->forceDelete();

        return redirect()->route($this->module)->with('success', $this->notify_title . ' permanently deleted!');
    }

    private function normalizeTourTypeInput($values): array
    {
        if (!is_array($values)) {
            return [];
        }

        return array_values(array_filter(array_map('intval', $values)));
    }

    /**
     * Store tour type as plain text (e.g. "Desert Safari" or "Desert Safari, Dubai Tour").
     */
    private function encodeTourTypesForStorage($values): ?string
    {
        $ids = $this->normalizeTourTypeInput($values);
        if (empty($ids)) {
            return null;
        }

        $names = TourType::whereIn('id', $ids)
            ->orderBy('ordering')
            ->orderBy('title')
            ->get()
            ->map(fn (TourType $type) => trim((string) ($type->title ?? '')))
            ->filter()
            ->values()
            ->all();

        return $names !== [] ? implode(', ', $names) : null;
    }

    /**
     * @param mixed $stored
     * @return array<int, string|int>
     */
    private function parseStoredTourTypes($stored): array
    {
        if (is_string($stored) && $stored !== '') {
            $trimmed = trim($stored);
            if (str_starts_with($trimmed, '[') || str_starts_with($trimmed, '{')) {
                $decoded = json_decode($stored, true);
                if (is_array($decoded)) {
                    return $this->parseStoredTourTypes($decoded);
                }
            }

            return array_map('trim', explode(',', $stored));
        }

        if (!is_array($stored)) {
            return [];
        }

        $parsed = [];
        foreach ($stored as $value) {
            if (is_array($value)) {
                if (!empty($value['title'])) {
                    $parsed[] = $value['title'];
                } elseif (!empty($value['title_1'])) {
                    $parsed[] = $value['title_1'];
                } elseif (!empty($value['id'])) {
                    $parsed[] = (int) $value['id'];
                }
            } else {
                $parsed[] = $value;
            }
        }

        return $parsed;
    }

    private function resolveTourTypeIds($values): array
    {
        if (is_string($values)) {
            $values = array_map('trim', explode(',', $values));
        }

        if (!is_array($values)) {
            return [];
        }

        $ids = [];
        foreach ($values as $value) {
            if (is_array($value) && !empty($value['id'])) {
                $ids[] = (int) $value['id'];
                continue;
            }

            if (is_numeric($value) && (int) $value > 0) {
                $ids[] = (int) $value;
                continue;
            }

            if (is_string($value) && $value !== '') {
                $match = TourType::where('title', $value)->first();
                if ($match) {
                    $ids[] = $match->id;
                }
            }
        }

        return array_values(array_unique($ids));
    }
}
