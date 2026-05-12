php artisan serve
npm run dev

php artisan key:generate

php artisan config:clear
php artisan config:cache
php artisan view:clear
php artisan cache:clear
php artisan route:clear

@push('style') @endpush
@push('script') @endpush

php artisan serve --port=8000
php artisan serve --port=8001
php artisan serve --port=8002

php artisan route:list - all routes list

php artisan make:migration create_tablename_table ---- create database table
php artisan migrate ---- create all database tables
php artisan make:model backend/name ---- create model
php artisan make:controller backend/name ---- create controller
php artisan migrate --path=/database/migrations/2024_10_07_000000_create_users_table.php ---- run specific table
migration

php artisan tinker --- for testing mail
Mail::raw('Test email from Laravel', function ($msg) {
    $msg->to('websigntist@gmail.com')->subject('Test Mail');
});

Get full URL => http://websigntist.com/admin/modules/create
============================================================
$request->fullUrl();
// or
url()->full();

Get just the path (after the domain) => admin/modules/create
=============================================================
$request->path();

Get URL segments (split by "/")
=======================================
$request->segments();
[
    0 => "admin",
    1 => "modules",
    2 => "create"
]
$request->segment(1); // "admin"
$request->segment(2); // "modules"
$request->segment(3); // "create"

Get the last segment
=========================================
collect($request->segments())->last();
// or
$request->segment(count($request->segments()));

Get the 2nd last segment
==============================================
$segments = $request->segments();
$secondLast = $segments[count($segments) - 2] ?? null;


Full practical example:
====================================
public function show(Request $request)
{
    $segments = $request->segments();
    $last = collect($segments)->last();
    $secondLast = $segments[count($segments) - 2] ?? null;

    dd([
        'full_url'    => $request->fullUrl(),
        'path'        => $request->path(),
        'segments'    => $segments,
        'second_last' => $secondLast,
        'last'        => $last,
    ]);
}
