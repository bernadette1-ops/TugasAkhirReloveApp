<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonasiController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ServiceCenterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
    $donasi = DB::table('donasi')->orderBy('kd_barang', 'desc')->get();
    return view('dashboard', compact('donasi'));
    });

    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');

    Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/photo', [AuthController::class, 'updatePhoto'])->name('profile.photo');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/donasi', [DonasiController::class, 'index']);
    Route::post('/donasi/store', [DonasiController::class, 'store']);
    Route::get('/donasi/delete/{id}', [DonasiController::class, 'delete']);
    Route::get('/donasi/edit/{id}', [DonasiController::class, 'edit']);
    Route::post('/donasi/update/{id}', [DonasiController::class, 'update']);

    Route::get('/service-center', [ServiceCenterController::class, 'index']);
    Route::post('/service-center', [ServiceCenterController::class, 'store']);
    Route::get('/service-center/selesai/{id}', [ServiceCenterController::class, 'selesai']);
});