<?php

namespace App\Http\Controllers\Admin;
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

Route::prefix('/admin')->group(function() {
    
    Route::get('/login', [AuthController::class, 'login'])->name('admin.auth.login');

    Route::post('/login', [AuthController::class, 'checkLogin'])->name('admin.auth.check-login');

    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
});

Route::prefix('/admin')->middleware('auth.login')->group(function() {

    Route::resource('woodblocks', WoodblockController::class)->except('index');

    Route::get('/woodblocks', [WoodblockController::class, 'list'])->name('admin.woodblocks.index');

    // Route::get('/woodblocks/list', [WoodblockController::class, 'search'])->name('admin.woodblocks.search');

    Route::get('/user/change-password', function() {
        return view('admin.login.change-password');
    })->name('admin.user.change-password.index');

    Route::put('/user/change-password', [AuthController::class, 'changePassword'])->name('admin.user.change-password');

    // Route::get('books/list', function() {
    //     return view('admin.woodblock.delete-books');
    // });
    Route::get('books/list', [WoodblockController::class, 'listBooks'])->name('admin.books.list');

    Route::get('books/list/{id}', [BooksController::class, 'listWoodblocks'])->name('admin.books.list-woodblocks');

    Route::delete('books/list/{id}', [WoodblockController::class, 'deleteBooks'])->name('admin.books.delete');

    Route::get('/home/display', [WoodblockController::class, 'display'])->name('admin.home.display.index');

    // Route::get('woodblocks/displays', [WoodblockController::class, 'display']);

    Route::post('/home/display', [WoodblockController::class, 'selectWoodblockDisplay'])->name('admin.woodblocks.display.select');

    Route::resource('books', BooksController::class)->except('index', 'create', 'destroy');
});

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('woodblock.index');

Route::get('/woodblocks', [\App\Http\Controllers\WoodblockController::class, 'list'])->name('woodblock.search');

// Route::get('/woodblocks/list', [\App\Http\Controllers\WoodblockController::class, 'list'])->name('woodblock.search');

Route::get('/woodblocks/{code}', [\App\Http\Controllers\WoodblockController::class, 'detail'])->name('woodblock.detail');


