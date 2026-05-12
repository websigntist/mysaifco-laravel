<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\Module;
use App\Models\backend\MaintenanceMode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Termwind\Components\Dd;

class TestController
{
    // showing all listing
    public function index()
    {
        return view('backend.test.test', [
            'meta_title'       => "Module Listing | Admin Panel",
            'meta_keywords'    => '',
            'meta_description' => ''
        ]);
    }

}
