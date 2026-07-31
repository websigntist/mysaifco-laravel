<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $exists = DB::table('modules')->where('module_slug', 'umrah-packages')->exists();
        if (!$exists) {
            $maxOrder = DB::table('modules')->max('ordering') ?? 0;

            $moduleId = DB::table('modules')->insertGetId([
                'parent_id'     => 0,
                'module_title'  => 'Umrah Packages',
                'module_slug'   => 'umrah-packages',
                'module_icon'   => 'tabler-package',
                'is_menu'       => 'Yes',
                'status'        => 'Active',
                'ordering'      => $maxOrder + 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

            // Assign permission to super admin (user_type_id = 1)
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
                        'created_at'   => now(),
                        'updated_at'   => now(),
                    ]);
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $module = DB::table('modules')->where('module_slug', 'umrah-packages')->first();
        if ($module) {
            DB::table('user_type_modules_rel')->where('module_id', $module->id)->delete();
            DB::table('modules')->where('id', $module->id)->delete();
        }
    }
};
