<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use SoftDeletes;

    protected $table = 'modules'; // Ensure this matches your database table name

    protected $fillable = [
        'parent_id',
        'module_title',
        'module_slug',
        'icon',
        'show_in_menu',
        'actions',
        'ordering',
        'status',
        'created_by',
        'deleted_at',
    ];

    public function children()
        {
            return $this->hasMany(Module::class, 'parent_id')
                        ->where('status', 'Active')
                        ->orderBy('ordering')
                        ->with('children'); // recursion
        }

    public function parentModule()
    {
        return $this->belongsTo(Module::class, 'parent_id');
    }
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by'); // foreign key in modules table
    }

    function getUserMenus()
    {
        $user = Auth::user();
        if (!$user) {
            return [];
        }

        $userTypeId = $user->user_type_id;

        // Get all allowed module_ids for this user
        $allowedModules = DB::table('user_type_modules_rel')
            ->where('user_type_id', $userTypeId)
            ->pluck('module_id')
            ->toArray();

        // Fetch modules from DB
        $modules = Module::whereIn('id', $allowedModules)
            ->where('status', 'Active')
            ->orderBy('ordering')
            ->get();

        // Group into parent-child
        $menu = [
            'items'   => $modules->keyBy('id')->toArray(),
            'parents' => [],
        ];

        foreach ($modules as $item) {
            $menu['parents'][$item->parent_id][] = $item->id;
        }

        return $menu;
    }

}
