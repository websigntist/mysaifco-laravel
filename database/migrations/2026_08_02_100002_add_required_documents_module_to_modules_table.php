<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private const ACTIONS = 'add | edit | view | status | delete | delete all | more | duplicate | store | update | trashed | restore | forcedelete | modal-view';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $existing = DB::table('modules')->where('module_slug', 'required-documents')->first();

        if ($existing) {
            DB::table('modules')->where('id', $existing->id)->update([
                'actions'    => self::ACTIONS,
                'updated_at' => now(),
            ]);
            $moduleId = $existing->id;
        } else {
            $maxOrder = DB::table('modules')->max('ordering') ?? 0;

            $data = [
                'parent_id'    => 0,
                'module_title' => 'Required Documents',
                'module_slug'  => 'required-documents',
                'actions'      => self::ACTIONS,
                'status'       => 'Active',
                'ordering'     => $maxOrder + 1,
                'created_by'   => 1,
                'created_at'   => now(),
                'updated_at'   => now(),
            ];

            if (Schema::hasColumn('modules', 'icon')) {
                $data['icon'] = 'file-text';
            }
            if (Schema::hasColumn('modules', 'show_in_menu')) {
                $data['show_in_menu'] = 'Yes';
            }

            $moduleId = DB::table('modules')->insertGetId($data);
        }

        $userTypes = DB::table('user_types')->pluck('id');
        foreach ($userTypes as $userTypeId) {
            $already = DB::table('user_type_modules_rel')
                ->where('user_type_id', $userTypeId)
                ->where('module_id', $moduleId)
                ->exists();

            if (!$already) {
                DB::table('user_type_modules_rel')->insert([
                    'user_type_id' => $userTypeId,
                    'module_id'    => $moduleId,
                    'actions'      => self::ACTIONS,
                    'created_at'   => now(),
                    'updated_at'   => now(),
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $module = DB::table('modules')->where('module_slug', 'required-documents')->first();
        if ($module) {
            DB::table('user_type_modules_rel')->where('module_id', $module->id)->delete();
            DB::table('modules')->where('id', $module->id)->delete();
        }
    }
};
