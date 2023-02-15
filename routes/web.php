<?php

use App\Http\Controllers\Guest\PageController as PageController;
use App\Http\Controllers\ComicController as ComicController;
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

Route::get('/', [PageController::class, 'home'])->name('home');


Route::get('/admin', [ComicController::class, 'index'])->name('admin.index');
Route::get('/admin/create', [ComicController::class, 'create'])->name('admin.create');
Route::get('/admin/{comic}', [ComicController::class, 'show'])->name('admin.show');
Route::post('/admin', [ComicController::class, 'store'])->name('admin.store');
Route::get('/admin/{id}/edit', [ComicController::class, 'edit'])->name('admin.edit');
Route::put('/admin/{id}', [ComicController::class, 'update'])->name('admin.update');
Route::delete('/admin/{id}', [ComicController::class, 'delete'])->name('admin.delete');