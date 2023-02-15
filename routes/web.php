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
Route::get('/admin/comics/create', [ComicController::class, 'create'])->name('admin.comics.create');
Route::get('/admin/comics/{comic}', [ComicController::class, 'show'])->name('admin.comics.show');
Route::post('/admin/comics/', [ComicController::class, 'store'])->name('admin.comics.store');
Route::get('/admin/comics/{id}/edit', [ComicController::class, 'edit'])->name('admin.comics.edit');
Route::put('/admin/comics/{id}', [ComicController::class, 'update'])->name('admin.comics.update');
Route::delete('/admin/comics/{comic}', [ComicController::class, 'destroy'])->name('admin.comics.delete');