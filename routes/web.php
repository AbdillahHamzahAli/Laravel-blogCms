<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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

Route::get('/localization/{language}', [LocalizationController::class, 'switch'])->name('localization.switch');

Route::get('/', [BlogController::class, 'home'])->name('blog.home');
Route::get('/post/{slug}', [BlogController::class, 'showPostDetail'])->name('blog.post.detail');
Route::get('/categories', [BlogController::class, 'showCategories'])->name('blog.categories');
Route::get('/categories/{slug}', [BlogController::class, 'showPostsByCategory'])->name('blog.posts.category');
Route::get('/tags', [BlogController::class, 'showTags'])->name('blog.tags');
Route::get('/tags/{slug}', [BlogController::class, 'showPostsByTag'])->name('blog.posts.tag');
Route::get('/search', [BlogController::class, 'searchPosts'])->name('blog.search');

Auth::routes([
    'register' => false
]);


Route::group(['prefix' => 'dashboard', 'middleware' => ['web', 'auth']], function () {
    //dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    //posts
    Route::resource('/posts', PostController::class);
    //categories
    Route::get('/categories/select', [CategoryController::class, 'select'])->name('categories.select');
    Route::resource('/categories', CategoryController::class);
    //tags
    Route::get('/tags/select', [TagController::class, 'select'])->name('tags.select');
    Route::resource('/tags', TagController::class)->except(['show']);
    //roles
    Route::get('/roles/select', [RoleController::class, 'select'])->name('roles.select');
    Route::resource('/roles', RoleController::class);
    //user
    Route::resource('/users', UserController::class)->except(['show']);

    // file manager
    Route::group(['prefix' => 'laravel-filemanager'], function () {
        Route::get('/index', [FileManagerController::class, 'index'])->name('filemanager.index');
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});
