<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend;
use App\Http\Controllers\frontend;

use App\Models\backend\User;
use Illuminate\Support\Facades\Hash;

Route::get('/clearall', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    //Artisan::call('storage:link');
    echo "cleared";
});

// reset password
Route::get('update-pass', function () {
    $user = User::find(1); // insert user id which user password want to change

    // user: websigntist@gmail.com
    // pwd: adnang2563325
    if ($user) {
        // Update the password securely
        $user->password = Hash::make('123456');
        $user->save(); // Save the changes

        return "Password updated successfully.";
    }

    return "User not found.";
});

/*Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});*/

// Redirect /admin to /admin/login
Route::redirect('/admin', '/admin/login');

/*Route::redirect('/', '/admin');
Route::redirect('/home', '/admin');*/

// BACKEND ROUTES
Route::prefix('admin')->group(function () {

    Route::middleware(['guest'])->group(function () {
        Route::match(['post', 'get'], '/login', [backend\UserController::class, 'login'])->name('login');
        Route::match(['post', 'get'], '/forgot-password', [backend\UserController::class, 'forgotPassword'])->name('forgot-password');
        Route::get('/reset-password/{token}', [backend\UserController::class, 'resetForm'])->name('reset-password');
        Route::post('admin/update-password', [backend\UserController::class, 'updatePassword'])->name('update-password');
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/test', [backend\testController::class, 'index'])->name('test');

        Route::get('/dashboard', [backend\DashboardController::class, 'index'])->name('dashboard');
        Route::get('/logout', [backend\UserController::class, 'logout'])->name('logout');

        Route::post('/upload/dropzone', [backend\DropzoneController::class, 'upload'])->name('dropzone.upload');

        // USER TYPES ROUTES START
        Route::get('/user-types', [backend\UserTypeController::class, 'index'])->middleware('check.permission:user-types,view')->name('user-types');
        Route::get('/user-types/create', [backend\UserTypeController::class, 'create'])->middleware('check.permission:user-types,add')->name('user-types.create');
        Route::post('/user-types', [backend\UserTypeController::class, 'store'])->middleware('check.permission:user-types,add')->name('user-types.store');
        Route::get('/user-types/duplicate/{id}', [backend\UserTypeController::class, 'duplicate'])->middleware('check.permission:user-types,duplicate')->name('user-types.duplicate');

        Route::get('/user-types/edit/{id}', [backend\UserTypeController::class, 'edit'])->middleware('check.permission:user-types,edit')->name('user-types.edit');
        Route::put('/user-types/update/{id}', [backend\UserTypeController::class, 'update'])->middleware('check.permission:user-types,edit')->name('user-types.update');

        Route::post('/user-types/delete-all', [backend\UserTypeController::class, 'deleteAll'])->middleware('check.permission:user-types,delete-all')->name('user-types.delete-all');

        /* Ajax */
        Route::delete('/user-types/delete/{id}', [backend\UserTypeController::class, 'deleteAjax'])->middleware('check.permission:user-types,delete')->name('user-types.delete');
        Route::post('/user-types/{id}/status', [backend\UserTypeController::class, 'updateStatusAjax'])->middleware('check.permission:user-types,status')->name('user-types.status');

        Route::get('/user-types/trashed', [backend\UserTypeController::class, 'trashed'])->middleware('check.permission:user-types,trashed')->name('user-types.trashed');
        Route::get('/user-types/restore/{id}', [backend\UserTypeController::class, 'restore'])->middleware('check.permission:user-types,restore')->name('user-types.restore');
        Route::get('/user-types/forcedelete/{id}', [backend\UserTypeController::class, 'forceDelete'])->middleware('check.permission:user-types,forcedelete')->name('user-types.forcedelete');
        // USER TYPES ROUTES END

        // USERS ROUTES START
        Route::get('/users', [backend\UserController::class, 'index'])->middleware('check.permission:users,view')->name('users');
        Route::get('/users/create', [backend\UserController::class, 'create'])->middleware('check.permission:users,add')->name('users.create');
        Route::post('/users', [backend\UserController::class, 'store'])->middleware('check.permission:users,add')->name('users.store');
        Route::get('/users/duplicate/{id}', [backend\UserController::class, 'duplicate'])->middleware('check.permission:users,duplicate')->name('users.duplicate');

        Route::get('/users/edit/{id}', [backend\UserController::class, 'editForm'])->middleware('check.permission:users,edit')->name('users.edit');
        Route::match(['post', 'put'], '/users/update/{id}', [backend\UserController::class, 'update'])->middleware('check.permission:users,edit')->name('users.update');
        Route::get('/users/view/{id}', [backend\UserController::class, 'view'])->middleware('check.permission:users,view')->name('users.view');

        Route::match(['post', 'get'], '/profile', [backend\UserController::class, 'updateProfile'])->name('profile');

        Route::post('/users/delete-all', [backend\UserController::class, 'deleteAll'])->middleware('check.permission:users,delete-all')->name('users.delete-all');

        /* Ajax */
        Route::get('/users/modal-view/{id}', [backend\UserController::class, 'modalView'])->middleware('check.permission:users,modal-view')->name('users.modal-view');
        Route::delete('/users/delete/{id}', [backend\UserController::class, 'deleteAjax'])->middleware('check.permission:users,delete')->name('users.delete');
        Route::post('/users/{id}/status', [backend\UserController::class, 'updateStatusAjax'])->middleware('check.permission:users,status')->name('users.status');

        Route::get('/users/trashed', [backend\UserController::class, 'trashed'])->middleware('check.permission:users,trashed')->name('users.trashed');
        Route::get('/users/restore/{id}', [backend\UserController::class, 'restore'])->middleware('check.permission:users,restore')->name('users.restore');
        Route::get('/users/forcedelete/{id}', [backend\UserController::class, 'forceDelete'])->middleware('check.permission:users,forcedelete')->name('users.forcedelete');
        // USERS ROUTES END

        // CUSTOMERS (same User model / users table) ROUTES START
        Route::get('/customers', [backend\CustomerController::class, 'index'])->name('customers');
        Route::get('/customers/create', [backend\CustomerController::class, 'create'])->name('customers.create');
        Route::post('/customers', [backend\CustomerController::class, 'store'])->name('customers.store');
        Route::get('/customers/duplicate/{id}', [backend\CustomerController::class, 'duplicate'])->name('customers.duplicate');

        Route::get('/customers/edit/{id}', [backend\CustomerController::class, 'editForm'])->name('customers.edit');
        Route::match(['post', 'put'], '/customers/update/{id}', [backend\CustomerController::class, 'update'])->name('customers.update');
        Route::get('/customers/view/{id}', [backend\CustomerController::class, 'view'])->name('customers.view');

        Route::post('/customers/delete-all', [backend\CustomerController::class, 'deleteAll'])->name('customers.delete-all');

        Route::get('/customers/modal-view/{id}', [backend\CustomerController::class, 'modalView'])->name('customers.modal-view');
        Route::delete('/customers/delete/{id}', [backend\CustomerController::class, 'deleteAjax'])->name('customers.delete');
        Route::post('/customers/{id}/status', [backend\CustomerController::class, 'updateStatusAjax'])->name('customers.status');

        Route::get('/customers/trashed', [backend\CustomerController::class, 'trashed'])->name('customers.trashed');
        Route::get('/customers/restore/{id}', [backend\CustomerController::class, 'restore'])->name('customers.restore');
        Route::get('/customers/forcedelete/{id}', [backend\CustomerController::class, 'forceDelete'])->name('customers.forcedelete');
        // CUSTOMERS ROUTES END

        // MODULES ROUTES START
        Route::get('/modules', [backend\ModuleController::class, 'index'])->name('modules');
        Route::get('/modules/create', [backend\ModuleController::class, 'create'])->name('modules.create');
        Route::post('/modules', [backend\ModuleController::class, 'store'])->name('modules.store');
        Route::get('/modules/duplicate/{id}', [backend\ModuleController::class, 'duplicate'])->name('modules.duplicate');

        Route::get('/modules/edit/{id}', [backend\ModuleController::class, 'editForm'])->name('modules.edit');
        Route::put('/modules/update/{id}', [backend\ModuleController::class, 'update'])->name('modules.update');

        //Route::get('/modules/delete/{id}', [backend\ModuleController::class, 'delete'])->name('modules.delete');
        Route::post('/modules/delete-all', [backend\ModuleController::class, 'deleteAll'])->name('modules.delete-all');
        //Route::get('/modules/{id}/status', [backend\ModuleController::class, 'status'])->name('modules.status');

        /* Ajax */
        Route::get('/modules/modal-view/{id}', [backend\ModuleController::class, 'modalView'])->name('modules.modal-view');
        Route::post('/modules/update-title', [backend\ModuleController::class, 'updateTitleAjax'])->name('modules.update-title');
        Route::post('/modules/update-ordering', [backend\ModuleController::class, 'updateOrderingAjax'])->name('modules.update-ordering');
        Route::delete('/modules/delete/{id}', [backend\ModuleController::class, 'deleteAjax'])->name('modules.delete');
        Route::post('/modules/{id}/status', [backend\ModuleController::class, 'updateStatusAjax'])->name('modules.status');

        Route::get('/modules/trashed', [backend\ModuleController::class, 'trashed'])->name('modules.trashed');
        Route::get('/modules/restore/{id}', [backend\ModuleController::class, 'restore'])->name('modules.restore');
        Route::get('/modules/forcedelete/{id}', [backend\ModuleController::class, 'forceDelete'])->name('modules.forcedelete');
        // MODULES ROUTES END

        // PAGES ROUTES START
        Route::get('/pages', [backend\PageController::class, 'index'])->middleware('check.permission:pages,view')->name('pages');
        Route::get('/pages/create', [backend\PageController::class, 'create'])->middleware('check.permission:pages,add')->name('pages.create');
        Route::get('/pages/duplicate/{id}', [backend\PageController::class, 'duplicate'])->middleware('check.permission:pages,duplicate')->name('pages.duplicate');
        Route::get('/pages/edit/{id}', [backend\PageController::class, 'editForm'])->middleware('check.permission:pages,edit')->name('pages.edit');

        Route::put('/pages/update/{id}', [backend\PageController::class, 'update'])->middleware('check.permission:pages,update')->name('pages.update');
        Route::post('/pages/store', [backend\PageController::class, 'store'])->middleware('check.permission:pages,store')->name('pages.store');

        Route::post('/pages/delete-all', [backend\PageController::class, 'deleteAll'])->middleware('check.permission:pages,delete-all')->name('pages.delete-all');
        Route::get('/pages/view/{id}', [backend\PageController::class, 'view'])->middleware('check.permission:pages,view')->name('pages.view');

        Route::get('/pages/trashed', [backend\PageController::class, 'trashed'])->middleware('check.permission:pages,trashed')->name('pages.trashed');
        Route::get('/pages/restore/{id}', [backend\PageController::class, 'restore'])->middleware('check.permission:pages,restore')->name('pages.restore');
        Route::get('/pages/forcedelete/{id}', [backend\PageController::class, 'forceDelete'])->middleware('check.permission:pages,forcedelete')->name('pages.forcedelete');

        /* Ajax */
        Route::get('/pages/import', [backend\PageController::class, 'importForm'])->middleware('check.permission:pages,import-form')->name('pages.import-form');
        Route::post('/pages/import', [backend\PageController::class, 'import'])->middleware('check.permission:pages,import')->name('pages.import');
        Route::get('/pages/export', [backend\PageController::class, 'export'])->middleware('check.permission:pages,export')->name('pages.export');
        Route::post('/pages/update-title', [backend\PageController::class, 'updateTitleAjax'])->middleware('check.permission:pages,update-title')->name('pages.update-title');
        Route::get('/pages/modal-view/{id}', [backend\PageController::class, 'modalView'])->middleware('check.permission:pages,modal-view')->name('pages.modal-view');
        Route::post('/pages/update-ordering', [backend\PageController::class, 'updateOrderingAjax'])->middleware('check.permission:pages,update-ordering')->name('pages.update-ordering');
        Route::post('/pages/delete-section-image', [backend\PageController::class, 'deleteSectionImageAjax'])->name('pages.delete-section-image');
        Route::delete('/pages/delete/{id}', [backend\PageController::class, 'deleteAjax'])->middleware('check.permission:pages,delete')->name('pages.delete');
        Route::post('/pages/{id}/status', [backend\PageController::class, 'updateStatusAjax'])->middleware('check.permission:pages,status')->name('pages.status');
        // PAGES ROUTES END

        // TOURS ROUTES START
        Route::get('/tours', [backend\TourController::class, 'index'])->middleware('check.permission:tours,view')->name('tours');
        Route::get('/tours/create', [backend\TourController::class, 'create'])->middleware('check.permission:tours,add')->name('tours.create');
        Route::get('/tours/duplicate/{id}', [backend\TourController::class, 'duplicate'])->middleware('check.permission:tours,duplicate')->name('tours.duplicate');
        Route::get('/tours/edit/{id}', [backend\TourController::class, 'editForm'])->middleware('check.permission:tours,edit')->name('tours.edit');

        Route::put('/tours/update/{id}', [backend\TourController::class, 'update'])->middleware('check.permission:tours,update')->name('tours.update');
        Route::post('/tours/store', [backend\TourController::class, 'store'])->middleware('check.permission:tours,store')->name('tours.store');

        Route::post('/tours/delete-all', [backend\TourController::class, 'deleteAll'])->middleware('check.permission:tours,delete-all')->name('tours.delete-all');
        Route::get('/tours/view/{id}', [backend\TourController::class, 'view'])->middleware('check.permission:tours,view')->name('tours.view');

        Route::get('/tours/trashed', [backend\TourController::class, 'trashed'])->middleware('check.permission:tours,trashed')->name('tours.trashed');
        Route::get('/tours/restore/{id}', [backend\TourController::class, 'restore'])->middleware('check.permission:tours,restore')->name('tours.restore');
        Route::get('/tours/forcedelete/{id}', [backend\TourController::class, 'forceDelete'])->middleware('check.permission:tours,forcedelete')->name('tours.forcedelete');

        /* Ajax */
        Route::get('/tours/import', [backend\TourController::class, 'importForm'])->middleware('check.permission:tours,import-form')->name('tours.import-form');
        Route::post('/tours/import', [backend\TourController::class, 'import'])->middleware('check.permission:tours,import')->name('tours.import');
        Route::get('/tours/export', [backend\TourController::class, 'export'])->middleware('check.permission:tours,export')->name('tours.export');
        Route::post('/tours/update-title', [backend\TourController::class, 'updateTitleAjax'])->middleware('check.permission:tours,update-title')->name('tours.update-title');
        Route::get('/tours/modal-view/{id}', [backend\TourController::class, 'modalView'])->middleware('check.permission:tours,modal-view')->name('tours.modal-view');
        Route::post('/tours/update-ordering', [backend\TourController::class, 'updateOrderingAjax'])->middleware('check.permission:tours,update-ordering')->name('tours.update-ordering');
        Route::delete('/tours/delete/{id}', [backend\TourController::class, 'deleteAjax'])->middleware('check.permission:tours,delete')->name('tours.delete');
        Route::post('/tours/{id}/status', [backend\TourController::class, 'updateStatusAjax'])->middleware('check.permission:tours,status')->name('tours.status');
        // TOURS ROUTES END

        // TOUR TYPES ROUTES START
        Route::get('/tour-types', [backend\TourTypeController::class, 'index'])->middleware('check.permission:tour-types,view')->name('tour-types');
        Route::get('/tour-types/create', [backend\TourTypeController::class, 'create'])->middleware('check.permission:tour-types,add')->name('tour-types.create');
        Route::get('/tour-types/duplicate/{id}', [backend\TourTypeController::class, 'duplicate'])->middleware('check.permission:tour-types,duplicate')->name('tour-types.duplicate');
        Route::get('/tour-types/edit/{id}', [backend\TourTypeController::class, 'editForm'])->middleware('check.permission:tour-types,edit')->name('tour-types.edit');

        Route::put('/tour-types/update/{id}', [backend\TourTypeController::class, 'update'])->middleware('check.permission:tour-types,update')->name('tour-types.update');
        Route::post('/tour-types/store', [backend\TourTypeController::class, 'store'])->middleware('check.permission:tour-types,store')->name('tour-types.store');

        Route::post('/tour-types/delete-all', [backend\TourTypeController::class, 'deleteAll'])->middleware('check.permission:tour-types,delete-all')->name('tour-types.delete-all');
        Route::get('/tour-types/trashed', [backend\TourTypeController::class, 'trashed'])->middleware('check.permission:tour-types,trashed')->name('tour-types.trashed');
        Route::get('/tour-types/restore/{id}', [backend\TourTypeController::class, 'restore'])->middleware('check.permission:tour-types,restore')->name('tour-types.restore');
        Route::get('/tour-types/forcedelete/{id}', [backend\TourTypeController::class, 'forceDelete'])->middleware('check.permission:tour-types,forcedelete')->name('tour-types.forcedelete');

        Route::get('/tour-types/modal-view/{id}', [backend\TourTypeController::class, 'modalView'])->middleware('check.permission:tour-types,modal-view')->name('tour-types.modal-view');
        Route::delete('/tour-types/delete/{id}', [backend\TourTypeController::class, 'deleteAjax'])->middleware('check.permission:tour-types,delete')->name('tour-types.delete');
        Route::post('/tour-types/{id}/status', [backend\TourTypeController::class, 'updateStatusAjax'])->middleware('check.permission:tour-types,status')->name('tour-types.status');
        // TOUR TYPES ROUTES END

        // RED TAGS ROUTES START
        Route::get('/red-tags', [backend\RedTagController::class, 'index'])->middleware('check.permission:red-tags,view')->name('red-tags');
        Route::get('/red-tags/create', [backend\RedTagController::class, 'create'])->middleware('check.permission:red-tags,add')->name('red-tags.create');
        Route::get('/red-tags/duplicate/{id}', [backend\RedTagController::class, 'duplicate'])->middleware('check.permission:red-tags,duplicate')->name('red-tags.duplicate');
        Route::get('/red-tags/edit/{id}', [backend\RedTagController::class, 'editForm'])->middleware('check.permission:red-tags,edit')->name('red-tags.edit');
        Route::put('/red-tags/update/{id}', [backend\RedTagController::class, 'update'])->middleware('check.permission:red-tags,update')->name('red-tags.update');
        Route::post('/red-tags/store', [backend\RedTagController::class, 'store'])->middleware('check.permission:red-tags,store')->name('red-tags.store');
        Route::post('/red-tags/delete-all', [backend\RedTagController::class, 'deleteAll'])->middleware('check.permission:red-tags,delete-all')->name('red-tags.delete-all');
        Route::get('/red-tags/trashed', [backend\RedTagController::class, 'trashed'])->middleware('check.permission:red-tags,trashed')->name('red-tags.trashed');
        Route::get('/red-tags/restore/{id}', [backend\RedTagController::class, 'restore'])->middleware('check.permission:red-tags,restore')->name('red-tags.restore');
        Route::get('/red-tags/forcedelete/{id}', [backend\RedTagController::class, 'forceDelete'])->middleware('check.permission:red-tags,forcedelete')->name('red-tags.forcedelete');
        Route::get('/red-tags/modal-view/{id}', [backend\RedTagController::class, 'modalView'])->middleware('check.permission:red-tags,modal-view')->name('red-tags.modal-view');
        Route::delete('/red-tags/delete/{id}', [backend\RedTagController::class, 'deleteAjax'])->middleware('check.permission:red-tags,delete')->name('red-tags.delete');
        Route::post('/red-tags/{id}/status', [backend\RedTagController::class, 'updateStatusAjax'])->middleware('check.permission:red-tags,status')->name('red-tags.status');
        // RED TAGS ROUTES END

        // EXPLORE ROUTES START
        Route::get('/explore', [backend\ExploreController::class, 'index'])->middleware('check.permission:explore,view')->name('explore');
        Route::get('/explore/create', [backend\ExploreController::class, 'create'])->middleware('check.permission:explore,add')->name('explore.create');
        Route::get('/explore/duplicate/{id}', [backend\ExploreController::class, 'duplicate'])->middleware('check.permission:explore,duplicate')->name('explore.duplicate');
        Route::get('/explore/edit/{id}', [backend\ExploreController::class, 'editForm'])->middleware('check.permission:explore,edit')->name('explore.edit');
        Route::put('/explore/update/{id}', [backend\ExploreController::class, 'update'])->middleware('check.permission:explore,update')->name('explore.update');
        Route::post('/explore/store', [backend\ExploreController::class, 'store'])->middleware('check.permission:explore,store')->name('explore.store');
        Route::post('/explore/delete-all', [backend\ExploreController::class, 'deleteAll'])->middleware('check.permission:explore,delete-all')->name('explore.delete-all');
        Route::get('/explore/trashed', [backend\ExploreController::class, 'trashed'])->middleware('check.permission:explore,trashed')->name('explore.trashed');
        Route::get('/explore/restore/{id}', [backend\ExploreController::class, 'restore'])->middleware('check.permission:explore,restore')->name('explore.restore');
        Route::get('/explore/forcedelete/{id}', [backend\ExploreController::class, 'forceDelete'])->middleware('check.permission:explore,forcedelete')->name('explore.forcedelete');
        Route::get('/explore/modal-view/{id}', [backend\ExploreController::class, 'modalView'])->middleware('check.permission:explore,modal-view')->name('explore.modal-view');
        Route::delete('/explore/delete/{id}', [backend\ExploreController::class, 'deleteAjax'])->middleware('check.permission:explore,delete')->name('explore.delete');
        Route::post('/explore/{id}/status', [backend\ExploreController::class, 'updateStatusAjax'])->middleware('check.permission:explore,status')->name('explore.status');
        // EXPLORE ROUTES END

        // EXPLORE UAE ROUTES START
        Route::get('/explore-uae', [backend\ExploreUaeController::class, 'index'])->middleware('check.permission:explore-uae,view')->name('explore-uae');
        Route::get('/explore-uae/create', [backend\ExploreUaeController::class, 'create'])->middleware('check.permission:explore-uae,add')->name('explore-uae.create');
        Route::get('/explore-uae/duplicate/{id}', [backend\ExploreUaeController::class, 'duplicate'])->middleware('check.permission:explore-uae,duplicate')->name('explore-uae.duplicate');
        Route::get('/explore-uae/edit/{id}', [backend\ExploreUaeController::class, 'editForm'])->middleware('check.permission:explore-uae,edit')->name('explore-uae.edit');
        Route::put('/explore-uae/update/{id}', [backend\ExploreUaeController::class, 'update'])->middleware('check.permission:explore-uae,update')->name('explore-uae.update');
        Route::post('/explore-uae/store', [backend\ExploreUaeController::class, 'store'])->middleware('check.permission:explore-uae,store')->name('explore-uae.store');
        Route::post('/explore-uae/delete-all', [backend\ExploreUaeController::class, 'deleteAll'])->middleware('check.permission:explore-uae,delete-all')->name('explore-uae.delete-all');
        Route::get('/explore-uae/trashed', [backend\ExploreUaeController::class, 'trashed'])->middleware('check.permission:explore-uae,trashed')->name('explore-uae.trashed');
        Route::get('/explore-uae/restore/{id}', [backend\ExploreUaeController::class, 'restore'])->middleware('check.permission:explore-uae,restore')->name('explore-uae.restore');
        Route::get('/explore-uae/forcedelete/{id}', [backend\ExploreUaeController::class, 'forceDelete'])->middleware('check.permission:explore-uae,forcedelete')->name('explore-uae.forcedelete');
        Route::get('/explore-uae/modal-view/{id}', [backend\ExploreUaeController::class, 'modalView'])->middleware('check.permission:explore-uae,modal-view')->name('explore-uae.modal-view');
        Route::delete('/explore-uae/delete/{id}', [backend\ExploreUaeController::class, 'deleteAjax'])->middleware('check.permission:explore-uae,delete')->name('explore-uae.delete');
        Route::post('/explore-uae/{id}/status', [backend\ExploreUaeController::class, 'updateStatusAjax'])->middleware('check.permission:explore-uae,status')->name('explore-uae.status');
        // EXPLORE UAE ROUTES END

        // POPULAR SEARCHES ROUTES START
        Route::get('/popular-searches', [backend\PopularSearchController::class, 'index'])->middleware('check.permission:popular-searches,view')->name('popular-searches');
        Route::get('/popular-searches/create', [backend\PopularSearchController::class, 'create'])->middleware('check.permission:popular-searches,add')->name('popular-searches.create');
        Route::get('/popular-searches/duplicate/{id}', [backend\PopularSearchController::class, 'duplicate'])->middleware('check.permission:popular-searches,duplicate')->name('popular-searches.duplicate');
        Route::get('/popular-searches/edit/{id}', [backend\PopularSearchController::class, 'editForm'])->middleware('check.permission:popular-searches,edit')->name('popular-searches.edit');
        Route::put('/popular-searches/update/{id}', [backend\PopularSearchController::class, 'update'])->middleware('check.permission:popular-searches,update')->name('popular-searches.update');
        Route::post('/popular-searches/store', [backend\PopularSearchController::class, 'store'])->middleware('check.permission:popular-searches,store')->name('popular-searches.store');
        Route::post('/popular-searches/delete-all', [backend\PopularSearchController::class, 'deleteAll'])->middleware('check.permission:popular-searches,delete-all')->name('popular-searches.delete-all');
        Route::get('/popular-searches/trashed', [backend\PopularSearchController::class, 'trashed'])->middleware('check.permission:popular-searches,trashed')->name('popular-searches.trashed');
        Route::get('/popular-searches/restore/{id}', [backend\PopularSearchController::class, 'restore'])->middleware('check.permission:popular-searches,restore')->name('popular-searches.restore');
        Route::get('/popular-searches/forcedelete/{id}', [backend\PopularSearchController::class, 'forceDelete'])->middleware('check.permission:popular-searches,forcedelete')->name('popular-searches.forcedelete');
        Route::get('/popular-searches/modal-view/{id}', [backend\PopularSearchController::class, 'modalView'])->middleware('check.permission:popular-searches,modal-view')->name('popular-searches.modal-view');
        Route::delete('/popular-searches/delete/{id}', [backend\PopularSearchController::class, 'deleteAjax'])->middleware('check.permission:popular-searches,delete')->name('popular-searches.delete');
        // POPULAR SEARCHES ROUTES END

        // BLOGS CATEGORIES ROUTES START
        Route::get('/blog-categories', [backend\BlogCategoryController::class, 'index'])->middleware('check.permission:blog-categories,view')->name('blog-categories');
        Route::get('/blog-category/create', [backend\BlogCategoryController::class, 'create'])->name('blog-category.create');
        Route::get('/blog-category/duplicate/{id}', [backend\BlogCategoryController::class, 'duplicate'])->name('blog-category.duplicate');
        Route::get('/blog-category/edit/{id}', [backend\BlogCategoryController::class, 'editForm'])->name('blog-category.edit');

        Route::post('/blog-category/store', [backend\BlogCategoryController::class, 'store'])->name('blog-category.store');
        Route::get('/blog-category/store', function () {
            return redirect()->route('blog-category.create');
        });
        Route::put('/blog-category/update/{id}', [backend\BlogCategoryController::class, 'update'])->name('blog-category.update');

        Route::post('/blog-category/delete-all', [backend\BlogCategoryController::class, 'deleteAll'])->name('blog-category.delete-all');

        /* Ajax */
        Route::get('/blog-category/import', [backend\BlogCategoryController::class, 'importForm'])->name('blog-category.import-form');
        Route::post('/blog-category/import', [backend\BlogCategoryController::class, 'import'])->name('blog-category.import');
        Route::get('/blog-category/export', [backend\BlogCategoryController::class, 'export'])->name('blog-category.export');
        Route::post('/blog-category/update-ordering', [backend\BlogCategoryController::class, 'updateOrderingAjax'])->name('blog-category.update-ordering');
        Route::get('/blog-category/modal-view/{id}', [backend\BlogCategoryController::class, 'modalView'])->name('blog-category.modal-view');
        Route::delete('/blog-category/delete/{id}', [backend\BlogCategoryController::class, 'deleteAjax'])->name('blog-category.delete');
        Route::post('/blog-category/{id}/status', [backend\BlogCategoryController::class, 'updateStatusAjax'])->name('blog-category.status');

        Route::get('/blog-category/trashed', [backend\BlogCategoryController::class, 'trashed'])->name('blog-category.trashed');
        Route::get('/blog-category/restore/{id}', [backend\BlogCategoryController::class, 'restore'])->name('blog-category.restore');
        Route::get('/blog-category/forcedelete/{id}', [backend\BlogCategoryController::class, 'forceDelete'])->name('blog-category.forcedelete');
        // BLOG CATEGORIES ROUTES END

        // PRODUCT CATEGORIES ROUTES START
        Route::get('/product-categories', [backend\ProductCategoryController::class, 'index'])->middleware('check.permission:product-categories,view')->name('product-categories');
        Route::get('/product-category/create', [backend\ProductCategoryController::class, 'create'])->name('product-category.create');
        Route::get('/product-category/duplicate/{id}', [backend\ProductCategoryController::class, 'duplicate'])->name('product-category.duplicate');
        Route::get('/product-category/edit/{id}', [backend\ProductCategoryController::class, 'editForm'])->name('product-category.edit');

        Route::post('/product-category/store', [backend\ProductCategoryController::class, 'store'])->name('product-category.store');
        Route::put('/product-category/update/{id}', [backend\ProductCategoryController::class, 'update'])->name('product-category.update');

        Route::post('/product-category/delete-all', [backend\ProductCategoryController::class, 'deleteAll'])->name('product-category.delete-all');

        Route::get('/product-category/import', [backend\ProductCategoryController::class, 'importForm'])->name('product-category.import-form');
        Route::post('/product-category/import', [backend\ProductCategoryController::class, 'import'])->name('product-category.import');
        Route::get('/product-category/export', [backend\ProductCategoryController::class, 'export'])->name('product-category.export');
        Route::post('/product-category/update-ordering', [backend\ProductCategoryController::class, 'updateOrderingAjax'])->name('product-category.update-ordering');
        Route::get('/product-category/modal-view/{id}', [backend\ProductCategoryController::class, 'modalView'])->name('product-category.modal-view');
        Route::delete('/product-category/delete/{id}', [backend\ProductCategoryController::class, 'deleteAjax'])->name('product-category.delete');
        Route::post('/product-category/{id}/status', [backend\ProductCategoryController::class, 'updateStatusAjax'])->name('product-category.status');

        Route::get('/product-category/trashed', [backend\ProductCategoryController::class, 'trashed'])->name('product-category.trashed');
        Route::get('/product-category/restore/{id}', [backend\ProductCategoryController::class, 'restore'])->name('product-category.restore');
        Route::get('/product-category/forcedelete/{id}', [backend\ProductCategoryController::class, 'forceDelete'])->name('product-category.forcedelete');
        // PRODUCT CATEGORIES ROUTES END

        // PRODUCTS ROUTES START
        Route::get('/products', [backend\ProductController::class, 'index'])->middleware('check.permission:products,view')->name('products');
        Route::get('/product/create', [backend\ProductController::class, 'create'])->name('product.create');
        Route::get('/product/duplicate/{id}', [backend\ProductController::class, 'duplicate'])->name('product.duplicate');
        Route::get('/product/edit/{id}', [backend\ProductController::class, 'editForm'])->name('product.edit');

        Route::post('/product/store', [backend\ProductController::class, 'store'])->name('product.store');
        Route::put('/product/update/{id}', [backend\ProductController::class, 'update'])->name('product.update');

        Route::post('/product/delete-all', [backend\ProductController::class, 'deleteAll'])->name('product.delete-all');

        Route::get('/product/import', [backend\ProductController::class, 'importForm'])->name('product.import-form');
        Route::post('/product/import', [backend\ProductController::class, 'import'])->name('product.import');
        Route::get('/product/export', [backend\ProductController::class, 'export'])->name('product.export');
        Route::post('/product/update-ordering', [backend\ProductController::class, 'updateOrderingAjax'])->name('product.update-ordering');
        Route::get('/product/modal-view/{id}', [backend\ProductController::class, 'modalView'])->name('product.modal-view');
        Route::delete('/product/delete/{id}', [backend\ProductController::class, 'deleteAjax'])->name('product.delete');
        Route::post('/product/{id}/status', [backend\ProductController::class, 'updateStatusAjax'])->name('product.status');

        Route::get('/product/trashed', [backend\ProductController::class, 'trashed'])->name('product.trashed');
        Route::get('/product/restore/{id}', [backend\ProductController::class, 'restore'])->name('product.restore');
        Route::get('/product/forcedelete/{id}', [backend\ProductController::class, 'forceDelete'])->name('product.forcedelete');
        // PRODUCTS ROUTES END

        // BLOGS TAGS ROUTES START
        Route::get('/blog-tags', [backend\BlogTagController::class, 'index'])->middleware('check.permission:blog-tags,view')->name('blog-tags');
        Route::get('/blog-tag/create', [backend\BlogTagController::class, 'create'])->name('blog-tag.create');
        Route::get('/blog-tag/edit/{id}', [backend\BlogTagController::class, 'editForm'])->name('blog-tag.edit');

        Route::post('/blog-tag/store', [backend\BlogTagController::class, 'store'])->name('blog-tag.store');
        Route::put('/blog-tag/update/{id}', [backend\BlogTagController::class, 'update'])->name('blog-tag.update');
        Route::post('/blog-tag/delete-all', [backend\BlogTagController::class, 'deleteAll'])->name('blog-tag.delete-all');

        /* Ajax */
        Route::delete('/blog-tag/delete/{id}', [backend\BlogTagController::class, 'deleteAjax'])->name('blog-tag.delete');
        Route::post('/blog-tag/{id}/status', [backend\BlogTagController::class, 'updateStatusAjax'])->name('blog-tag.status');

        Route::get('/blog-tag/trashed', [backend\BlogTagController::class, 'trashed'])->name('blog-tag.trashed');
        Route::get('/blog-tag/restore/{id}', [backend\BlogTagController::class, 'restore'])->name('blog-tag.restore');
        Route::get('/blog-tag/forcedelete/{id}', [backend\BlogTagController::class, 'forceDelete'])->name('blog-tag.forcedelete');
        // BLOG TAGS ROUTES END

        // BLOGS ROUTES START
        Route::get('/blogs', [backend\BlogController::class, 'index'])->middleware('check.permission:blogs,view')->name('blogs');
        Route::get('/blogs/create', [backend\BlogController::class, 'create'])->middleware('check.permission:blogs,add')->name('blogs.create');
        Route::get('/blogs/duplicate/{id}', [backend\BlogController::class, 'duplicate'])->middleware('check.permission:blogs,duplicate')->name('blogs.duplicate');
        Route::get('/blogs/edit/{id}', [backend\BlogController::class, 'editForm'])->middleware('check.permission:blogs,edit')->name('blogs.edit');

        Route::post('/blogs/store', [backend\BlogController::class, 'store'])->middleware('check.permission:blogs,store')->name('blogs.store');
        Route::put('/blogs/update/{id}', [backend\BlogController::class, 'update'])->middleware('check.permission:blogs,update')->name('blogs.update');

        Route::post('/blogs/delete-all', [backend\BlogController::class, 'deleteAll'])->middleware('check.permission:blogs,delete-all')->name('blogs.delete-all');
        Route::get('/blogs/view/{id}', [backend\BlogController::class, 'view'])->middleware('check.permission:blogs,view')->name('blogs.view');

        /* Ajax */
        Route::get('/blogs/import', [backend\BlogController::class, 'importForm'])->middleware('check.permission:blogs,import-form')->name('blogs.import-form');
        Route::post('/blogs/import', [backend\BlogController::class, 'import'])->middleware('check.permission:blogs,import')->name('blogs.import');
        Route::get('/blogs/export', [backend\BlogController::class, 'export'])->middleware('check.permission:blogs,export')->name('blogs.export');
        Route::post('/blogs/update-title', [backend\BlogController::class, 'updateTitleAjax'])->middleware('check.permission:blogs,update-title')->name('blogs.update-title');
        Route::get('/blogs/modal-view/{id}', [backend\BlogController::class, 'modalView'])->middleware('check.permission:blogs,modal-view')->name('blogs.modal-view');
        Route::post('/blogs/update-ordering', [backend\BlogController::class, 'updateOrderingAjax'])->middleware('check.permission:blogs,update-ordering')->name('blogs.update-ordering');
        Route::delete('/blogs/delete/{id}', [backend\BlogController::class, 'deleteAjax'])->middleware('check.permission:blogs,delete')->name('blogs.delete');
        Route::post('/blogs/{id}/status', [backend\BlogController::class, 'updateStatusAjax'])->middleware('check.permission:blogs,status')->name('blogs.status');

        Route::get('/blogs/trashed', [backend\BlogController::class, 'trashed'])->middleware('check.permission:blogs,trashed')->name('blogs.trashed');
        Route::get('/blogs/restore/{id}', [backend\BlogController::class, 'restore'])->middleware('check.permission:blogs,restore')->name('blogs.restore');
        Route::get('/blogs/forcedelete/{id}', [backend\BlogController::class, 'forceDelete'])->middleware('check.permission:blogs,forcedelete')->name('blogs.forcedelete');
        // BLOGS ROUTES END

        // STATIC BLOCKS ROUTES START
        Route::get('/static-blocks', [backend\StaticBlocksController::class, 'index'])->middleware('check.permission:static-blocks,view')->name('static-blocks');
        Route::get('/static-blocks/create', [backend\StaticBlocksController::class, 'create'])->name('static-blocks.create');
        Route::get('/static-blocks/edit/{id}', [backend\StaticBlocksController::class, 'editForm'])->name('static-blocks.edit');

        Route::put('/static-blocks/update/{id}', [backend\StaticBlocksController::class, 'update'])->name('static-blocks.update');
        Route::post('/static-blocks/store', [backend\StaticBlocksController::class, 'store'])->name('static-blocks.store');
        Route::get('/static-blocks/duplicate/{id}', [backend\StaticBlocksController::class, 'duplicate'])->name('static-blocks.duplicate');

        //Route::get('/static-blocks/delete/{id}', [backend\StaticBlocksController::class, 'delete'])->name
        //('static-blocks.delete');
        Route::post('/static-blocks/delete-all', [backend\StaticBlocksController::class, 'deleteAll'])->name('static-blocks.delete-all');
        //Route::get('/static-blocks/{id}/status', [backend\StaticBlocksController::class, 'status'])->name
        //('static-blocks.status');

        /* Ajax */
        Route::delete('/static-blocks/delete/{id}', [backend\StaticBlocksController::class, 'deleteAjax'])->name('static-blocks.delete');
        Route::post('/static-blocks/{id}/status', [backend\StaticBlocksController::class, 'updateStatusAjax'])->name ('static-blocks.status');

        Route::get('/static-blocks/trashed', [backend\StaticBlocksController::class, 'trashed'])->name('static-blocks.trashed');
        Route::get('/static-blocks/restore/{id}', [backend\StaticBlocksController::class, 'restore'])->name('static-blocks.restore');
        Route::get('/static-blocks/forcedelete/{id}', [backend\StaticBlocksController::class, 'forceDelete'])->name('static-blocks.forcedelete');
        // STATIC BLOCKS ROUTES END

        // sliders ROUTES START
        Route::get('/sliders', [backend\SliderController::class, 'index'])->middleware('check.permission:sliders,view')->name('sliders');
        Route::get('/sliders/create', [backend\SliderController::class, 'create'])->middleware('check.permission:sliders,add')->name('sliders.create');
        Route::get('/sliders/duplicate/{id}', [backend\SliderController::class, 'duplicate'])->middleware('check.permission:sliders,duplicate')->name('sliders.duplicate');
        Route::get('/sliders/edit/{id}', [backend\SliderController::class, 'editForm'])->middleware('check.permission:sliders,edit')->name('sliders.edit');

        Route::put('/sliders/update/{id}', [backend\SliderController::class, 'update'])->middleware('check.permission:sliders,update')->name('sliders.update');
        Route::post('/sliders/store', [backend\SliderController::class, 'store'])->middleware('check.permission:sliders,store')->name('sliders.store');

        Route::post('/sliders/delete-all', [backend\SliderController::class, 'deleteAll'])->middleware('check.permission:sliders,delete-all')->name('sliders.delete-all');
        Route::get('/sliders/trashed', [backend\SliderController::class, 'trashed'])->middleware('check.permission:sliders,trashed')->name('sliders.trashed');
        Route::get('/sliders/restore/{id}', [backend\SliderController::class, 'restore'])->middleware('check.permission:sliders,restore')->name('sliders.restore');
        Route::get('/sliders/forcedelete/{id}', [backend\SliderController::class, 'forceDelete'])->middleware('check.permission:sliders,forcedelete')->name('sliders.forcedelete');

        /* Ajax */
        Route::get('/sliders/modal-view/{id}', [backend\SliderController::class, 'modalView'])->middleware('check.permission:sliders,modal-view')->name('sliders.modal-view');
        Route::delete('/sliders/delete/{id}', [backend\SliderController::class, 'deleteAjax'])->middleware('check.permission:sliders,status')->name('sliders.delete');
        Route::post('/sliders/{id}/status', [backend\SliderController::class, 'updateStatusAjax'])->middleware('check.permission:sliders,status')->name('sliders.status');
        // sliders ROUTES END

        // SETTING ROUTES START
        Route::get('/settings', [backend\SettingController::class, 'index'])->middleware('check.permission:settings,view')->name('settings');
        Route::put('/setting/update-form', [backend\SettingController::class, 'update'])->name('setting.update-form');
        // SETTING ROUTES END

        // testimonials ROUTES START
        Route::get('/testimonials', [backend\TestimonialController::class, 'index'])->middleware('check.permission:testimonials,view')->name('testimonials');
        Route::get('/testimonials/create', [backend\TestimonialController::class, 'create'])->middleware('check.permission:testimonials,add')->name('testimonials.create');
        Route::get('/testimonials/duplicate/{id}', [backend\TestimonialController::class, 'duplicate'])->middleware('check.permission:testimonials,duplicate')->name('testimonials.duplicate');
        Route::get('/testimonials/edit/{id}', [backend\TestimonialController::class, 'editForm'])->middleware('check.permission:testimonials,edit')->name('testimonials.edit');

        Route::put('/testimonials/update/{id}', [backend\TestimonialController::class, 'update'])->middleware('check.permission:testimonials,update')->name('testimonials.update');
        Route::post('/testimonials/store', [backend\TestimonialController::class, 'store'])->middleware('check.permission:testimonials,store')->name('testimonials.store');

        Route::post('/testimonials/delete-all', [backend\TestimonialController::class, 'deleteAll'])->middleware('check.permission:testimonials,delete-all')->name('testimonials.delete-all');
        Route::get('/testimonials/trashed', [backend\TestimonialController::class, 'trashed'])->middleware('check.permission:testimonials,trashed')->name('testimonials.trashed');
        Route::get('/testimonials/restore/{id}', [backend\TestimonialController::class, 'restore'])->middleware('check.permission:testimonials,restore')->name('testimonials.restore');
        Route::get('/testimonials/forcedelete/{id}', [backend\TestimonialController::class, 'forceDelete'])->middleware('check.permission:testimonials,forcedelete')->name('testimonials.forcedelete');

        /* Ajax */
        Route::get('/testimonials/modal-view/{id}', [backend\TestimonialController::class, 'modalView'])->middleware('check.permission:testimonials,modal-view')->name('testimonials.modal-view');
        Route::delete('/testimonials/delete/{id}', [backend\TestimonialController::class, 'deleteAjax'])->middleware('check.permission:testimonials,status')->name('testimonials.delete');
        Route::post('/testimonials/{id}/status', [backend\TestimonialController::class, 'updateStatusAjax'])->middleware('check.permission:testimonials,status')->name('testimonials.status');
        // testimonials ROUTES END

        // coupons ROUTES START
        Route::get('/coupons', [backend\CouponsController::class, 'index'])->middleware('check.permission:coupons,view')->name('coupons');
        Route::get('/coupons/create', [backend\CouponsController::class, 'create'])->middleware('check.permission:coupons,add')->name('coupons.create');
        Route::get('/coupons/duplicate/{id}', [backend\CouponsController::class, 'duplicate'])->middleware('check.permission:coupons,duplicate')->name('coupons.duplicate');
        Route::get('/coupons/edit/{id}', [backend\CouponsController::class, 'editForm'])->middleware('check.permission:coupons,edit')->name('coupons.edit');

        Route::put('/coupons/update/{id}', [backend\CouponsController::class, 'update'])->middleware('check.permission:coupons,update')->name('coupons.update');
        Route::post('/coupons/store', [backend\CouponsController::class, 'store'])->middleware('check.permission:coupons,store')->name('coupons.store');

        Route::post('/coupons/delete-all', [backend\CouponsController::class, 'deleteAll'])->middleware('check.permission:coupons,delete-all')->name('coupons.delete-all');
        Route::get('/coupons/trashed', [backend\CouponsController::class, 'trashed'])->middleware('check.permission:coupons,trashed')->name('coupons.trashed');
        Route::get('/coupons/restore/{id}', [backend\CouponsController::class, 'restore'])->middleware('check.permission:coupons,restore')->name('coupons.restore');
        Route::get('/coupons/forcedelete/{id}', [backend\CouponsController::class, 'forceDelete'])->middleware('check.permission:coupons,forcedelete')->name('coupons.forcedelete');

        /* Ajax */
        Route::get('/coupons/modal-view/{id}', [backend\CouponsController::class, 'modalView'])->middleware('check.permission:coupons,modal-view')->name('coupons.modal-view');
        Route::delete('/coupons/delete/{id}', [backend\CouponsController::class, 'deleteAjax'])->middleware('check.permission:coupons,status')->name('coupons.delete');
        Route::post('/coupons/{id}/status', [backend\CouponsController::class, 'updateStatusAjax'])->middleware('check.permission:coupons,status')->name('coupons.status');
        // coupons ROUTES END

        // reviews ROUTES START
        Route::get('/reviews', [backend\ReviewController::class, 'index'])->middleware('check.permission:reviews,view')->name('reviews');
        Route::get('/reviews/create', [backend\ReviewController::class, 'create'])->middleware('check.permission:reviews,add')->name('reviews.create');
        Route::get('/reviews/edit/{id}', [backend\ReviewController::class, 'editForm'])->middleware('check.permission:reviews,edit')->name('reviews.edit');

        Route::put('/reviews/update/{id}', [backend\ReviewController::class, 'update'])->middleware('check.permission:reviews,update')->name('reviews.update');
        Route::post('/reviews/store', [backend\ReviewController::class, 'store'])->middleware('check.permission:reviews,store')->name('reviews.store');

        Route::post('/reviews/delete-all', [backend\ReviewController::class, 'deleteAll'])->middleware('check.permission:reviews,delete-all')->name('reviews.delete-all');
        Route::get('/reviews/trashed', [backend\ReviewController::class, 'trashed'])->middleware('check.permission:reviews,trashed')->name('reviews.trashed');
        Route::get('/reviews/restore/{id}', [backend\ReviewController::class, 'restore'])->middleware('check.permission:reviews,restore')->name('reviews.restore');
        Route::get('/reviews/forcedelete/{id}', [backend\ReviewController::class, 'forceDelete'])->middleware('check.permission:reviews,forcedelete')->name('reviews.forcedelete');

        /* Ajax */
        Route::get('/reviews/modal-view/{id}', [backend\ReviewController::class, 'modalView'])->middleware('check.permission:reviews,modal-view')->name('reviews.modal-view');
        Route::delete('/reviews/delete/{id}', [backend\ReviewController::class, 'deleteAjax'])->middleware('check.permission:reviews,status')->name('reviews.delete');
        Route::post('/reviews/{id}/status', [backend\ReviewController::class, 'updateStatusAjax'])->middleware('check.permission:reviews,status')->name('reviews.status');
        // reviews ROUTES END

        // FAQ CATEGORIES ROUTES START
        Route::get('/faq-categories', [backend\FaqCategoryController::class, 'index'])->middleware('check.permission:faq-categories,view')->name('faq-categories');
        Route::get('/faq-categories/create', [backend\FaqCategoryController::class, 'create'])->middleware('check.permission:faq-categories,add')->name('faq-categories.create');
        Route::get('/faq-categories/duplicate/{id}', [backend\FaqCategoryController::class, 'duplicate'])->middleware('check.permission:faq-categories,duplicate')->name('faq-categories.duplicate');
        Route::get('/faq-categories/edit/{id}', [backend\FaqCategoryController::class, 'editForm'])->middleware('check.permission:faq-categories,edit')->name('faq-categories.edit');

        Route::put('/faq-categories/update/{id}', [backend\FaqCategoryController::class, 'update'])->middleware('check.permission:faq-categories,update')->name('faq-categories.update');
        Route::post('/faq-categories/store', [backend\FaqCategoryController::class, 'store'])->middleware('check.permission:faq-categories,store')->name('faq-categories.store');

        Route::post('/faq-categories/delete-all', [backend\FaqCategoryController::class, 'deleteAll'])->middleware('check.permission:faq-categories,delete-all')->name('faq-categories.delete-all');
        Route::get('/faq-categories/trashed', [backend\FaqCategoryController::class, 'trashed'])->middleware('check.permission:faq-categories,trashed')->name('faq-categories.trashed');
        Route::get('/faq-categories/restore/{id}', [backend\FaqCategoryController::class, 'restore'])->middleware('check.permission:faq-categories,restore')->name('faq-categories.restore');
        Route::get('/faq-categories/forcedelete/{id}', [backend\FaqCategoryController::class, 'forceDelete'])->middleware('check.permission:faq-categories,forcedelete')->name('faq-categories.forcedelete');

        /* Ajax */
        Route::get('/faq-categories/modal-view/{id}', [backend\FaqCategoryController::class, 'modalView'])->middleware('check.permission:faq-categories,modal-view')->name('faq-categories.modal-view');
        Route::delete('/faq-categories/delete/{id}', [backend\FaqCategoryController::class, 'deleteAjax'])->middleware('check.permission:faq-categories,status')->name('faq-categories.delete');
        Route::post('/faq-categories/{id}/status', [backend\FaqCategoryController::class, 'updateStatusAjax'])->middleware('check.permission:faq-categories,status')->name('faq-categories.status');
        // FAQ CATEGORIES ROUTES END

        // faqs ROUTES START
        Route::get('/faqs', [backend\FaqController::class, 'index'])->middleware('check.permission:faqs,view')->name('faqs');
        Route::get('/faqs/create', [backend\FaqController::class, 'create'])->middleware('check.permission:faqs,add')->name('faqs.create');
        Route::get('/faqs/duplicate/{id}', [backend\FaqController::class, 'duplicate'])->middleware('check.permission:faqs,duplicate')->name('faqs.duplicate');
        Route::get('/faqs/edit/{id}', [backend\FaqController::class, 'editForm'])->middleware('check.permission:faqs,edit')->name('faqs.edit');

        Route::put('/faqs/update/{id}', [backend\FaqController::class, 'update'])->middleware('check.permission:faqs,update')->name('faqs.update');
        Route::post('/faqs/store', [backend\FaqController::class, 'store'])->middleware('check.permission:faqs,store')->name('faqs.store');

        Route::post('/faqs/delete-all', [backend\FaqController::class, 'deleteAll'])->middleware('check.permission:faqs,delete-all')->name('faqs.delete-all');
        Route::get('/faqs/trashed', [backend\FaqController::class, 'trashed'])->middleware('check.permission:faqs,trashed')->name('faqs.trashed');
        Route::get('/faqs/restore/{id}', [backend\FaqController::class, 'restore'])->middleware('check.permission:faqs,restore')->name('faqs.restore');
        Route::get('/faqs/forcedelete/{id}', [backend\FaqController::class, 'forceDelete'])->middleware('check.permission:faqs,forcedelete')->name('faqs.forcedelete');

        /* Ajax */
        Route::get('/faqs/modal-view/{id}', [backend\FaqController::class, 'modalView'])->middleware('check.permission:faqs,modal-view')->name('faqs.modal-view');
        Route::delete('/faqs/delete/{id}', [backend\FaqController::class, 'deleteAjax'])->middleware('check.permission:faqs,status')->name('faqs.delete');
        Route::post('/faqs/{id}/status', [backend\FaqController::class, 'updateStatusAjax'])->middleware('check.permission:faqs,status')->name('faqs.status');
        // faqs ROUTES END

        // umrah-packages ROUTES START
        Route::get('/umrah-packages', [backend\UmrahPackageController::class, 'index'])->middleware('check.permission:umrah-packages,view')->name('umrah-packages');
        Route::get('/umrah-packages/create', [backend\UmrahPackageController::class, 'create'])->middleware('check.permission:umrah-packages,add')->name('umrah-packages.create');
        Route::get('/umrah-packages/duplicate/{id}', [backend\UmrahPackageController::class, 'duplicate'])->middleware('check.permission:umrah-packages,duplicate')->name('umrah-packages.duplicate');
        Route::get('/umrah-packages/edit/{id}', [backend\UmrahPackageController::class, 'editForm'])->middleware('check.permission:umrah-packages,edit')->name('umrah-packages.edit');

        Route::put('/umrah-packages/update/{id}', [backend\UmrahPackageController::class, 'update'])->middleware('check.permission:umrah-packages,update')->name('umrah-packages.update');
        Route::post('/umrah-packages/store', [backend\UmrahPackageController::class, 'store'])->middleware('check.permission:umrah-packages,store')->name('umrah-packages.store');

        Route::post('/umrah-packages/delete-all', [backend\UmrahPackageController::class, 'deleteAll'])->middleware('check.permission:umrah-packages,delete-all')->name('umrah-packages.delete-all');
        Route::get('/umrah-packages/trashed', [backend\UmrahPackageController::class, 'trashed'])->middleware('check.permission:umrah-packages,trashed')->name('umrah-packages.trashed');
        Route::get('/umrah-packages/restore/{id}', [backend\UmrahPackageController::class, 'restore'])->middleware('check.permission:umrah-packages,restore')->name('umrah-packages.restore');
        Route::get('/umrah-packages/forcedelete/{id}', [backend\UmrahPackageController::class, 'forceDelete'])->middleware('check.permission:umrah-packages,forcedelete')->name('umrah-packages.forcedelete');

        /* Ajax */
        Route::get('/umrah-packages/modal-view/{id}', [backend\UmrahPackageController::class, 'modalView'])->middleware('check.permission:umrah-packages,modal-view')->name('umrah-packages.modal-view');
        Route::delete('/umrah-packages/delete/{id}', [backend\UmrahPackageController::class, 'deleteAjax'])->middleware('check.permission:umrah-packages,status')->name('umrah-packages.delete');
        Route::post('/umrah-packages/{id}/status', [backend\UmrahPackageController::class, 'updateStatusAjax'])->middleware('check.permission:umrah-packages,status')->name('umrah-packages.status');
        // umrah-packages ROUTES END

        // umrah-bus-schedules ROUTES START
        Route::get('/umrah-bus-schedules', [backend\UmrahBusScheduleController::class, 'index'])->middleware('check.permission:umrah-bus-schedules,view')->name('umrah-bus-schedules');
        Route::get('/umrah-bus-schedules/create', [backend\UmrahBusScheduleController::class, 'create'])->middleware('check.permission:umrah-bus-schedules,add')->name('umrah-bus-schedules.create');
        Route::get('/umrah-bus-schedules/duplicate/{id}', [backend\UmrahBusScheduleController::class, 'duplicate'])->middleware('check.permission:umrah-bus-schedules,duplicate')->name('umrah-bus-schedules.duplicate');
        Route::get('/umrah-bus-schedules/edit/{id}', [backend\UmrahBusScheduleController::class, 'editForm'])->middleware('check.permission:umrah-bus-schedules,edit')->name('umrah-bus-schedules.edit');

        Route::put('/umrah-bus-schedules/update/{id}', [backend\UmrahBusScheduleController::class, 'update'])->middleware('check.permission:umrah-bus-schedules,update')->name('umrah-bus-schedules.update');
        Route::post('/umrah-bus-schedules/store', [backend\UmrahBusScheduleController::class, 'store'])->middleware('check.permission:umrah-bus-schedules,store')->name('umrah-bus-schedules.store');

        Route::post('/umrah-bus-schedules/delete-all', [backend\UmrahBusScheduleController::class, 'deleteAll'])->middleware('check.permission:umrah-bus-schedules,delete-all')->name('umrah-bus-schedules.delete-all');
        Route::get('/umrah-bus-schedules/trashed', [backend\UmrahBusScheduleController::class, 'trashed'])->middleware('check.permission:umrah-bus-schedules,trashed')->name('umrah-bus-schedules.trashed');
        Route::get('/umrah-bus-schedules/restore/{id}', [backend\UmrahBusScheduleController::class, 'restore'])->middleware('check.permission:umrah-bus-schedules,restore')->name('umrah-bus-schedules.restore');
        Route::get('/umrah-bus-schedules/forcedelete/{id}', [backend\UmrahBusScheduleController::class, 'forceDelete'])->middleware('check.permission:umrah-bus-schedules,forcedelete')->name('umrah-bus-schedules.forcedelete');

        /* Ajax */
        Route::get('/umrah-bus-schedules/modal-view/{id}', [backend\UmrahBusScheduleController::class, 'modalView'])->middleware('check.permission:umrah-bus-schedules,modal-view')->name('umrah-bus-schedules.modal-view');
        Route::delete('/umrah-bus-schedules/delete/{id}', [backend\UmrahBusScheduleController::class, 'deleteAjax'])->middleware('check.permission:umrah-bus-schedules,status')->name('umrah-bus-schedules.delete');
        Route::post('/umrah-bus-schedules/{id}/status', [backend\UmrahBusScheduleController::class, 'updateStatusAjax'])->middleware('check.permission:umrah-bus-schedules,status')->name('umrah-bus-schedules.status');
        // umrah-bus-schedules ROUTES END

        // umrah-air-packages ROUTES START
        Route::get('/umrah-air-packages', [backend\UmrahAirPackageController::class, 'index'])->middleware('check.permission:umrah-air-packages,view')->name('umrah-air-packages');
        Route::get('/umrah-air-packages/create', [backend\UmrahAirPackageController::class, 'create'])->middleware('check.permission:umrah-air-packages,add')->name('umrah-air-packages.create');
        Route::get('/umrah-air-packages/duplicate/{id}', [backend\UmrahAirPackageController::class, 'duplicate'])->middleware('check.permission:umrah-air-packages,duplicate')->name('umrah-air-packages.duplicate');
        Route::get('/umrah-air-packages/edit/{id}', [backend\UmrahAirPackageController::class, 'editForm'])->middleware('check.permission:umrah-air-packages,edit')->name('umrah-air-packages.edit');

        Route::put('/umrah-air-packages/update/{id}', [backend\UmrahAirPackageController::class, 'update'])->middleware('check.permission:umrah-air-packages,update')->name('umrah-air-packages.update');
        Route::post('/umrah-air-packages/store', [backend\UmrahAirPackageController::class, 'store'])->middleware('check.permission:umrah-air-packages,store')->name('umrah-air-packages.store');

        Route::post('/umrah-air-packages/delete-all', [backend\UmrahAirPackageController::class, 'deleteAll'])->middleware('check.permission:umrah-air-packages,delete-all')->name('umrah-air-packages.delete-all');
        Route::get('/umrah-air-packages/trashed', [backend\UmrahAirPackageController::class, 'trashed'])->middleware('check.permission:umrah-air-packages,trashed')->name('umrah-air-packages.trashed');
        Route::get('/umrah-air-packages/restore/{id}', [backend\UmrahAirPackageController::class, 'restore'])->middleware('check.permission:umrah-air-packages,restore')->name('umrah-air-packages.restore');
        Route::get('/umrah-air-packages/forcedelete/{id}', [backend\UmrahAirPackageController::class, 'forceDelete'])->middleware('check.permission:umrah-air-packages,forcedelete')->name('umrah-air-packages.forcedelete');

        /* Ajax */
        Route::get('/umrah-air-packages/modal-view/{id}', [backend\UmrahAirPackageController::class, 'modalView'])->middleware('check.permission:umrah-air-packages,modal-view')->name('umrah-air-packages.modal-view');
        Route::delete('/umrah-air-packages/delete/{id}', [backend\UmrahAirPackageController::class, 'deleteAjax'])->middleware('check.permission:umrah-air-packages,status')->name('umrah-air-packages.delete');
        Route::post('/umrah-air-packages/{id}/status', [backend\UmrahAirPackageController::class, 'updateStatusAjax'])->middleware('check.permission:umrah-air-packages,status')->name('umrah-air-packages.status');
        // umrah-air-packages ROUTES END

        // ramadan-packages ROUTES START
        Route::get('/ramadan-packages', [backend\RamadanPackageController::class, 'index'])->middleware('check.permission:ramadan-packages,view')->name('ramadan-packages');
        Route::get('/ramadan-packages/create', [backend\RamadanPackageController::class, 'create'])->middleware('check.permission:ramadan-packages,add')->name('ramadan-packages.create');
        Route::get('/ramadan-packages/duplicate/{id}', [backend\RamadanPackageController::class, 'duplicate'])->middleware('check.permission:ramadan-packages,duplicate')->name('ramadan-packages.duplicate');
        Route::get('/ramadan-packages/edit/{id}', [backend\RamadanPackageController::class, 'editForm'])->middleware('check.permission:ramadan-packages,edit')->name('ramadan-packages.edit');

        Route::put('/ramadan-packages/update/{id}', [backend\RamadanPackageController::class, 'update'])->middleware('check.permission:ramadan-packages,update')->name('ramadan-packages.update');
        Route::post('/ramadan-packages/store', [backend\RamadanPackageController::class, 'store'])->middleware('check.permission:ramadan-packages,store')->name('ramadan-packages.store');

        Route::post('/ramadan-packages/delete-all', [backend\RamadanPackageController::class, 'deleteAll'])->middleware('check.permission:ramadan-packages,delete-all')->name('ramadan-packages.delete-all');
        Route::get('/ramadan-packages/trashed', [backend\RamadanPackageController::class, 'trashed'])->middleware('check.permission:ramadan-packages,trashed')->name('ramadan-packages.trashed');
        Route::get('/ramadan-packages/restore/{id}', [backend\RamadanPackageController::class, 'restore'])->middleware('check.permission:ramadan-packages,restore')->name('ramadan-packages.restore');
        Route::get('/ramadan-packages/forcedelete/{id}', [backend\RamadanPackageController::class, 'forceDelete'])->middleware('check.permission:ramadan-packages,forcedelete')->name('ramadan-packages.forcedelete');

        /* Ajax */
        Route::get('/ramadan-packages/modal-view/{id}', [backend\RamadanPackageController::class, 'modalView'])->middleware('check.permission:ramadan-packages,modal-view')->name('ramadan-packages.modal-view');
        Route::delete('/ramadan-packages/delete/{id}', [backend\RamadanPackageController::class, 'deleteAjax'])->middleware('check.permission:ramadan-packages,status')->name('ramadan-packages.delete');
        Route::post('/ramadan-packages/{id}/status', [backend\RamadanPackageController::class, 'updateStatusAjax'])->middleware('check.permission:ramadan-packages,status')->name('ramadan-packages.status');
        // ramadan-packages ROUTES END

        // related-services ROUTES START
        Route::get('/related-services', [backend\RelatedServiceController::class, 'index'])->middleware('check.permission:related-services,view')->name('related-services');
        Route::get('/related-services/create', [backend\RelatedServiceController::class, 'create'])->middleware('check.permission:related-services,add')->name('related-services.create');
        Route::get('/related-services/duplicate/{id}', [backend\RelatedServiceController::class, 'duplicate'])->middleware('check.permission:related-services,duplicate')->name('related-services.duplicate');
        Route::get('/related-services/edit/{id}', [backend\RelatedServiceController::class, 'editForm'])->middleware('check.permission:related-services,edit')->name('related-services.edit');

        Route::put('/related-services/update/{id}', [backend\RelatedServiceController::class, 'update'])->middleware('check.permission:related-services,update')->name('related-services.update');
        Route::post('/related-services/store', [backend\RelatedServiceController::class, 'store'])->middleware('check.permission:related-services,store')->name('related-services.store');

        Route::post('/related-services/delete-all', [backend\RelatedServiceController::class, 'deleteAll'])->middleware('check.permission:related-services,delete-all')->name('related-services.delete-all');
        Route::get('/related-services/trashed', [backend\RelatedServiceController::class, 'trashed'])->middleware('check.permission:related-services,trashed')->name('related-services.trashed');
        Route::get('/related-services/restore/{id}', [backend\RelatedServiceController::class, 'restore'])->middleware('check.permission:related-services,restore')->name('related-services.restore');
        Route::get('/related-services/forcedelete/{id}', [backend\RelatedServiceController::class, 'forceDelete'])->middleware('check.permission:related-services,forcedelete')->name('related-services.forcedelete');

        /* Ajax */
        Route::get('/related-services/modal-view/{id}', [backend\RelatedServiceController::class, 'modalView'])->middleware('check.permission:related-services,modal-view')->name('related-services.modal-view');
        Route::delete('/related-services/delete/{id}', [backend\RelatedServiceController::class, 'deleteAjax'])->middleware('check.permission:related-services,status')->name('related-services.delete');
        Route::post('/related-services/{id}/status', [backend\RelatedServiceController::class, 'updateStatusAjax'])->middleware('check.permission:related-services,status')->name('related-services.status');
        // related-services ROUTES END

        // attributes ROUTES START
        Route::get('/attributes', [backend\AttributeController::class, 'index'])->middleware('check.permission:attributes,view')->name('attributes');
        Route::get('/attributes/create', [backend\AttributeController::class, 'create'])->middleware('check.permission:attributes,add')->name('attributes.create');
        Route::get('/attributes/duplicate/{id}', [backend\AttributeController::class, 'duplicate'])->middleware('check.permission:attributes,duplicate')->name('attributes.duplicate');
        Route::get('/attributes/edit/{id}', [backend\AttributeController::class, 'editForm'])->middleware('check.permission:attributes,edit')->name('attributes.edit');

        Route::put('/attributes/update/{id}', [backend\AttributeController::class, 'update'])->middleware('check.permission:attributes,update')->name('attributes.update');
        Route::post('/attributes/store', [backend\AttributeController::class, 'store'])->middleware('check.permission:attributes,store')->name('attributes.store');

        Route::post('/attributes/delete-all', [backend\AttributeController::class, 'deleteAll'])->middleware('check.permission:attributes,delete-all')->name('attributes.delete-all');
        Route::get('/attributes/trashed', [backend\AttributeController::class, 'trashed'])->middleware('check.permission:attributes,trashed')->name('attributes.trashed');
        Route::get('/attributes/restore/{id}', [backend\AttributeController::class, 'restore'])->middleware('check.permission:attributes,restore')->name('attributes.restore');
        Route::get('/attributes/forcedelete/{id}', [backend\AttributeController::class, 'forceDelete'])->middleware('check.permission:attributes,forcedelete')->name('attributes.forcedelete');

        /* Ajax */
        Route::get('/attributes/modal-view/{id}', [backend\AttributeController::class, 'modalView'])->middleware('check.permission:attributes,modal-view')->name('attributes.modal-view');
        Route::delete('/attributes/delete/{id}', [backend\AttributeController::class, 'deleteAjax'])->middleware('check.permission:attributes,status')->name('attributes.delete');
        Route::post('/attributes/{id}/status', [backend\AttributeController::class, 'updateStatusAjax'])->middleware('check.permission:attributes,status')->name('attributes.status');
        // attributes ROUTES END

        // brands ROUTES START
        Route::get('/brands', [backend\BrandController::class, 'index'])->middleware('check.permission:brands,view')->name('brands');
        Route::get('/brands/create', [backend\BrandController::class, 'create'])->name('brands.create');
        Route::get('/brands/duplicate/{id}', [backend\BrandController::class, 'duplicate'])->name('brands.duplicate');
        Route::get('/brands/edit/{id}', [backend\BrandController::class, 'editForm'])->name('brands.edit');

        Route::put('/brands/update/{id}', [backend\BrandController::class, 'update'])->name('brands.update');
        Route::post('/brands/store', [backend\BrandController::class, 'store'])->name('brands.store');

        Route::post('/brands/delete-all', [backend\BrandController::class, 'deleteAll'])->name('brands.delete-all');
        Route::get('/brands/trashed', [backend\BrandController::class, 'trashed'])->name('brands.trashed');
        Route::get('/brands/restore/{id}', [backend\BrandController::class, 'restore'])->name('brands.restore');
        Route::get('/brands/forcedelete/{id}', [backend\BrandController::class, 'forceDelete'])->name('brands.forcedelete');

        /* Ajax */
        Route::get('/brands/modal-view/{id}', [backend\BrandController::class, 'modalView'])->name('brands.modal-view');
        Route::delete('/brands/delete/{id}', [backend\BrandController::class, 'deleteAjax'])->name('brands.delete');
        Route::post('/brands/{id}/status', [backend\BrandController::class, 'updateStatusAjax'])->name('brands.status');
        // brands ROUTES END

        // inquiries ROUTES START
        Route::get('/inquiries', [backend\InquiriesController::class, 'index'])->middleware('check.permission:inquiries,view')->name('inquiries');
        Route::get('/inquiries/create', [backend\InquiriesController::class, 'create'])->middleware('check.permission:inquiries,add')->name('inquiries.create');
        Route::get('/inquiries/edit/{id}', [backend\InquiriesController::class, 'editForm'])->middleware('check.permission:inquiries,edit')->name('inquiries.edit');

        Route::put('/inquiries/update/{id}', [backend\InquiriesController::class, 'update'])->middleware('check.permission:inquiries,update')->name('inquiries.update');
        Route::post('/inquiries/store', [backend\InquiriesController::class, 'store'])->middleware('check.permission:inquiries,store')->name('inquiries.store');

        Route::post('/inquiries/delete-all', [backend\InquiriesController::class, 'deleteAll'])->middleware('check.permission:inquiries,delete-all')->name('inquiries.delete-all');
        Route::get('/inquiries/trashed', [backend\InquiriesController::class, 'trashed'])->middleware('check.permission:inquiries,trashed')->name('inquiries.trashed');
        Route::get('/inquiries/restore/{id}', [backend\InquiriesController::class, 'restore'])->middleware('check.permission:inquiries,restore')->name('inquiries.restore');
        Route::get('/inquiries/forcedelete/{id}', [backend\InquiriesController::class, 'forceDelete'])->middleware('check.permission:inquiries,forcedelete')->name('inquiries.forcedelete');

        /* Ajax */
        Route::get('/inquiries/modal-view/{id}', [backend\InquiriesController::class, 'modalView'])->middleware('check.permission:inquiries,modal-view')->name('inquiries.modal-view');
        Route::delete('/inquiries/delete/{id}', [backend\InquiriesController::class, 'deleteAjax'])->middleware('check.permission:inquiries,status')->name('inquiries.delete');
        Route::post('/inquiries/{id}/status', [backend\InquiriesController::class, 'updateStatusAjax'])->middleware('check.permission:inquiries,status')->name('inquiries.status');
        // inquiries ROUTES END

        // email-templates ROUTES START
        Route::get('/email-templates', [backend\EmailTemplateController::class, 'index'])->middleware('check.permission:email-templates,view')->name('email-templates');
        Route::get('/email-templates/create', [backend\EmailTemplateController::class, 'create'])->middleware('check.permission:email-templates,add')->name('email-templates.create');
        Route::get('/email-templates/duplicate/{id}', [backend\EmailTemplateController::class, 'duplicate'])->middleware('check.permission:email-templates,duplicate')->name('email-templates.duplicate');
        Route::get('/email-templates/edit/{id}', [backend\EmailTemplateController::class, 'editForm'])->middleware('check.permission:email-templates,edit')->name('email-templates.edit');

        Route::put('/email-templates/update/{id}', [backend\EmailTemplateController::class, 'update'])->middleware('check.permission:email-templates,update')->name('email-templates.update');
        Route::post('/email-templates/store', [backend\EmailTemplateController::class, 'store'])->middleware('check.permission:email-templates,store')->name('email-templates.store');

        Route::post('/email-templates/delete-all', [backend\EmailTemplateController::class, 'deleteAll'])->middleware('check.permission:email-templates,delete-all')->name('email-templates.delete-all');
        Route::get('/email-templates/trashed', [backend\EmailTemplateController::class, 'trashed'])->middleware('check.permission:email-templates,trashed')->name('email-templates.trashed');
        Route::get('/email-templates/restore/{id}', [backend\EmailTemplateController::class, 'restore'])->middleware('check.permission:email-templates,restore')->name('email-templates.restore');
        Route::get('/email-templates/forcedelete/{id}', [backend\EmailTemplateController::class, 'forceDelete'])->middleware('check.permission:email-templates,forcedelete')->name('email-templates.forcedelete');

        /* Ajax */
        Route::get('/email-templates/modal-view/{id}', [backend\EmailTemplateController::class, 'modalView'])->middleware('check.permission:email-templates,modal-view')->name('email-templates.modal-view');
        Route::delete('/email-templates/delete/{id}', [backend\EmailTemplateController::class, 'deleteAjax'])->middleware('check.permission:email-templates,status')->name('email-templates.delete');
        Route::post('/email-templates/{id}/status', [backend\EmailTemplateController::class, 'updateStatusAjax'])->middleware('check.permission:email-templates,status')->name('email-templates.status');
        // email-templates ROUTES END

        // IMS (Invoice Management System) ROUTES START
        Route::get('/invoices', [backend\CustomerInvoiceController::class, 'index'])->middleware('check.permission:invoices,view')->name('invoices');
        Route::get('/invoices/create', [backend\CustomerInvoiceController::class, 'create'])->name('invoices.create');
        Route::get('/invoices/duplicate/{id}', [backend\CustomerInvoiceController::class, 'duplicate'])->name('invoices.duplicate');
        Route::get('/invoices/edit/{id}', [backend\CustomerInvoiceController::class, 'editForm'])->name('invoices.edit');

        Route::put('/invoices/update/{id}', [backend\CustomerInvoiceController::class, 'update'])->name('invoices.update');
        Route::post('/invoices/store', [backend\CustomerInvoiceController::class, 'store'])->name('invoices.store');

        Route::get('/invoices/view/{id}', [backend\CustomerInvoiceController::class, 'view'])->name('invoices.view');
        Route::get('/invoices/download-pdf/{id}', [backend\CustomerInvoiceController::class, 'downloadPdf'])->name('invoices.download-pdf');
        Route::post('/invoices/delete-all', [backend\CustomerInvoiceController::class, 'deleteAll'])->name('invoices.delete-all');
        Route::get('/invoices/trashed', [backend\CustomerInvoiceController::class, 'trashed'])->name('invoices.trashed');
        Route::get('/invoices/restore/{id}', [backend\CustomerInvoiceController::class, 'restore'])->name('invoices.restore');
        Route::get('/invoices/forcedelete/{id}', [backend\CustomerInvoiceController::class, 'forceDelete'])->name('invoices.forcedelete');

        /* Ajax */
        Route::get('/invoices/modal-view/{id}', [backend\CustomerInvoiceController::class, 'modalView'])->name('invoices.modal-view');
        Route::delete('/invoices/delete/{id}', [backend\CustomerInvoiceController::class, 'deleteAjax'])->name('invoices.delete');
        Route::post('/invoices/{id}/status', [backend\CustomerInvoiceController::class, 'updateStatusAjax'])->name('invoices.status');
        // IMS (Invoice Management System) ROUTES END

        // QMS (Quotation Management System) ROUTES START
        Route::get('/quotations', [backend\CustomerQuotationController::class, 'index'])->middleware('check.permission:quotations,view')->name('quotations');
        Route::get('/quotations/create', [backend\CustomerQuotationController::class, 'create'])->name('quotations.create');
        Route::get('/quotations/duplicate/{id}', [backend\CustomerQuotationController::class, 'duplicate'])->name('quotations.duplicate');
        Route::get('/quotations/edit/{id}', [backend\CustomerQuotationController::class, 'editForm'])->name('quotations.edit');

        Route::put('/quotations/update/{id}', [backend\CustomerQuotationController::class, 'update'])->name('quotations.update');
        Route::post('/quotations/store', [backend\CustomerQuotationController::class, 'store'])->name('quotations.store');

        Route::get('/quotations/view/{id}', [backend\CustomerQuotationController::class, 'view'])->name('quotations.view');
        Route::get('/quotations/download-pdf/{id}', [backend\CustomerQuotationController::class, 'downloadPdf'])->name('quotations.download-pdf');
        Route::post('/quotations/delete-all', [backend\CustomerQuotationController::class, 'deleteAll'])->name('quotations.delete-all');
        Route::get('/quotations/trashed', [backend\CustomerQuotationController::class, 'trashed'])->name('quotations.trashed');
        Route::get('/quotations/restore/{id}', [backend\CustomerQuotationController::class, 'restore'])->name('quotations.restore');
        Route::get('/quotations/forcedelete/{id}', [backend\CustomerQuotationController::class, 'forceDelete'])->name('quotations.forcedelete');

        /* Ajax */
        Route::get('/quotations/modal-view/{id}', [backend\CustomerQuotationController::class, 'modalView'])->name('quotations.modal-view');
        Route::delete('/quotations/delete/{id}', [backend\CustomerQuotationController::class, 'deleteAjax'])->name('quotations.delete');
        Route::post('/quotations/{id}/status', [backend\CustomerQuotationController::class, 'updateStatusAjax'])->name('quotations.status');
        // QMS (Quotation Management System) ROUTES END

        // GALLERIES ROUTES START
        Route::get('/galleries', [backend\GalleryController::class, 'index'])->middleware('check.permission:galleries,view')->name('galleries');
        Route::get('/galleries/create', [backend\GalleryController::class, 'create'])->name('galleries.create');
        Route::get('/galleries/edit/{id}', [backend\GalleryController::class, 'editForm'])->name('galleries.edit');
        Route::put('/galleries/update/{id}', [backend\GalleryController::class, 'update'])->name('galleries.update');
        Route::post('/galleries/store', [backend\GalleryController::class, 'store'])->name('galleries.store');
        Route::post('/galleries/delete-all', [backend\GalleryController::class, 'deleteAll'])->name('galleries.delete-all');
        Route::get('/galleries/view/{id}', [backend\GalleryController::class, 'view'])->name('galleries.view');
        Route::get('/galleries/trashed', [backend\GalleryController::class, 'trashed'])->name('galleries.trashed');
        Route::get('/galleries/restore/{id}', [backend\GalleryController::class, 'restore'])->name('galleries.restore');
        Route::get('/galleries/forcedelete/{id}', [backend\GalleryController::class, 'forceDelete'])->name('galleries.forcedelete');
        Route::post('/galleries/update-title', [backend\GalleryController::class, 'updateTitleAjax'])->name('galleries.update-title');
        Route::get('/galleries/modal-view/{id}', [backend\GalleryController::class, 'modalView'])->name('galleries.modal-view');
        Route::post('/galleries/update-ordering', [backend\GalleryController::class, 'updateOrderingAjax'])->name('galleries.update-ordering');
        Route::delete('/galleries/delete/{id}', [backend\GalleryController::class, 'deleteAjax'])->name('galleries.delete');
        Route::post('/galleries/{id}/status', [backend\GalleryController::class, 'updateStatusAjax'])->name('galleries.status');
        Route::get('/galleries/images/{id}', [backend\GalleryController::class, 'imagesIndex'])->name('galleries.images');
        Route::post('/galleries/images/update-title', [backend\GalleryController::class, 'updateImageTitleAjax'])->name('galleries.images.update-title');
        Route::post('/galleries/images/update-alt', [backend\GalleryController::class, 'updateImageAltAjax'])->name('galleries.images.update-alt');
        Route::post('/galleries/images/update-ordering', [backend\GalleryController::class, 'updateImageOrderingAjax'])->name('galleries.images.update-ordering');
        Route::delete('/galleries/images/delete/{id}', [backend\GalleryController::class, 'deleteImageAjax'])->name('galleries.images.delete');
        Route::post('/galleries/images/{id}/status', [backend\GalleryController::class, 'updateImageStatusAjax'])->name('galleries.images.status');
        // GALLERIES ROUTES END

        // REQUIRED DOCUMENTS ROUTES START
        Route::get('/required-documents', [backend\RequiredDocumentController::class, 'index'])->middleware('check.permission:required-documents,view')->name('required-documents');
        Route::get('/required-documents/create', [backend\RequiredDocumentController::class, 'create'])->middleware('check.permission:required-documents,add')->name('required-documents.create');
        Route::get('/required-documents/duplicate/{id}', [backend\RequiredDocumentController::class, 'duplicate'])->middleware('check.permission:required-documents,duplicate')->name('required-documents.duplicate');
        Route::get('/required-documents/edit/{id}', [backend\RequiredDocumentController::class, 'editForm'])->middleware('check.permission:required-documents,edit')->name('required-documents.edit');

        Route::put('/required-documents/update/{id}', [backend\RequiredDocumentController::class, 'update'])->middleware('check.permission:required-documents,update')->name('required-documents.update');
        Route::post('/required-documents/store', [backend\RequiredDocumentController::class, 'store'])->middleware('check.permission:required-documents,store')->name('required-documents.store');

        Route::post('/required-documents/delete-all', [backend\RequiredDocumentController::class, 'deleteAll'])->middleware('check.permission:required-documents,delete-all')->name('required-documents.delete-all');
        Route::get('/required-documents/trashed', [backend\RequiredDocumentController::class, 'trashed'])->middleware('check.permission:required-documents,trashed')->name('required-documents.trashed');
        Route::get('/required-documents/restore/{id}', [backend\RequiredDocumentController::class, 'restore'])->middleware('check.permission:required-documents,restore')->name('required-documents.restore');
        Route::get('/required-documents/forcedelete/{id}', [backend\RequiredDocumentController::class, 'forceDelete'])->middleware('check.permission:required-documents,forcedelete')->name('required-documents.forcedelete');

        /* Ajax */
        Route::get('/required-documents/modal-view/{id}', [backend\RequiredDocumentController::class, 'modalView'])->middleware('check.permission:required-documents,modal-view')->name('required-documents.modal-view');
        Route::delete('/required-documents/delete/{id}', [backend\RequiredDocumentController::class, 'deleteAjax'])->middleware('check.permission:required-documents,status')->name('required-documents.delete');
        Route::post('/required-documents/{id}/status', [backend\RequiredDocumentController::class, 'updateStatusAjax'])->middleware('check.permission:required-documents,status')->name('required-documents.status');
        // REQUIRED DOCUMENTS ROUTES END

        // VACCINATION CENTERS ROUTES START
        Route::get('/vaccination-centers', [backend\VaccinationCenterController::class, 'index'])->middleware('check.permission:vaccination-centers,view')->name('vaccination-centers');
        Route::get('/vaccination-centers/create', [backend\VaccinationCenterController::class, 'create'])->middleware('check.permission:vaccination-centers,add')->name('vaccination-centers.create');
        Route::get('/vaccination-centers/duplicate/{id}', [backend\VaccinationCenterController::class, 'duplicate'])->middleware('check.permission:vaccination-centers,duplicate')->name('vaccination-centers.duplicate');
        Route::get('/vaccination-centers/edit/{id}', [backend\VaccinationCenterController::class, 'editForm'])->middleware('check.permission:vaccination-centers,edit')->name('vaccination-centers.edit');

        Route::put('/vaccination-centers/update/{id}', [backend\VaccinationCenterController::class, 'update'])->middleware('check.permission:vaccination-centers,update')->name('vaccination-centers.update');
        Route::post('/vaccination-centers/store', [backend\VaccinationCenterController::class, 'store'])->middleware('check.permission:vaccination-centers,store')->name('vaccination-centers.store');

        Route::post('/vaccination-centers/delete-all', [backend\VaccinationCenterController::class, 'deleteAll'])->middleware('check.permission:vaccination-centers,delete-all')->name('vaccination-centers.delete-all');
        Route::get('/vaccination-centers/trashed', [backend\VaccinationCenterController::class, 'trashed'])->middleware('check.permission:vaccination-centers,trashed')->name('vaccination-centers.trashed');
        Route::get('/vaccination-centers/restore/{id}', [backend\VaccinationCenterController::class, 'restore'])->middleware('check.permission:vaccination-centers,restore')->name('vaccination-centers.restore');
        Route::get('/vaccination-centers/forcedelete/{id}', [backend\VaccinationCenterController::class, 'forceDelete'])->middleware('check.permission:vaccination-centers,forcedelete')->name('vaccination-centers.forcedelete');

        /* Ajax */
        Route::get('/vaccination-centers/modal-view/{id}', [backend\VaccinationCenterController::class, 'modalView'])->middleware('check.permission:vaccination-centers,modal-view')->name('vaccination-centers.modal-view');
        Route::delete('/vaccination-centers/delete/{id}', [backend\VaccinationCenterController::class, 'deleteAjax'])->middleware('check.permission:vaccination-centers,status')->name('vaccination-centers.delete');
        Route::post('/vaccination-centers/{id}/status', [backend\VaccinationCenterController::class, 'updateStatusAjax'])->middleware('check.permission:vaccination-centers,status')->name('vaccination-centers.status');
        // VACCINATION CENTERS ROUTES END

    });
});

// FRONTEND ROUTES
Route::middleware(['frontend', 'maintenance'])->group(function () {
    /* direct page routes */
    Route::get('/', [frontend\MainController::class, 'index'])->name('/');
    Route::get('/tour-details', [frontend\MainController::class, 'tourDetails'])->name('tour-details');
    Route::get('/blogs/load-more', [frontend\MainController::class, 'loadMoreBlogs'])->name('blogs.load-more');

    Route::match(['get', 'post'], '/send', [frontend\InquiriesController::class, 'index'])->name('send');
    /* all dynamic CMS pages */
    Route::get('/{slug}', [frontend\MainController::class, 'show'])
            ->where('slug', '[a-zA-Z0-9\-]+')
            ->name('page.default');
});

