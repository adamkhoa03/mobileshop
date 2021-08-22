<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('login', [LoginController::class, 'showFormLogin'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::redirect('/home','user');
Route::group(['as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('user/deactivated', [UserController::class, 'showListDeactivateUsers'])->name('user.deactivated');
    Route::resource('user', UserController::class);
});
