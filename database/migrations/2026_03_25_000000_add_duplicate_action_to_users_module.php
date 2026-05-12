<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $row = DB::table('modules')->where('module_slug', 'users')->first();
        if (!$row) {
            return;
        }

        $actions = trim((string) $row->actions);
        if ($actions === '' || strcasecmp($actions, 'nil') === 0) {
            DB::table('modules')->where('module_slug', 'users')->update([
                'actions' => 'add | edit | view | status | delete | delete all | more | duplicate',
            ]);

            return;
        }

        if (!preg_match('/\bduplicate\b/i', $actions)) {
            DB::table('modules')->where('module_slug', 'users')->update([
                'actions' => $actions . ' | duplicate',
            ]);
        }
    }

    public function down(): void
    {
        $row = DB::table('modules')->where('module_slug', 'users')->first();
        if (!$row || !is_string($row->actions)) {
            return;
        }

        $actions = preg_replace('/\s*\|\s*duplicate\s*/i', '', $row->actions);
        $actions = preg_replace('/\s*\|\s*$/', '', trim($actions));
        DB::table('modules')->where('module_slug', 'users')->update([
            'actions' => $actions !== '' ? $actions : 'nil',
        ]);
    }
};
