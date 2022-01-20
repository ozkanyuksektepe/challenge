<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\NewsController;

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

Route::get('/', function () {
    return redirect('login');
});

Route::middleware(['auth:sanctum'])->group(function () {
    /// CATEGORY
    Route::get('/categories/all', [CategoryController::class, 'AllCategories'])->name('all.categories');
    Route::post('/categories/add', [CategoryController::class, 'AddCategories'])->name('store.categories');
    Route::get('/category/edit/{id}', [CategoryController::class, 'EditCategories']);
    Route::post('/category/update/{id}', [CategoryController::class, 'UpdateCategories']);
    Route::get('category/delete/{id}', [CategoryController::class, 'Delete']);

/// WRİTERS
    Route::get('/writer/all', [WriterController::class, 'AllWriter'])->name('all.writer');
    Route::post('/writer/add', [WriterController::class, 'AddWriter'])->name('store.writer');
    Route::get('/writer/edit/{id}', [WriterController::class, 'EditWriter'])->name('edit.write');
    Route::post('/writer/update/{id}', [WriterController::class, 'UpdateWriter'])->name('update.write');
    Route::get('/writer/delete/{id}', [WriterController::class, 'Delete'])->name('delete.write');

/// NEWS
    Route::get('/news/all', [NewsController::class, 'allNews'])->name('all.news');
    Route::post('/news/add', [NewsController::class, 'addNews'])->name('store.news');
    Route::get('/news/edit/{id}', [NewsController::class, 'editNews'])->name('edit.news');
    Route::post('/news/update/{id}', [NewsController::class, 'updateNews'])->name('update.news');
    Route::get('/news/delete/{id}', [NewsController::class, 'delete'])->name('delete.news');

});

Route::get('/user/logout', [UserController::class, 'Logout'])->name('user.logout');









