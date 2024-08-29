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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', \App\Http\Controllers\UserController::class)
    ->middleware('auth');

Route::resource(
    'bidstudi',
    \App\Http\Controllers\BidangStudiController::class
)->middleware('auth');

Route::resource(
    'standkomp',
    \App\Http\Controllers\StandarKompetensiController::class
)->middleware('auth');

Route::resource('guru', \App\Http\Controllers\GuruController::class)->middleware('auth');

Route::resource('kompetensikeahlian', \App\Http\Controllers\KompetensiKeahlianController::class)
    ->middleware('auth');

    Route::resource('siswa', \App\Http\Controllers\SiswaController::class)
    ->middleware('auth');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
