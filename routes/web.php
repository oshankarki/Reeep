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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('backend')->group(function () {
    Route::resource('menu', \App\Http\Controllers\backend\MenuController::class, ['names' => 'backend.menu']);
});
Route::prefix('backend')->group(function () {
    Route::resource('banner', \App\Http\Controllers\backend\BannerController::class, ['names' => 'backend.banner']);
});
Route::prefix('backend')->group(function () {
    Route::resource('about', \App\Http\Controllers\backend\AboutController::class, ['names' => 'backend.about']);
});
Route::prefix('backend')->group(function () {
    Route::resource('framework', \App\Http\Controllers\backend\FrameworkController::class, ['names' => 'backend.framework']);
});
Route::patch('/menu-status-approval/{id}', [MenuController::class, 'status'])->name('menu.status');
Route::get('/try', function () {
    $data['bannerFirst'] = \App\Models\Backend\Banner::first();
    $data['banners'] = \App\Models\Backend\Banner::get()->skip(1);
    $data['about'] = \App\Models\Backend\About::first();

    return view('welcome2',compact('data'));
});
Route::get('/about', [\App\Http\Controllers\frontend\HomeController::class, 'about'])->name('about');
Route::get('/framework/{id}', [\App\Http\Controllers\frontend\HomeController::class, 'framework'])->name('framework.show');


