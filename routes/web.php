<?php

use App\Http\Controllers\backend\MenuController;
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
    Route::resource('menu', MenuController::class, ['names' => 'backend.menu']);
});
Route::patch('/menu-status-approval/{id}', [MenuController::class, 'status'])->name('menu.status');
Route::get('/try', function () {
    return view('welcome2');
});
