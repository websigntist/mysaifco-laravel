<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserType extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_type',
        'login_type',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // get all enum valuse of login_type column
    public static function getEnumValues($column = 'login_type')
    {
        // Run SHOW COLUMNS directly as a string query
        $result = \DB::select("SHOW COLUMNS FROM user_types WHERE Field = '{$column}'");

        if (empty($result)) {
            return [];
        }

        $type = $result[0]->Type; // e.g. enum('admin','editor','viewer')

        // Extract values
        preg_match("/^enum\('(.*)'\)$/", $type, $matches);

        return isset($matches[1]) ? explode("','", $matches[1]) : [];
    }
}
