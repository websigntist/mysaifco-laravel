<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\UserType;

class CustomerController extends UserController
{
    public function __construct()
    {
        parent::__construct();
        $this->module = 'customers';
        $this->notify_title = 'Customer';
        $this->restrictToUserTypeIds = UserType::query()
            ->where('status', 'Active')
            ->whereRaw('LOWER(TRIM(user_type)) = ?', ['customer'])
            ->pluck('id')
            ->map(fn ($id) => (int) $id)
            ->values()
            ->all();
    }
}
