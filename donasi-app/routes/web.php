<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\ServiceCenterController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login',    [AuthController::class, 'showLogin'])->name('login');
Route::post('/login',   [LoginController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register',[AuthController::class, 'register']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    if (!session('user')) return redirect('/login');

    $donasi = DB::table('donasi')
                ->orderBy('kd_barang', 'desc')
                ->get();

    return view('dashboard', compact('donasi'));
});

Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
Route::get('/profile/edit', function () {
    if (!session('user')) return redirect('/login');
    return view('editprofile');
})->name('profile.edit');
Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
Route::post('/profile/photo',  [AuthController::class, 'updatePhoto'])->name('profile.photo');

Route::get('/donasi',                           [DonasiController::class, 'index']);
Route::get('/donasi_create',                    [DonasiController::class, 'create']);
Route::post('/donasi/store',                    [DonasiController::class, 'store']);
Route::get('/donasi/tracking/{id}',             [DonasiController::class, 'tracking'])->name('donasi.tracking');
Route::post('/donasi/tracking/update/{id}',     [DonasiController::class, 'updateTracking']);
Route::get('/donasi/delete/{id}',               [DonasiController::class, 'delete']);
Route::get('/donasi/edit/{id}',                 [DonasiController::class, 'edit']);
Route::post('/donasi/update/{id}',              [DonasiController::class, 'update']);
Route::get('/donasi/{id}',                      [DonasiController::class, 'show'])->name('donasi.show');

Route::get('/service-center',              [ServiceCenterController::class, 'index'])->name('service.center');
Route::post('/service-center',             [ServiceCenterController::class, 'store']);
Route::get('/service-center/selesai/{id}',[ServiceCenterController::class, 'selesai']);