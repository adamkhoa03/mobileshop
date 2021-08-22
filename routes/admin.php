<?php

use App\Http\Controllers\Admin\DashboardController;
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


Route::redirect('/home', '/dashboard');
Route::redirect('/admin', '/login');
Auth::routes(['register' => 'false', 'reset' => 'false', 'confirm' => 'false']);

//Admin manager
Route::group(['as' => 'admin.', 'middleware' => ['auth', 'checkDisableAccount']], function () {

    //Dashboard manager
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    //Users profile manager
    Route::get('user/disabled', [UserController::class, 'showListDeactivateUsers'])->name('user.deactivated');
    Route::get('profile', [UserController::class, 'getFormUpdateProfile'])->name('user.profile');
    Route::post('profile', [UserController::class, 'updateProfile']);
    Route::put('update-avatar', [UserController::class, 'updateAvatar'])->name('user.profile.avatar');
    Route::resource('user', UserController::class);
});
