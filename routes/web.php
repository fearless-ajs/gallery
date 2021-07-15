<?php

use App\Http\Controllers\user\UserPagesController;
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

Route::get('/',               [UserPagesController::class, 'homepage'])->name('user.homepage');
Route::get('/about',          [UserPagesController::class, 'aboutPage'])->name('user.about');
Route::get('/articles',       [UserPagesController::class, 'articlesPage'])->name('user.articles');
Route::get('/articles/{id}',  [UserPagesController::class, 'articleViewPage'])->name('user.view.article');
Route::get('/our-open-house', [UserPagesController::class, 'openHousePage'])->name('user.open-houses');
