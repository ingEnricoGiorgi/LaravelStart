<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/feed', function () {
    return view('feed');
});

Route::get('/',  [DashboardController::class, 'index'])->name('dashboard');

#Route::post('/idea',  [IdeaController::class, 'store'])->name('idea.create');

Route::post('/ideas',  [IdeaController::class, 'store'])->name('ideas.store');

Route::get('/ideas/{idea}',  [IdeaController::class, 'show'])->name('ideas.show');

Route::delete('/ideas/{idea}',  [IdeaController::class, 'destroy'])->name('ideas.destroy')->middleware('auth');

Route::get('/ideas/{idea}/edit',  [IdeaController::class, 'edit'])->name('ideas.edit')->middleware('auth');

Route::put('/ideas/{idea}',  [IdeaController::class, 'update'])->name('ideas.update')->middleware('auth');

Route::post('/ideas/{idea}/comments',  [CommentController::class, 'store'])->name('ideas.comments.store')->middleware('auth');

Route::get('/register',  [AuthController::class, 'register'])->name('register');

Route::post('/register',  [AuthController::class, 'store']);

Route::get('/login',  [AuthController::class, 'login'])->name('login');

Route::post('/login',  [AuthController::class, 'authenticate']);

Route::post('/logout',  [AuthController::class, 'logout'])->name('logout');


Route::get('/terms', function () {
    return view('terms');
});

Route::get('/profile', [DashboardController::class, 'index']);

Route::get('/inps', function () {
    return view('inps.inps');
});
