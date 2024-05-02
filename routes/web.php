<?php

use App\Jobs\PruneOldPostsJob;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
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

Route::get('redis', function () {
    PruneOldPostsJob::dispatch();//->delay(2);
    // php artisan quque:work
});

Route::middleware('auth:web')->get('profile', 'UserController@viewProfile');
Route::middleware('auth:web')->resource('posts', 'PostController');
Route::get('/restore', [App\Helpers\Helper::class, 'restore']);
Route::post('/posts/{post}/comments', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');

Route::get('/', function() {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
