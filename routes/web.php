<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrationController;

// Public routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/event/{id}', [HomeController::class, 'detail']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'processLogin']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'storeRegister']);
Route::get('/logout', [AuthController::class, 'logout']);

// Mahasiswa routes (harus login)
Route::middleware(['auth.login'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::post('/event/{id}/daftar', [RegistrationController::class, 'store']);
});

// Admin routes (harus login + admin)
Route::middleware(['auth.login', 'auth.admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminIndex']);
    Route::get('/admin/peserta', [DashboardController::class, 'peserta']);
    Route::resource('events', EventController::class);
});