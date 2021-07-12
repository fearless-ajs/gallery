<?php

use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\RBAC\RoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login',            [AdminAuthController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {
    Route::middleware('role:administrator')->group(function (){
        Route::get('/register', [AdminAuthController::class, 'register'])->name('admin.register');
        Route::get('/dashboard',[AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/settings', [AdminDashboardController::class, 'settings'])->name('admin.settings');
        Route::get('/role',     [RoleController::class, 'store'])->name('role.create');
    });

    Route::get('/logout',   [AdminAuthController::class, 'logout'])->name('logout');
});
