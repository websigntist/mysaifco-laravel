<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\ExploreUae;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ExploreUaeController
{
    protected $userId;
    protected $table;
    protected $module;
    protected $notify_title;

    public function __construct()
    {
        $this->userId = currentUserId();
        $this->table = ExploreUae::class;
        $this->module = 'explore-uae';
        $this->notify_title = 'Explore UAE';
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $moduleName = collect($segments)->last();
        $moduleTitle = Str::singular(str_replace('-', ' ', $moduleName));

        $getData = ($this->table)::orderBy('ordering')->orderByDesc('id')->get();
        $columns = [
            'title',
            'status',
            'ordering',
            'created_at',
            'created_by',
        ];

        $hiddenColumns = [
            'created_by',
            'ordering',
        ];

        return view('backend.explore-uae.listing', [
            'title'            => $moduleTitle,
            'module'           => $this->module,
            'moduleName'       => $moduleName,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
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

        return view('backend.explore-uae.form', [
            'title'            => $moduleTitle,
            'module'           => $this->module,
            'getStatus'        => getEnumValues('explore_uaes', 'status'),
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
                'title'       => 'required|string|max:255',
                'description' => 'nullable|string',
                'status'      => 'required|string',
                'title1'      => 'nullable|string|max:255',
                'sub_title1'  => 'nullable|string|max:255',
                'title2'      => 'nullable|string|max:255',
                'sub_title2'  => 'nullable|string|max:255',
                'title3'      => 'nullable|string|max:255',
                'sub_title3'  => 'nullable|string|max:255',
                'title4'      => 'nullable|string|max:255',
                'sub_title4'  => 'nullable|string|max:255',
                'title5'      => 'nullable|string|max:255',
                'sub_title5'  => 'nullable|string|max:255',
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
            'title'       => $source->title . ' (Copy)',
            'description' => $source->description,
            'title1'      => $source->title1,
            'sub_title1'  => $source->sub_title1,
            'title2'      => $source->title2,
            'sub_title2'  => $source->sub_title2,
            'title3'      => $source->title3,
            'sub_title3'  => $source->sub_title3,
            'title4'      => $source->title4,
            'sub_title4'  => $source->sub_title4,
            'title5'      => $source->title5,
            'sub_title5'  => $source->sub_title5,
            'status'      => $source->status,
            'ordering'    => $source->ordering,
            'created_by'  => currentUserId(),
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

        return view('backend.explore-uae.edit', [
            'data'             => $dbdata,
            'title'            => $moduleTitle,
            'module'           => $this->module,
            'getStatus'        => getEnumValues('explore_uaes', 'status'),
            'meta_title'       => 'Edit | Admin Panel',
            'meta_keywords'    => '',
            'meta_description' => '',
        ]);
    }

    public function update(Request $request, $id)
    {
        $action = $request->submitBtn;

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|string',
            'title1'      => 'nullable|string|max:255',
            'sub_title1'  => 'nullable|string|max:255',
            'title2'      => 'nullable|string|max:255',
            'sub_title2'  => 'nullable|string|max:255',
            'title3'      => 'nullable|string|max:255',
            'sub_title3'  => 'nullable|string|max:255',
            'title4'      => 'nullable|string|max:255',
            'sub_title4'  => 'nullable|string|max:255',
            'title5'      => 'nullable|string|max:255',
            'sub_title5'  => 'nullable|string|max:255',
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
            Log::error('Explore UAE update failed: ' . $e->getMessage());

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

    public function updateStatusAjax(Request $request, $id)
    {
        $dbdata = ($this->table)::findOrFail($id);

        $newStatus = $dbdata->status === 'Active' ? 'Inactive' : 'Active';
        $dbdata->status = $newStatus;
        $dbdata->save();

        return response()->json([
            'success' => true,
            'status'  => $newStatus,
            'message' => $this->notify_title . " Status Updated to {$newStatus}",
        ]);
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
        $dbdata = ($this->table)::with(['creator'])->findOrFail($id);

        return response()->json([
            'id'              => $dbdata->id,
            'title'           => $dbdata->title,
            'description'     => $dbdata->description,
            'title1'          => $dbdata->title1,
            'sub_title1'      => $dbdata->sub_title1,
            'title2'          => $dbdata->title2,
            'sub_title2'      => $dbdata->sub_title2,
            'title3'          => $dbdata->title3,
            'sub_title3'      => $dbdata->sub_title3,
            'title4'          => $dbdata->title4,
            'sub_title4'      => $dbdata->sub_title4,
            'title5'          => $dbdata->title5,
            'sub_title5'      => $dbdata->sub_title5,
            'status'          => $dbdata->status,
            'ordering'        => $dbdata->ordering,
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

        $getData = ($this->table)::onlyTrashed()->latest()->get();

        $columns = [
            'title',
            'status',
            'ordering',
            'created_at',
            'created_by',
        ];

        $hiddenColumns = [
            'created_by',
            'ordering',
        ];

        return view('backend.explore-uae.listing', [
            'title'            => $moduleTitle,
            'module'           => $this->module,
            'moduleName'       => $trashed,
            'getData'          => $getData,
            'columns'          => $columns,
            'hiddenColumns'    => $hiddenColumns,
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
        return [
            'title'       => $request->title,
            'description' => $request->description,
            'title1'      => $request->title1,
            'sub_title1'  => $request->sub_title1,
            'title2'      => $request->title2,
            'sub_title2'  => $request->sub_title2,
            'title3'      => $request->title3,
            'sub_title3'  => $request->sub_title3,
            'title4'      => $request->title4,
            'sub_title4'  => $request->sub_title4,
            'title5'      => $request->title5,
            'sub_title5'  => $request->sub_title5,
            'status'      => $request->status,
            'ordering'    => (int) ($request->ordering ?? 0),
            'created_by'  => currentUserId(),
        ];
    }
}
