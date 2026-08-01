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
        $module = DB::table('modules')->where('module_slug', 'umrah-air-packages')->first();
        if ($module) {
            $userTypes = DB::table('user_types')->pluck('id');
            foreach ($userTypes as $userTypeId) {
                $already = DB::table('user_type_modules_rel')
                    ->where('user_type_id', $userTypeId)
                    ->where('module_id', $module->id)
                    ->exists();

                if (!$already) {
                    DB::table('user_type_modules_rel')->insert([
                        'user_type_id' => $userTypeId,
                        'module_id'    => $module->id,
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
        $module = DB::table('modules')->where('module_slug', 'umrah-air-packages')->first();
        if ($module) {
            DB::table('user_type_modules_rel')->where('module_id', $module->id)->delete();
        }
    }
};
