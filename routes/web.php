<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use \App\Http\Controllers\RoleController;
use \App\Http\Controllers\UserController;
use App\Http\Controllers\TestController;
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

// Route::get('/dash', [BookController::class, 'index'])
//     ->middleware(['auth'])
//     ->name('book');
require __DIR__.'/auth.php';

Route::get('/profile', [ProfileController::class, 'show_profile'])
    ->middleware(['auth'])
    ->name('show-profile');

Route::post('/profile', [ProfileController::class, 'update_profile'])
    ->middleware(['auth'])
    ->name('update-profile');

Route::resource('roles', RoleController::class)->middleware(['auth']);
Route::resource('users', UserController::class)->middleware(['auth']);
Route::resource('book', BookController::class)->middleware(['auth']);
