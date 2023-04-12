<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\SortItemController::class, 'index'])->name('Item.index');
Route::post('/home',[App\Http\Controllers\RequestController::class, 'del'])->name('Item.del');

Route::get('/new', [App\Http\Controllers\NewItemController::class,'index']);
Route::post('/new', [App\Http\Controllers\NewItemController::class,'create'])->name('new.create');

Route::get('/search', [App\Http\Controllers\RequestController::class, 'search'])->name('Item.search');

Route::get('/edit', [App\Http\Controllers\RequestController::class, 'edit'])->name('Item.edit');
Route::post('/edit', [App\Http\Controllers\UpdateController::class, 'upDate'])->name('Item.upDate');

