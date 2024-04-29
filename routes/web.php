<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show'])->name('post-details');
Route::get('/new-post', [PostController::class, 'create'])->name('new-post');
Route::post('/add-new-post', [PostController::class, 'store'])->name('add-new-post');
Route::delete('/delete-post/{id}', [PostController::class, 'destroy'])->name('delete-post');
Route::get('/edit-post/{id}', [PostController::class, 'edit'])->name('edit-post');



Route::get('/', function() {
    return view('welcome');
});
