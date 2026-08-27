<?php

use App\Http\Controllers\LatihanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//METHOD: GET, POST, PUT, DELETE
// GET: MEMBACA, MELIHAT
// POST: ACTION REQUEST DARI FORM

Route::get('greeting', [LatihanController::class, 'greeting']);
Route::get('penjumlahan', [LatihanController::class, 'penjumlahan'])->name('penjumlahan');
Route::post('action-penjumlahan', [LatihanController::class, 'actionPenjumlahan'])->name('action-penjumlahan');
Route::get('pengurangan', [LatihanController::class, 'pengurangan'])->name('pengurangan');
Route::post('action-pengurangan', [LatihanController::class, 'actionPengurangan'])->name('action-pengurangan');
Route::get('pembagian', [LatihanController::class, 'pembagian'])->name('pembagian');
Route::post('action-pembagian', [LatihanController::class, 'actionPembagian'])->name('action-pembagian');
Route::get('perkalian', [LatihanController::class, 'perkalian'])->name('perkalian');
Route::post('action-perkalian', [LatihanController::class, 'actionPerkalian'])->name('action-perkalian');

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('action-login', [LoginController::class, 'actionLogin'])->name('action-login');
Route::middleware('auth')->group(function(){
    // Resource bisa handle : get, post, put, delete
    Route::resource('user', UserController::class);
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});



