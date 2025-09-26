<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return 'test-bridges';
});




// **** AUTH **** //
// REGISTER
Route::get('/register', [UserController::class, 'showRegister']);
Route::post('/register', [UserController::class, 'register']);
// REGISTER
Route::get('/login', [UserController::class, 'showlogin']);
Route::post('/login', [UserController::class, 'login']);





// **** DASHBOARD PAGE **** //

//Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
});

// Tryout
Route::get('/tryout', function () {
    return view('tryout.index');
});


