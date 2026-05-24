<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Display order for all-categories page (and admin list).
     */
    private array $orderByTitle = [
        'Desert Safari'        => 1,
        'Yacht Charter'        => 2,
        'Dubai City Tour'      => 3,
        'Abu Dhabi Tours'      => 4,
        'Dubai Combo Tours'    => 5,
        'Water Activities'     => 6,
        'Theme Park Tickets'   => 7,
        'Dhow Cruise Tours'    => 8,
    ];

    public function up(): void
    {
        foreach ($this->orderByTitle as $title => $ordering) {
            DB::table('tour_types')
                ->where('title', $title)
                ->update(['ordering' => $ordering]);
        }
    }

    public function down(): void
    {
        DB::table('tour_types')
            ->whereIn('title', array_keys($this->orderByTitle))
            ->update(['ordering' => 0]);
    }
};
