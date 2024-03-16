<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LoginController;
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


Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');


Route::get('/', function () {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('users', UserController::class)->except(['show'])->middleware('auth');
Route::resource('clients', ClientController::class)->middleware('auth');
Route::resource('clients.address', AddressController::class)->shallow()->except(['index', 'show'])->middleware('auth');
