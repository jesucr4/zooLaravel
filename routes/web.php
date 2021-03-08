<?php

use App\Http\Controllers\AnimalsController as AnimalsControllerAlias;
use App\Http\Controllers\HabitatsController as HabitatsControllerAlias;
use App\Http\Controllers\KindsController as KindsControllerAlias;
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
require __DIR__.'/auth.php';
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard')->middleware(['auth','verified']);

Route::resource('animal', AnimalsControllerAlias::class);
Route::resource('habitat', HabitatsControllerAlias::class);
Route::resource('kind', KindsControllerAlias::class);
Route::resource('usuario', \App\Http\Controllers\UserController::class)->middleware(['auth','verified']);



