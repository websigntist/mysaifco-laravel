<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Add "Customers" admin menu module (route name customers) mirroring Users permissions.
     * Data remains in the users table; no new table.
     */
    public function up(): void
    {
        if (DB::table('modules')->where('module_slug', 'customers')->exists()) {
            return;
        }

        $usersModule = DB::table('modules')->where('module_slug', 'users')->first();
        if (! $usersModule) {
            return;
        }

        $newId = DB::table('modules')->insertGetId([
            'parent_id'    => $usersModule->parent_id,
            'module_title' => 'Customers',
            'module_slug'  => 'customers',
            'icon'         => $usersModule->icon ?? 'users-group',
            'show_in_menu' => $usersModule->show_in_menu ?? 'Yes',
            'actions'      => $usersModule->actions,
            'ordering'     => (int) $usersModule->ordering + 1,
            'status'       => 'Active',
            'created_by'   => $usersModule->created_by ?? 1,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        $rels = DB::table('user_type_modules_rel')->where('module_id', $usersModule->id)->get();
        foreach ($rels as $rel) {
            $exists = DB::table('user_type_modules_rel')
                ->where('user_type_id', $rel->user_type_id)
                ->where('module_id', $newId)
                ->exists();
            if ($exists) {
                continue;
            }
            DB::table('user_type_modules_rel')->insert([
                'user_type_id' => $rel->user_type_id,
                'module_id'    => $newId,
                'actions'      => $rel->actions,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }
    }

    public function down(): void
    {
        $row = DB::table('modules')->where('module_slug', 'customers')->first();
        if (! $row) {
            return;
        }

        DB::table('user_type_modules_rel')->where('module_id', $row->id)->delete();
        DB::table('modules')->where('id', $row->id)->delete();
    }
};
