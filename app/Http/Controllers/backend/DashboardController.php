<?php

namespace App\Http\Controllers\backend;

use App\Models\backend\MaintenanceMode;
use App\Models\backend\Module;

// use App\Models\backend\Page;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\backend\User;
use App\Models\backend\UserType;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Termwind\Components\Dd;

class DashboardController extends Controller
{
    protected $userId;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->userId = currentUserId(); // or auth()->id()
            return $next($request);
        });
    }

    public function index()
    {
        $modules = Module::where('parent_id', 0)
            ->where('status', 'Active')
            ->orderBy('ordering')
            ->with('children') // eager load child modules
            ->get();

        return view('backend.dashboard', [
            'modules'        => $modules,
            'meta_title'     => "User Dashboard | Admin Panel",
            'meta_keywords'  => '',
            'meta_description' => ''
        ]);
    }

}
