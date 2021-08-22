<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
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


Route::redirect('/home', 'user');
Route::redirect('/admin', '/login');
Auth::routes(['register' => 'false', 'reset' => 'false', 'confirm' => 'false']);
//Admin manager
Route::group(['as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('user/deactivated', [UserController::class, 'showListDeactivateUsers'])->name('user.deactivated');
    Route::resource('user', UserController::class);
});
