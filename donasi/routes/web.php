<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    Route::post('/profile/update', [AuthController::class, 'updateProfile'])
    ->name('profile.update');

    Route::post('/profile/photo', [AuthController::class, 'updatePhoto'])
    ->name('profile.photo');
    
    Route::get('/profile', [AuthController::class, 'profile']);

    Route::post('/profile/update', [AuthController::class, 'updateProfile'])
    ->name('profile.update');

    Route::post('/logout', [AuthController::class, 'logout']);
});