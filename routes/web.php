<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
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

Route::get('/',  [DashboardController::class, 'index'])->name('dashboard');

/*Route::group(['prefix' => 'ideas/', 'as'=>'ideas.', 'middleware'=>['auth']], function () {


   // Route::post('',  [IdeaController::class, 'store'])->name('store')->withoutMiddleware(['auth']);

   // Route::get('{idea}',  [IdeaController::class, 'show'])->name('show')->withoutMiddleware(['auth']);

   // Route::delete('{idea}',  [IdeaController::class, 'destroy'])->name('destroy');

   // Route::get('{idea}/edit',  [IdeaController::class, 'edit'])->name('edit');

   // Route::put('{idea}',  [IdeaController::class, 'update'])->name('update');

    Route::post('{idea}/comments',  [CommentController::class, 'store'])->name('comments.store');

});*/
//fa tutte è 7 le route
Route::resource('ideas', IdeaController::class)->except(['index','create','show'])-> middleware('auth');

Route::resource('ideas', IdeaController::class)->only(['show']);

Route::resource('ideas.comments',  CommentController::class)->only(['store'])->middleware('auth');

//FINE 7 routes

Route::get('/feed', function () {
    return view('feed');
});

Route::get('/',  [DashboardController::class, 'index'])->name('dashboard');

Route::resource('users', UserController::class)->only(['show','edit','update'])->middleware('auth');

Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');

Route::post('users/{user}/follow',  [FollowerController::class, 'follow'])->middleware('auth')->name('user.follow');

Route::post('users/{user}/unfollow',  [FollowerController::class, 'unfollow'])->middleware('auth')->name('user.unfollow');


Route::get('/terms', function () {
    return view('terms');
})->name('terms')   ;

#Route::get('/profile', [DashboardController::class, 'index']);

Route::get('/inps', function () {
    return view('inps.inps');
})->name('inps')   ;
