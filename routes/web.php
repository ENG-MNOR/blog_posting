<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\PostController;
use App\Models\Post;
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

Route::middleware('auth')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('dashboard');

    Route::get('/home', [dashboardController::class, 'index'])->name('home');
    Route::post('/logout', [authController::class, 'logout'])->name('logout');
    Route::get('/email/verify', [AuthController::class, 'emailVerify'])->name('emailVerify');

    Route::resource('posts', PostController::class)->only([
        'create',
        'destroy',
        'edit',
        'update'
    ]);

    Route::get('/{user}/posts', [dashboardController::class, 'userPost'])->name('user.posts');
});


Route::middleware('guest')->group(function () {


    // Route::patch('/posts/{post}',[PostController::class,'update'])->name('posts.update');
    Route::get('/welcome', [PostController::class, 'welcome'])->name('view');

    Route::post('/register', [authController::class, 'register']);
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [authController::class, 'login']);
    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');
});
