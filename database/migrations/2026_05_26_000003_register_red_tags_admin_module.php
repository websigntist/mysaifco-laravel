<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
  private const ACTIONS = 'add | edit | view | status | delete | delete all | more | duplicate | store | update | trashed | restore | forcedelete | modal-view';

    public function up(): void
    {
        $existing = DB::table('modules')->where('module_slug', 'red-tags')->first();

        if ($existing) {
            DB::table('modules')->where('id', $existing->id)->update([
                'actions'    => self::ACTIONS,
                'updated_at' => now(),
            ]);
            $moduleId = $existing->id;
        } else {
            $toursModule = DB::table('modules')->where('module_slug', 'tours')->first();
            $parentId = $toursModule->parent_id ?? 0;
            $ordering = $toursModule
                ? (int) $toursModule->ordering + 1
                : 24;

            $moduleId = DB::table('modules')->insertGetId([
                'parent_id'    => $parentId,
                'module_title' => 'Red Tags',
                'module_slug'  => 'red-tags',
                'icon'         => 'tag',
                'show_in_menu' => 'Yes',
                'actions'      => self::ACTIONS,
                'ordering'     => $ordering,
                'status'       => 'Active',
                'created_by'   => $toursModule->created_by ?? 1,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }

        $sourceModule = DB::table('modules')->where('module_slug', 'tours')->first();
        if (!$sourceModule) {
            return;
        }

        $rels = DB::table('user_type_modules_rel')->where('module_id', $sourceModule->id)->get();
        foreach ($rels as $rel) {
            $exists = DB::table('user_type_modules_rel')
                ->where('user_type_id', $rel->user_type_id)
                ->where('module_id', $moduleId)
                ->exists();

            if ($exists) {
                continue;
            }

            DB::table('user_type_modules_rel')->insert([
                'user_type_id' => $rel->user_type_id,
                'module_id'    => $moduleId,
                'actions'      => $rel->actions ?: self::ACTIONS,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }
    }

    public function down(): void
    {
        $row = DB::table('modules')->where('module_slug', 'red-tags')->first();
        if (!$row) {
            return;
        }

        DB::table('user_type_modules_rel')->where('module_id', $row->id)->delete();
        DB::table('modules')->where('id', $row->id)->delete();
    }
};
