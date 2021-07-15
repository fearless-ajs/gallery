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

Route::get('/',                                         [UserPagesController::class, 'homepage'])->name('user.homepage');
Route::get('/about',                                    [UserPagesController::class, 'aboutPage'])->name('user.about');
Route::get('/articles',                                 [UserPagesController::class, 'articlesPage'])->name('user.articles');
Route::get('/articles/{id}',                            [UserPagesController::class, 'articleViewPage'])->name('user.view.article');
Route::get('/our-open-house',                           [UserPagesController::class, 'openHousePage'])->name('user.open-houses');



Route::get('/videos',                                   [UserPagesController::class, 'videosPage'])->name('user.videos');
Route::get('/albums',                                   [UserPagesController::class, 'albumsPage'])->name('user.albums');
Route::get('/pictures/{album_id}',                      [UserPagesController::class, 'picturesPage'])->name('user.pictures');
Route::get('/sub-albums/{album_id}',                    [UserPagesController::class, 'subAlbumsPage'])->name('user.sub-albums');
Route::get('/sub_pictures/{sub_album_id}',              [UserPagesController::class, 'subPicturesPage'])->name('user.sub-pictures');
Route::get('/sub-sub-albums/{sub_album_id}',            [UserPagesController::class, 'subSubAlbumsPage'])->name('user.sub-sub-albums');
Route::get('/sub_sub_pictures/{sub_sub_album_id}',      [UserPagesController::class, 'subSubPicturesPage'])->name('user.sub-sub-pictures');
