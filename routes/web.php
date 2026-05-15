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
    // pwd: adnan*2563325
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
        Route::get('/user-types', [backend\UserTypeController::class, 'index'])->name('user-types');
        Route::get('/user-types/create', [backend\UserTypeController::class, 'create'])->name('user-types.create');
        Route::post('/user-types', [backend\UserTypeController::class, 'store'])->name('user-types.store');
        Route::get('/user-types/duplicate/{id}', [backend\UserTypeController::class, 'duplicate'])->name('user-types.duplicate');

        Route::get('/user-types/edit/{id}', [backend\UserTypeController::class, 'edit'])->name('user-types.edit');
        Route::put('/user-types/update/{id}', [backend\UserTypeController::class, 'update'])->name('user-types.update');

        //Route::get('/user-types/delete/{id}', [backend\UserTypeController::class, 'delete'])->name('user-types
        //.delete');
        Route::post('/user-types/delete-all', [backend\UserTypeController::class, 'deleteAll'])->name('user-types.delete-all');

        /* Ajax */
        Route::delete('/user-types/delete/{id}', [backend\UserTypeController::class, 'deleteAjax'])->name('user-types.delete');
        Route::post('/user-types/{id}/status', [backend\UserTypeController::class, 'updateStatusAjax'])->name('user-types.status');

        Route::get('/user-types/trashed', [backend\UserTypeController::class, 'trashed'])->name('user-types.trashed');
        Route::get('/user-types/restore/{id}', [backend\UserTypeController::class, 'restore'])->name('user-types.restore');
        Route::get('/user-types/forcedelete/{id}', [backend\UserTypeController::class, 'forceDelete'])->name('user-types.forcedelete');
        // USER TYPES ROUTES END

        // USERS ROUTES START
        Route::get('/users', [backend\UserController::class, 'index'])->name('users');
        Route::get('/users/create', [backend\UserController::class, 'create'])->name('users.create');
        Route::post('/users', [backend\UserController::class, 'store'])->name('users.store');
        Route::get('/users/duplicate/{id}', [backend\UserController::class, 'duplicate'])->name('users.duplicate');

        Route::get('/users/edit/{id}', [backend\UserController::class, 'editForm'])->name('users.edit');
        Route::match(['post', 'put'], '/users/update/{id}', [backend\UserController::class, 'update'])->name('users.update');
        Route::get('/users/view/{id}', [backend\UserController::class, 'view'])->name('users.view');

        //Route::get('/users/{id}/status', [backend\UserController::class, 'status'])->name('users.status');
        Route::match(['post', 'get'], '/profile', [backend\UserController::class, 'updateProfile'])->name('profile');

        //Route::get('/users/delete/{id}', [backend\UserController::class, 'delete'])->name('users.delete');
        Route::post('/users/delete-all', [backend\UserController::class, 'deleteAll'])->name('users.delete-all');

        /* Ajax */
        Route::get('/users/modal-view/{id}', [backend\UserController::class, 'modalView'])->name('users.modal-view');
        Route::delete('/users/delete/{id}', [backend\UserController::class, 'deleteAjax'])->name('users.delete');
        Route::post('/users/{id}/status', [backend\UserController::class, 'updateStatusAjax'])->name('users.status');

        Route::get('/users/trashed', [backend\UserController::class, 'trashed'])->name('users.trashed');
        Route::get('/users/restore/{id}', [backend\UserController::class, 'restore'])->name('users.restore');
        Route::get('/users/forcedelete/{id}', [backend\UserController::class, 'forceDelete'])->name('users.forcedelete');
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
        Route::get('/pages', [backend\PageController::class, 'index'])->name('pages');
        Route::get('/pages/create', [backend\PageController::class, 'create'])->middleware('check.permission:pages,add')->name('pages.create');
        Route::get('/pages/duplicate/{id}', [backend\PageController::class, 'duplicate'])->middleware('check.permission:pages,duplicate')->name('pages.duplicate');
        Route::get('/pages/edit/{id}', [backend\PageController::class, 'editForm'])->middleware('check.permission:pages,edit')->name('pages.edit');

        Route::put('/pages/update/{id}', [backend\PageController::class, 'update'])->middleware('check.permission:pages,update')->name('pages.update');
        Route::post('/pages/store', [backend\PageController::class, 'store'])->middleware('check.permission:pages,store')->name('pages.store');

        //Route::get('/pages/delete/{id}', [backend\PageController::class, 'delete'])->middleware('check
        //.permission:pages,delete')->name('pages.delete');
        Route::post('/pages/delete-all', [backend\PageController::class, 'deleteAll'])->middleware('check.permission:pages,delete-all')->name('pages.delete-all');
        Route::get('/pages/view/{id}', [backend\PageController::class, 'view'])->middleware('check.permission:pages,view')->name('pages.view');
        //Route::get('/pages/{id}/status', [backend\PageController::class, 'status'])->middleware('check
        //.permission:pages,status')->name('pages.status');

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
        Route::delete('/pages/delete/{id}', [backend\PageController::class, 'deleteAjax'])->middleware('check.permission:pages,delete')->name('pages.delete');
        Route::post('/pages/{id}/status', [backend\PageController::class, 'updateStatusAjax'])->middleware('check.permission:pages,status')->name('pages.status');
        // PAGES ROUTES END

        // TOURS ROUTES START
        Route::get('/tours', [backend\TourController::class, 'index'])->name('tours');
        Route::get('/tours/create', [backend\TourController::class, 'create'])->middleware('check.permission:tours,add')->name('tours.create');
        Route::get('/tours/duplicate/{id}', [backend\TourController::class, 'duplicate'])->middleware('check.permission:tours,duplicate')->name('tours.duplicate');
        Route::get('/tours/edit/{id}', [backend\TourController::class, 'editForm'])->middleware('check.permission:tours,edit')->name('tours.edit');

        Route::put('/tours/update/{id}', [backend\TourController::class, 'update'])->middleware('check.permission:tours,update')->name('tours.update');
        Route::post('/tours/store', [backend\TourController::class, 'store'])->middleware('check.permission:tours,store')->name('tours.store');

        //Route::get('/tours/delete/{id}', [backend\TourController::class, 'delete'])->middleware('check
        //.permission:tours,delete')->name('tours.delete');
        Route::post('/tours/delete-all', [backend\TourController::class, 'deleteAll'])->middleware('check.permission:tours,delete-all')->name('tours.delete-all');
        Route::get('/tours/view/{id}', [backend\TourController::class, 'view'])->middleware('check.permission:tours,view')->name('tours.view');
        //Route::get('/tours/{id}/status', [backend\TourController::class, 'status'])->middleware('check
        //.permission:tours,status')->name('tours.status');

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

        // BLOGS CATEGORIES ROUTES START
        Route::get('/blog-categories', [backend\BlogCategoryController::class, 'index'])->name('blog-categories');
        Route::get('/blog-category/create', [backend\BlogCategoryController::class, 'create'])->name('blog-category.create');
        Route::get('/blog-category/duplicate/{id}', [backend\BlogCategoryController::class, 'duplicate'])->name('blog-category.duplicate');
        Route::get('/blog-category/edit/{id}', [backend\BlogCategoryController::class, 'editForm'])->name('blog-category.edit');

        Route::post('/blog-category/store', [backend\BlogCategoryController::class, 'store'])->name('blog-category.store');
        Route::put('/blog-category/update/{id}', [backend\BlogCategoryController::class, 'update'])->name('blog-category.update');

        //Route::get('/blog-category/delete/{id}', [backend\BlogCategoryController::class, 'delete'])->name
        //('blog-category.delete');
        Route::post('/blog-category/delete-all', [backend\BlogCategoryController::class, 'deleteAll'])->name('blog-category.delete-all');
        //Route::get('/blog-category/{id}/status', [backend\BlogCategoryController::class, 'status'])->name
        //('blog-category.status');

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
        Route::get('/product-categories', [backend\ProductCategoryController::class, 'index'])->name('product-categories');
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
        Route::get('/products', [backend\ProductController::class, 'index'])->name('products');
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
        Route::get('/blog-tags', [backend\BlogTagController::class, 'index'])->name('blog-tags');
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
        Route::get('/blogs', [backend\BlogController::class, 'index'])->name('blogs');
        Route::get('/blogs/create', [backend\BlogController::class, 'create'])->name('blogs.create');
        Route::get('/blogs/duplicate/{id}', [backend\BlogController::class, 'duplicate'])->name('blogs.duplicate');
        Route::get('/blogs/edit/{id}', [backend\BlogController::class, 'editForm'])->name('blogs.edit');

        Route::post('/blogs/store', [backend\BlogController::class, 'store'])->name('blogs.store');
        Route::put('/blogs/update/{id}', [backend\BlogController::class, 'update'])->name('blogs.update');

        //Route::get('/blogs/delete/{id}', [backend\BlogController::class, 'delete'])->name('blogs.delete');
        Route::post('/blogs/delete-all', [backend\BlogController::class, 'deleteAll'])->name('blogs.delete-all');
        Route::get('/blogs/view/{id}', [backend\BlogController::class, 'view'])->name('blogs.view');
        //Route::get('/blogs/{id}/status', [backend\BlogController::class, 'status'])->name('blogs.status');

        /* Ajax */
        Route::get('/blogs/import', [backend\BlogController::class, 'importForm'])->name('blogs.import-form');
        Route::post('/blogs/import', [backend\BlogController::class, 'import'])->name('blogs.import');
        Route::get('/blogs/export', [backend\BlogController::class, 'export'])->name('blogs.export');
        Route::post('/blogs/update-title', [backend\BlogController::class, 'updateTitleAjax'])->name('blogs.update-title');
        Route::get('/blogs/modal-view/{id}', [backend\BlogController::class, 'modalView'])->name('blogs.modal-view');
        Route::post('/blogs/update-ordering', [backend\BlogController::class, 'updateOrderingAjax'])->name('blogs.update-ordering');
        Route::delete('/blogs/delete/{id}', [backend\BlogController::class, 'deleteAjax'])->name('blogs.delete');
        Route::post('/blogs/{id}/status', [backend\BlogController::class, 'updateStatusAjax'])->name('blogs.status');

        Route::get('/blogs/trashed', [backend\BlogController::class, 'trashed'])->name('blogs.trashed');
        Route::get('/blogs/restore/{id}', [backend\BlogController::class, 'restore'])->name('blogs.restore');
        Route::get('/blogs/forcedelete/{id}', [backend\BlogController::class, 'forceDelete'])->name('blogs.forcedelete');
        // BLOGS ROUTES END

        // STATIC BLOCKS ROUTES START
        Route::get('/static-blocks', [backend\StaticBlocksController::class, 'index'])->name('static-blocks');
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
        Route::get('/sliders', [backend\SliderController::class, 'index'])->name('sliders');
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
        Route::get('/settings', [backend\SettingController::class, 'index'])->name('settings');
        Route::put('/setting/update-form', [backend\SettingController::class, 'update'])->name('setting.update-form');
        // SETTING ROUTES END

        // testimonials ROUTES START
        Route::get('/testimonials', [backend\TestimonialController::class, 'index'])->name('testimonials');
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
        Route::get('/coupons', [backend\CouponsController::class, 'index'])->name('coupons');
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
        Route::get('/reviews', [backend\ReviewController::class, 'index'])->name('reviews');
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

        // faqs ROUTES START
        Route::get('/faqs', [backend\FaqController::class, 'index'])->name('faqs');
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

        // attributes ROUTES START
        Route::get('/attributes', [backend\AttributeController::class, 'index'])->name('attributes');
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
        Route::get('/brands', [backend\BrandController::class, 'index'])->name('brands');
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
        Route::get('/inquiries', [backend\InquiriesController::class, 'index'])->name('inquiries');
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
        Route::get('/email-templates', [backend\EmailTemplateController::class, 'index'])->name('email-templates');
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
        Route::get('/invoices', [backend\CustomerInvoiceController::class, 'index'])->name('invoices');
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
        Route::get('/quotations', [backend\CustomerQuotationController::class, 'index'])->name('quotations');
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
        Route::get('/galleries', [backend\GalleryController::class, 'index'])->name('galleries');
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

    });
});

// FRONTEND ROUTES
Route::middleware(['frontend', 'maintenance'])->group(function () {
    Route::get('/', [frontend\MainController::class, 'index'])->name('/');
    Route::get('/about-us', [frontend\MainController::class, 'about'])->name('about-us');
    Route::get('/custom-embroidered-patches-maker-in-usa', [frontend\MainController::class, 'patches'])->name('custom-embroidered-patches-maker-in-usa');
    Route::match(['get', 'post'], '/send', [frontend\InquiriesController::class, 'index'])->name('send');
});

