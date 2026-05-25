<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    private const ACTIONS = 'add | edit | view | status | delete | delete all | more | duplicate | store | update | trashed | restore | forcedelete | modal-view';

    private const MODULES = [
        [
            'module_title' => 'Explore',
            'module_slug'  => 'explore',
            'icon'         => 'map-search',
        ],
        [
            'module_title' => 'Popular Searches',
            'module_slug'  => 'popular-searches',
            'icon'         => 'search',
        ],
    ];

    public function up(): void
    {
        $parent = DB::table('modules')->where('module_slug', 'tour-packages')->first();
        if (!$parent) {
            return;
        }

        $maxOrdering = (int) DB::table('modules')->where('parent_id', $parent->id)->max('ordering');
        $sourceModule = DB::table('modules')->where('module_slug', 'tours')->first();

        foreach (self::MODULES as $index => $config) {
            $maxOrdering++;
            $existing = DB::table('modules')->where('module_slug', $config['module_slug'])->first();

            if ($existing) {
                DB::table('modules')->where('id', $existing->id)->update([
                    'parent_id'    => $parent->id,
                    'module_title' => $config['module_title'],
                    'actions'      => self::ACTIONS,
                    'show_in_menu' => 'Yes',
                    'status'       => 'Active',
                    'updated_at'   => now(),
                ]);
                $moduleId = $existing->id;
            } else {
                $moduleId = DB::table('modules')->insertGetId([
                    'parent_id'    => $parent->id,
                    'module_title' => $config['module_title'],
                    'module_slug'  => $config['module_slug'],
                    'icon'         => $config['icon'],
                    'show_in_menu' => 'Yes',
                    'actions'      => self::ACTIONS,
                    'ordering'     => $maxOrdering,
                    'status'       => 'Active',
                    'created_by'   => $sourceModule->created_by ?? 1,
                    'created_at'   => now(),
                    'updated_at'   => now(),
                ]);
            }

            if (!$sourceModule) {
                continue;
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
    }

    public function down(): void
    {
        foreach (self::MODULES as $config) {
            $row = DB::table('modules')->where('module_slug', $config['module_slug'])->first();
            if (!$row) {
                continue;
            }

            DB::table('user_type_modules_rel')->where('module_id', $row->id)->delete();
            DB::table('modules')->where('id', $row->id)->delete();
        }
    }
};
