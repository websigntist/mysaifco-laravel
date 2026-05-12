<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    private array $slugs = [
        'user-types',
        'pages',
        'sliders',
        'static-blocks',
        'testimonials',
        'faqs',
    ];

    public function up(): void
    {
        foreach ($this->slugs as $slug) {
            $rows = DB::table('modules')->where('module_slug', $slug)->get();
            foreach ($rows as $row) {
                if (!is_string($row->actions ?? null)) {
                    continue;
                }
                if (preg_match('/\bduplicate\b/i', $row->actions)) {
                    continue;
                }
                DB::table('modules')->where('id', $row->id)->update([
                    'actions' => trim($row->actions) . ' | duplicate',
                ]);
            }
        }
    }

    public function down(): void
    {
        foreach ($this->slugs as $slug) {
            $rows = DB::table('modules')->where('module_slug', $slug)->get();
            foreach ($rows as $row) {
                if (!is_string($row->actions ?? null)) {
                    continue;
                }
                $actions = preg_replace('/\s*\|\s*duplicate\s*/i', '', $row->actions);
                $actions = preg_replace('/\s*\|\s*$/', '', trim($actions));
                DB::table('modules')->where('id', $row->id)->update([
                    'actions' => $actions,
                ]);
            }
        }
    }
};
