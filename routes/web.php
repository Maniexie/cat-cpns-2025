<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\EnsureLogin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return 'test-bridges';
});

Route::get('/403', function () {
    return view('errors.403');
});

// **** AUTH **** //
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showlogin']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::post('/logout', [AuthController::class, 'logout']);

// **** DASHBOARD PAGE **** //

Route::middleware(EnsureLogin::class)->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    Route::get('/tryout', function () {
        return view('tryout.index');
    });
});
