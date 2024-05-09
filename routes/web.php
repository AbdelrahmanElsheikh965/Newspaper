<?php

use App\Jobs\PruneOldPostsJob;
use App\Models\Post;
use App\Models\User;
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

use Laravel\Socialite\Facades\Socialite;
 
Route::get('/auth/redirect', function () {
    // return "hi";
    return Socialite::driver('github')->redirect();
})->name('auth.github');
 
Route::get('/auth/callback', function () {

    $githubUser = Socialite::driver('github')->user();
    
    // dd($githubUser->email, $githubUser->token, $githubUser->refreshToken );

    // $user->token

    $user = User::updateOrCreate([
        'github_id' => $githubUser->id,
    ], [
        'name' => $githubUser->name,
        'email' => 'githubUser@email.com',//$githubUser->email,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' ,//$githubUser->token,       // store token as a password temporarily
        'github_token' => $githubUser->token,
        'github_refresh_token' => $githubUser->refreshToken,
    ]);
 
    Auth::login($user);
 
    return redirect('/posts');

});