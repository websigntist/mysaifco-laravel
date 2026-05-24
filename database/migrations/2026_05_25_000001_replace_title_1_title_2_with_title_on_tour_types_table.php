<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tour_types', function (Blueprint $table) {
            $table->string('title')->nullable()->after('id');
        });

        DB::table('tour_types')->orderBy('id')->each(function ($row) {
            $title = trim((string) ($row->title_1 ?? ''));
            $title2 = trim((string) ($row->title_2 ?? ''));
            if ($title2 !== '') {
                $title = trim($title . ' ' . $title2);
            }

            DB::table('tour_types')->where('id', $row->id)->update(['title' => $title]);
        });

        Schema::table('tour_types', function (Blueprint $table) {
            $table->dropColumn(['title_1', 'title_2']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tour_types', function (Blueprint $table) {
            $table->string('title_1')->nullable()->after('id');
            $table->string('title_2')->nullable()->after('title_1');
        });

        DB::table('tour_types')->orderBy('id')->each(function ($row) {
            DB::table('tour_types')->where('id', $row->id)->update([
                'title_1' => $row->title,
                'title_2' => null,
            ]);
        });

        Schema::table('tour_types', function (Blueprint $table) {
            $table->dropColumn('title');
        });
    }
};
