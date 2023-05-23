<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\TagController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false
]);


Route::group(['prefix' => 'dashboard', 'middleware' => ['web', 'auth']], function () {
    //dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    //categories
    Route::get('/categories/select', [CategoryController::class, 'select'])->name('categories.select');
    Route::resource('/categories', CategoryController::class);
    //tags
    Route::resource('/tags', TagController::class);
    // file manager
    Route::group(['prefix' => 'laravel-filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});
