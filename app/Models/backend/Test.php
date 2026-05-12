<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Test extends Model
{
    use HasFactory;

    protected $table = 'test'; // Ensure this matches your database table name

    protected $fillable = [
        'id',
        'title',
    ];

    public function children()
        {
            return $this->hasMany(Test::class, 'parent_id')
                        ->where('status', 'Active')
                        ->orderBy('ordering')
                        ->with('children'); // recursion
        }

    public function parent()
    {
        return $this->belongsTo(Test::class, 'parent_id');
    }
    public function createdBy()
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
        $modules = Test::whereIn('id', $allowedModules)
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
