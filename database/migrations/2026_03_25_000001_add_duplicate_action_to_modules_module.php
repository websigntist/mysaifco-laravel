<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $row = DB::table('modules')->where('module_slug', 'modules')->first();
        if (!$row || !is_string($row->actions)) {
            return;
        }

        if (!preg_match('/\bduplicate\b/i', $row->actions)) {
            DB::table('modules')->where('module_slug', 'modules')->update([
                'actions' => trim($row->actions) . ' | duplicate',
            ]);
        }
    }

    public function down(): void
    {
        $row = DB::table('modules')->where('module_slug', 'modules')->first();
        if (!$row || !is_string($row->actions)) {
            return;
        }

        $actions = preg_replace('/\s*\|\s*duplicate\s*/i', '', $row->actions);
        $actions = preg_replace('/\s*\|\s*$/', '', trim($actions));
        DB::table('modules')->where('module_slug', 'modules')->update([
            'actions' => $actions,
        ]);
    }
};
