<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    private array $defaultSlugs = [
        'Desert Safari'        => 'desert-safari-tours',
        'Yacht Charter'        => 'yacht-charter',
        'Dubai City Tour'      => 'dubai-city-tour',
        'Abu Dhabi Tours'      => 'abu-dhabi-tours',
        'Dhow Cruise Tours'    => 'dhow-cruise-tours',
        'Dubai Combo Tours'    => 'dubai-combo-tours',
        'Water Activities'     => 'water-activities',
        'Theme Park Tickets'   => 'theme-park-tickets',
    ];

    public function up(): void
    {
        Schema::table('tour_types', function (Blueprint $table) {
            $table->string('friendly_url', 191)->nullable()->unique()->after('title');
        });

        foreach ($this->defaultSlugs as $title => $slug) {
            DB::table('tour_types')
                ->where('title', $title)
                ->update(['friendly_url' => $slug]);
        }

        $rows = DB::table('tour_types')->whereNull('friendly_url')->get(['id', 'title']);

        foreach ($rows as $row) {
            $slug = Str::slug((string) $row->title);
            if ($slug === '') {
                continue;
            }

            $unique = $slug;
            $n = 1;
            while (
                DB::table('tour_types')
                    ->where('friendly_url', $unique)
                    ->where('id', '!=', $row->id)
                    ->exists()
            ) {
                $unique = $slug . '-' . $n++;
            }

            DB::table('tour_types')->where('id', $row->id)->update(['friendly_url' => $unique]);
        }
    }

    public function down(): void
    {
        Schema::table('tour_types', function (Blueprint $table) {
            $table->dropColumn('friendly_url');
        });
    }
};
