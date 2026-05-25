<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\PopularSearch;
use App\Models\backend\TourType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PopularSearchController
{
    protected $userId;
    protected $table;
    protected $module;
    protected $notify_title;

    public function __construct()
    {
        $this->userId = currentUserId();
        $this->table = PopularSearch::class;
        $this->module = 'popular-searches';
        $this->notify_title = 'Popular Search';
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $moduleName = collect($segments)->last();
        $moduleTitle = Str::singular(str_replace('-', ' ', $moduleName));

        $getData = ($this->table)::with('tourType')->orderByDesc('id')->get();
        $columns = [
            'title',
            'tour_type',
            'search_items',
            'created_at',
            'created_by',
        ];

        $hiddenColumns = [
            'created_by',
        ];

        return view('backend.' . $this->module . '.listing', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'moduleName'       => $moduleName,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
            'tourTypeMap'      => TourType::pluck('title', 'id'),
            'meta_title'       => 'Listing | Admin Panel',
            'meta_keywords'    => '',
            'meta_description' => '',
        ]);
    }

    public function create(Request $request)
    {
        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 2] ?? null;
        $moduleTitle = Str::singular(str_replace('-', ' ', $moduleName));

        return view('backend.' . $this->module . '.form', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'tourTypes'        => TourType::activeList(),
            'meta_title'       => 'Create | Admin Panel',
            'meta_keywords'    => '',
            'meta_description' => '',
        ]);
    }

    public function store(Request $request)
    {
        $action = $request->submitBtn;

        if ($request->isMethod('post')) {
            $request->validate([
                'title'                           => 'required|string|max:255',
                'tour_type_id'                    => 'nullable|exists:tour_types,id',
                'popular-search-items'            => 'required|array|min:1',
                'popular-search-items.*.title'    => 'required|string|max:255',
            ]);

            $dbdata = ($this->table)::create($this->payloadFromRequest($request));

            if (!$dbdata) {
                return back()->with('error', 'Failed to create.');
            }

            if ($action === 'save_new') {
                return to_route($this->module . '.create')->with('success', $this->notify_title . ' Created Successfully.');
            } elseif ($action === 'save_stay') {
                return to_route($this->module . '.edit', $dbdata->id)->with('success', $this->notify_title . ' Created Successfully.');
            }

            return redirect()->route($this->module)->with('success', $this->notify_title . ' Created Successfully.');
        }

        return back()->with('error', 'Invalid request method.');
    }

    public function duplicate($id)
    {
        $source = ($this->table)::withTrashed()->findOrFail($id);

        $dbdata = ($this->table)::create([
            'title'         => $source->title . ' (Copy)',
            'tour_type_id'  => $source->tour_type_id,
            'search_items'  => $source->search_items,
            'created_by'    => currentUserId(),
        ]);

        return redirect()
            ->route($this->module . '.edit', $dbdata->id)
            ->with('success', $this->notify_title . ' duplicated. Update title if needed.');
    }

    public function editForm($id, Request $request)
    {
        $dbdata = ($this->table)::findOrFail($id);

        $segments = $request->segments();
        $moduleName = $segments[count($segments) - 3] ?? null;
        $moduleTitle = Str::singular(str_replace('-', ' ', $moduleName));

        return view('backend.' . $this->module . '.edit', [
            'data'             => $dbdata,
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'tourTypes'        => TourType::activeList(),
            'meta_title'       => 'Edit | Admin Panel',
            'meta_keywords'    => '',
            'meta_description' => '',
        ]);
    }

    public function update(Request $request, $id)
    {
        $action = $request->submitBtn;

        $request->validate([
            'title'                           => 'required|string|max:255',
            'tour_type_id'                    => 'nullable|exists:tour_types,id',
            'popular-search-items'            => 'required|array|min:1',
            'popular-search-items.*.title'    => 'required|string|max:255',
        ]);

        try {
            $dbdata = ($this->table)::findOrFail($id);
            $dbdata->update($this->payloadFromRequest($request));

            if ($action === 'save_new') {
                return to_route($this->module . '.create')->with('success', $this->notify_title . ' Updated! Ready to add another.');
            } elseif ($action === 'save_stay') {
                return to_route($this->module . '.edit', $dbdata->id)->with('success', $this->notify_title . ' Updated! You can continue editing.');
            }

            return redirect()->route($this->module)->with('success', $this->notify_title . ' Successfully updated.');
        } catch (\Exception $e) {
            Log::error('Popular search update failed: ' . $e->getMessage());

            return back()->with('error', 'An error occurred while updating: ' . $e->getMessage());
        }
    }

    public function deleteAll(Request $request)
    {
        $selectedIds = $request->ids;
        $trashed = $request->trashed;

        if (is_array($selectedIds) && count($selectedIds)) {
            if ($trashed === 'trashed') {
                ($this->table)::withTrashed()->whereIn('id', $request->ids)->forceDelete();

                return redirect()->route($this->module)->with('success', 'Selected ' . $this->notify_title . ' permanently deleted!');
            }

            ($this->table)::whereIn('id', $selectedIds)->delete();

            return redirect()->route($this->module)->with('success', 'Selected ' . $this->notify_title . ' deleted successfully.');
        }

        return redirect()->route($this->module)->with('error', 'No ' . $this->notify_title . ' selected.');
    }

    public function deleteAjax($id)
    {
        try {
            $dbdata = ($this->table)::findOrFail($id);
            $dbdata->delete();

            return response()->json([
                'success' => true,
                'message' => $this->notify_title . ' Deleted Successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $this->notify_title . ' Failed to Delete: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function modalView($id)
    {
        $dbdata = ($this->table)::with(['creator', 'tourType'])->findOrFail($id);

        $terms = collect($dbdata->search_items ?? [])
            ->pluck('title')
            ->filter()
            ->values()
            ->all();

        return response()->json([
            'id'              => $dbdata->id,
            'title'           => $dbdata->title,
            'tour_type'       => $dbdata->tourType?->title,
            'search_items'    => $terms,
            'created_at'      => $dbdata->created_at ? $dbdata->created_at->format('M d, Y') : null,
            'created_by_name' => trim(($dbdata->creator->first_name ?? '') . ' ' . ($dbdata->creator->last_name ?? '')),
        ]);
    }

    public function trashed(Request $request)
    {
        $segments = $request->segments();
        $trashed = collect($segments)->last();
        $moduleTitle = Str::singular(str_replace('-', ' ', $trashed));
        $moduleName = $segments[count($segments) - 2] ?? null;

        $getData = ($this->table)::onlyTrashed()->with('tourType')->latest()->get();

        $columns = [
            'title',
            'tour_type',
            'search_items',
            'created_at',
            'created_by',
        ];

        $hiddenColumns = [
            'created_by',
        ];

        return view('backend.' . $this->module . '.listing', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'moduleName'       => $trashed,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
            'tourTypeMap'      => TourType::pluck('title', 'id'),
            'meta_title'       => 'Trashed List | Admin Panel',
            'meta_keywords'    => '',
            'meta_description' => '',
        ]);
    }

    public function restore($id)
    {
        $restore = ($this->table)::withTrashed()->findOrFail($id);
        $restore->restore();

        return redirect()->route($this->module)->with('success', $this->notify_title . ' Restored Successfully!');
    }

    public function forceDelete($id)
    {
        $forcedelete = ($this->table)::withTrashed()->findOrFail($id);
        $forcedelete->forceDelete();

        return redirect()->route($this->module)->with('success', $this->notify_title . ' Permanently Deleted!');
    }

    private function payloadFromRequest(Request $request): array
    {
        $items = collect($request->input('popular-search-items', []))
            ->map(fn ($row) => [
                'title' => trim($row['title'] ?? ''),
            ])
            ->filter(fn ($row) => $row['title'] !== '')
            ->values()
            ->all();

        return [
            'title'         => $request->title,
            'tour_type_id'  => $request->tour_type_id ?: null,
            'search_items'  => $items,
            'created_by'    => currentUserId(),
        ];
    }
}
