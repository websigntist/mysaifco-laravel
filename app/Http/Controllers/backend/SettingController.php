<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Setting;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SettingController
{
    protected $userId;
    protected $table;
    protected $module;
    protected $notify_title;

    public function __construct()
    {
        $this->userId = currentUserId();
        $this->table = Setting::class;
        $this->module = 'settings';
        $this->notify_title = 'Settings';
    }

    public function index(Request $request)
    {
        $segments = $request->segments();
        $moduleName = collect($segments)->last();
        $moduleTitle = Str::singular($moduleName);

        return view('backend.' . $this->module . '.edit', [
            'title'            => $moduleTitle,
            'module'           => $moduleName,
            'moduleName'       => $moduleName,
            'meta_title'       => "Setting | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

    public function update(Request $request)
    {
        $activeTab = $request->input('active_tab');

        try {
            // 1 Normal text options
            $options = $request->input('settings', []);

            // Get all option names from DB
           //$dbOptions = DB::table($this->table)->pluck('setting_name')->toArray();
            $dbOptions = ($this->table)::pluck('setting_name')->toArray(); // ✅

            foreach ($options as $key => $value) {
                if (!in_array($key, $dbOptions)) {
                    ($this->table)::insert([
                        'setting_name'  => $key,
                        'setting_value' => $value,
                    ]);
                } else {
                    ($this->table)::where('setting_name', $key)->update([
                        'setting_value' => $value,
                    ]);
                }
            }

            // 2 Delete image options (if requested)
            $deleteImg = $request->input('delete_img', []);
            foreach ($deleteImg as $col => $item) {
                if (!empty($item)) {
                    ($this->table)::where('setting_name', $col)->update([
                        'setting_value' => '',
                    ]);
                }
            }

            // 3 File upload options (logo, favicon, footer_logo, etc.)
            if ($request->hasFile('settings')) {
                foreach ($request->file('settings') as $key => $file) {
                    if ($file && $file->isValid()) {
                        // Save file to storage/app/public/settings
                        $filename = time() . '_' . $file->getClientOriginalName();
                        $file->move(getPublicAssetPath('assets/images/settings'), $filename);

                        if (!in_array($key, $dbOptions)) {
                            ($this->table)::insert([
                                'setting_name'  => $key,
                                'setting_value' => $filename,
                            ]);
                        } else {
                            ($this->table)::where('setting_name', $key)->update([
                                'setting_value' => $filename,
                            ]);
                        }
                    }
                }
            }

            return redirect()->back()
                ->with('success', 'Settings updated successfully!')
                ->with('active_tab', $activeTab);
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update settings: ' . $e->getMessage())
                ->with('active_tab', $activeTab);
        }
    }
}
