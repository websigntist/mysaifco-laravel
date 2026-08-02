<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    private const ACTIONS = 'add | edit | view | status | delete | delete all | more | duplicate | store | update | trashed | restore | forcedelete | modal-view';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('faq_categories')) {
            Schema::create('faq_categories', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('friendly_url')->unique();
                $table->string('image')->nullable();
                $table->text('description')->nullable();
                $table->integer('ordering')->default(0);
                $table->enum('status', ['Active', 'Inactive'])->default('Active');
                $table->string('meta_title')->nullable();
                $table->text('meta_keywords')->nullable();
                $table->text('meta_description')->nullable();
                $table->integer('created_by')->default(0);
                $table->timestamps();
                $table->softDeletes();
            });
        }

        // Register module in modules table
        $existing = DB::table('modules')->where('module_slug', 'faq-categories')->first();

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
                'module_title' => 'FAQ Categories',
                'module_slug'  => 'faq-categories',
                'actions'      => self::ACTIONS,
                'status'       => 'Active',
                'ordering'     => $maxOrder + 1,
                'created_by'   => 1,
                'created_at'   => now(),
                'updated_at'   => now(),
            ];

            if (Schema::hasColumn('modules', 'icon')) {
                $data['icon'] = 'category';
            }
            if (Schema::hasColumn('modules', 'show_in_menu')) {
                $data['show_in_menu'] = 'Yes';
            }

            $moduleId = DB::table('modules')->insertGetId($data);
        }

        // Connect user type permissions
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
        $module = DB::table('modules')->where('module_slug', 'faq-categories')->first();
        if ($module) {
            DB::table('user_type_modules_rel')->where('module_id', $module->id)->delete();
            DB::table('modules')->where('id', $module->id)->delete();
        }
        Schema::dropIfExists('faq_categories');
    }
};
