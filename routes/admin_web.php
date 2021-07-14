<?php

use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminGalleryController;
use App\Http\Controllers\admin\AdminPagesController;
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

        /**
         * | System Authentication and dashboard route
         */
        Route::get('/register',                [AdminAuthController::class, 'register'])->name('admin.register');
        Route::get('/dashboard',               [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/settings',                [AdminDashboardController::class, 'settings'])->name('admin.settings');
        Route::get('/role',                    [RoleController::class, 'store'])->name('role.create');

       /**
        * | System pages generator routes
        * | Routes for creating page contents
        */
        Route::get('/generate/home',           [AdminPagesController::class, 'homePage'])->name('homepage.generate');
        Route::get('/generate/about',          [AdminPagesController::class, 'aboutPage'])->name('about.generate');
        Route::get('/generate/open-house',     [AdminPagesController::class, 'openHousePage'])->name('open-house.generate');
        Route::get('/open-house',              [AdminPagesController::class, 'openHouseDatePage'])->name('admin.open-house-dates');
        Route::get('/new-article',             [AdminPagesController::class, 'newArticlePage'])->name('admin.new-article');
        Route::get('/all-article',             [AdminPagesController::class, 'articleListPage'])->name('admin.all-articles');
        Route::get('/edit-article/{id}',       [AdminPagesController::class, 'editArticlePage'])->name('admin.edit-article');

        /**
         * | System gallery generator routes
         * | Routes for creating gallery page contents
         */
        Route::get('/videos/new',                                   [AdminGalleryController::class, 'newVideoPage'])->name('videos.new');
        Route::get('/all-videos',                                   [AdminGalleryController::class, 'allVideosPage'])->name('videos.all');
        Route::get('/edit-videos/{id}',                             [AdminGalleryController::class, 'editVideoPage'])->name('video.edit');


        Route::get('/albums/new',                                   [AdminGalleryController::class, 'newAlbumPage'])->name('albums.new');
        Route::get('/all-albums',                                   [AdminGalleryController::class, 'allAlbumsPage'])->name('albums.all');
        Route::get('/edit-albums/{id}',                             [AdminGalleryController::class, 'editAlbumPage'])->name('album.edit');
        Route::get('/album-pictures/{album_id}',                    [AdminGalleryController::class, 'albumPicturesPage'])->name('album.pictures');


        Route::get('/all-sub-albums/{album_id}',                    [AdminGalleryController::class, 'allSubAlbumsPage'])->name('sub-albums.all');
        Route::get('/edit-sub-albums/{id}',                         [AdminGalleryController::class, 'editSubAlbumPage'])->name('sub-album.edit');
        Route::get('/sub-album-pictures/{sub_album_id}',            [AdminGalleryController::class, 'subAlbumPicturesPage'])->name('sub-album.pictures');


        Route::get('/all-sub-sub-albums/{sub_album_id}',            [AdminGalleryController::class, 'allSubSubAlbumsPage'])->name('sub-sub-albums.all');
        Route::get('/edit-sub-sub-albums/{id}',                     [AdminGalleryController::class, 'editSubSubAlbumPage'])->name('sub-sub-album.edit');
        Route::get('/sub-sub-album-pictures/{sub_sub_album_id}',    [AdminGalleryController::class, 'subSubAlbumPicturesPage'])->name('sub-sub-album.pictures');


    });

    Route::get('/logout',                                           [AdminAuthController::class, 'logout'])->name('logout');
});
