<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('dashboard',AdminController::class);
Route::get('dashboard_user',[UserController::class,'view'])->name('dashboard_user');
Route::get('notification/{id}',[UserController::class,'show'])->name('notification');
Route::get('ReadNotification',[UserController::class,'ReadAll'])->name('ReadNotification');
