<?php

use App\Models\backend\Gallery;
use App\Models\backend\TourType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasColumn('galleries', 'tour_type')) {
            Schema::table('galleries', function (Blueprint $table) {
                $table->string('tour_type')->nullable()->after('title');
            });
        }

        if (Schema::hasColumn('galleries', 'tour_type_id')) {
            Gallery::query()
                ->whereNotNull('tour_type_id')
                ->where(function ($query) {
                    $query->whereNull('tour_type')->orWhere('tour_type', '');
                })
                ->each(function (Gallery $gallery) {
                    $title = TourType::find($gallery->tour_type_id)?->title;
                    if ($title) {
                        $gallery->update(['tour_type' => $title]);
                    }
                });

            Schema::table('galleries', function (Blueprint $table) {
                $table->dropColumn('tour_type_id');
            });
        }
    }

    public function down(): void
    {
        if (!Schema::hasColumn('galleries', 'tour_type_id')) {
            Schema::table('galleries', function (Blueprint $table) {
                $table->unsignedBigInteger('tour_type_id')->nullable()->after('title');
            });
        }

        if (Schema::hasColumn('galleries', 'tour_type')) {
            Gallery::query()
                ->whereNotNull('tour_type')
                ->each(function (Gallery $gallery) {
                    $first = trim(explode(',', (string) $gallery->tour_type)[0] ?? '');
                    if ($first !== '') {
                        $match = TourType::where('title', $first)->first();
                        if ($match) {
                            $gallery->update(['tour_type_id' => $match->id]);
                        }
                    }
                });

            Schema::table('galleries', function (Blueprint $table) {
                $table->dropColumn('tour_type');
            });
        }
    }
};
