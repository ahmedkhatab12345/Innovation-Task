<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\MovieController;


Route::get('/', function () {
    return view('dashboard.signin');
})->middleware('guest');
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    // Users Route
    Route::resource('users', UserController::class);
    

    // Categories Route
    Route::resource('categories', CategoryController::class);

    // Movies Route
    Route::resource('movies', MovieController::class);

});