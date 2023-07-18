<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes(['register' => false]);

Route::get('/mark-as-read', [App\Http\Controllers\HomeController::class, 'markAsRead'])->name('mark-as-read');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function () {
    Route::prefix('backend')->group(function () {
        Route::resource('menu', \App\Http\Controllers\backend\MenuController::class, ['names' => 'backend.menu']);
    });
    Route::get('/backend/activity_logs', [\App\Http\Controllers\backend\ActivityLogsController::class, 'activityLogs'])->name('backend.activity_logs');


    Route::prefix('backend')->group(function () {
        Route::resource('user', \App\Http\Controllers\backend\UserController::class, ['names' => 'backend.user']);
    });
    Route::prefix('backend')->group(function () {
        Route::resource('role', \App\Http\Controllers\backend\RoleController::class, ['names' => 'backend.role']);
    });

    Route::get('/menu/order', [\App\Http\Controllers\backend\MenuController::class, 'menu_order'])->name('menu.menu_order');
    Route::post('/menu/menu_order_change', [\App\Http\Controllers\backend\MenuController::class, 'menu_order_change'])->name('menu.order_change');
    Route::prefix('backend')->group(function () {
        Route::resource('banner', \App\Http\Controllers\backend\BannerController::class, ['names' => 'backend.banner']);
    });
    Route::prefix('backend')->group(function () {
        Route::resource('about', \App\Http\Controllers\backend\AboutController::class, ['names' => 'backend.about']);
    });
    Route::post('/tmp-upload', [\App\Http\Controllers\backend\AboutController::class, 'tmpUpload']);
    Route::delete('/tmp-delete', [\App\Http\Controllers\backend\AboutController::class, 'tmpDelete']);

    Route::get('/backend/contact', [\App\Http\Controllers\backend\ContactController::class, 'backend.contact']);

    Route::get('export-contacts', [\App\Http\Controllers\backend\ContactController::class, 'exportContacts']);
    Route::post('/upload-contact',[\App\Http\Controllers\backend\ContactController::class,'upload'])->name('uploadContacts');

    Route::prefix('backend')->group(function () {
        Route::resource('contact', \App\Http\Controllers\backend\ContactController::class, ['names' => 'backend.contact']);
    });
    Route::prefix('backend')->group(function () {
        Route::resource('framework', \App\Http\Controllers\backend\FrameworkController::class, ['names' => 'backend.framework']);
    });
    Route::prefix('backend')->group(function () {
        Route::resource('area', \App\Http\Controllers\backend\AreaController::class, ['names' => 'backend.area']);
    });
    Route::prefix('backend')->group(function () {
        Route::resource('news', \App\Http\Controllers\backend\NewsController::class, ['names' => 'backend.news']);
    });
    Route::prefix('backend')->group(function () {
        Route::resource('album', \App\Http\Controllers\backend\AlbumController::class, ['names' => 'backend.album']);
    });
    Route::prefix('backend')->group(function () {
        Route::resource('gallery', \App\Http\Controllers\backend\GalleryController::class, ['names' => 'backend.gallery']);
    });
    Route::prefix('backend')->group(function () {
        Route::resource('resource', \App\Http\Controllers\backend\ResourceController::class, ['names' => 'backend.resource']);
    });
    Route::prefix('backend')->group(function () {
        Route::resource('partner', \App\Http\Controllers\backend\PartnerController::class, ['names' => 'backend.partner']);
    });
    Route::prefix('backend')->group(function () {
        Route::resource('setting', \App\Http\Controllers\backend\SettingController::class, ['names' => 'backend.setting']);
    });
    Route::get('/admin/profile', [\App\Http\Controllers\HomeController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/profile/edit', [\App\Http\Controllers\HomeController::class, 'edit'])->name('profile.edit');
    Route::put('/admin/updateProfile', [\App\Http\Controllers\HomeController::class, 'update'])->name('profile.update');
    Route::get('/admin/changePassword', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('admin.password.change');
    Route::put('/admin/updatePassword', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('admin.password.update');
    Route::patch('/menu-status-approval/{id}', [\App\Http\Controllers\backend\MenuController::class, 'status'])->name('menu.status');
});
Route::get('/home', [\App\Http\Controllers\frontend\HomeController::class, 'home'])->name('home');
Route::get('/', [\App\Http\Controllers\frontend\HomeController::class, 'home'])->name('home');

Route::get('/about', [\App\Http\Controllers\frontend\HomeController::class, 'about'])->name('about');
Route::get('/frameworks', [\App\Http\Controllers\frontend\HomeController::class, 'about'])->name('about');
Route::get('/framework/{slug}', [\App\Http\Controllers\frontend\HomeController::class, 'framework'])->name('framework.show');
Route::get('/area', [\App\Http\Controllers\frontend\HomeController::class, 'area'])->name('area');
Route::get('/area/{slug}', [\App\Http\Controllers\frontend\HomeController::class, 'area_show'])->name('area.show');
Route::get('/news', [\App\Http\Controllers\frontend\HomeController::class, 'news'])->name('news');
Route::get('/news/{slug}', [\App\Http\Controllers\frontend\HomeController::class, 'newsShow'])->name('news.show');
Route::get('/gallery', [\App\Http\Controllers\frontend\HomeController::class, 'gallery'])->name('gallery');
Route::get('/resource', [\App\Http\Controllers\frontend\HomeController::class, 'resource'])->name('resource');
Route::get('/resource/{slug}', [\App\Http\Controllers\frontend\HomeController::class, 'resourceShow'])->name('resource.show');
Route::get('/partners', [\App\Http\Controllers\frontend\HomeController::class, 'partner'])->name('partner');
Route::post('/contact/store', [\App\Http\Controllers\frontend\HomeController::class, 'store'])->name('contact.store');
Route::get('lang/change', [\App\Http\Controllers\LangController::class, 'change'])->name('changeLang');







