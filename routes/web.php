<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankSoalController;
use App\Http\Controllers\KategoriSoalController;
use App\Http\Controllers\PaketTryoutController;
use App\Http\Controllers\PaketTryoutKategoriController;
use App\Http\Controllers\TryOutController;
use App\Http\Middleware\EnsureLogin; // Role / Status for Admin & User
use App\Http\Middleware\EnsureUserRole; // Role / Status for Admin
use App\Models\TryOut;
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

    // Paket Tryout
    Route::get('/tryout', [PaketTryoutController::class, 'showPaketTryout']);
    Route::get('/tryout/detail-paket-tryout/{id}', [PaketTryoutController::class, 'showDetailPaketTryout']);

    // Tryout

    // Route::get('/tryout/paket-tryout/mulai/{id}', [TryOutController::class, 'mulaiTryOut']);
    Route::get('/tryout/paket-tryout/{id}/mulai', [PaketTryoutController::class, 'mulaiTryout']);
    // Route::post('/tryout/simpan-jawaban', [TryoutController::class, 'simpanJawaban']);
    // isi paket tryout
    Route::get('/tryout/isi-paket-tryout/{id}', [PaketTryoutController::class, 'showIsiPaketTryout']);

    Route::post('/tryout/simpan-hasil', [TryoutController::class, 'simpanHasil']);


});


Route::middleware(EnsureUserRole::class)->group(function () {
    // Bank Soal
    Route::get('/create-soal', [BankSoalController::class, 'showFormCreateSoal']);
    Route::post('/create-soal', [BankSoalController::class, 'createBankSoal']);

    // Kategori Soal
    Route::get('/category-soal', [KategoriSoalController::class, 'showFormCategorySoal']);
    Route::post('/category-soal', [KategoriSoalController::class, 'createCategorySoal']);



    // Tambah Paket Tryout
    Route::get('/tryout/tambah-paket-tryout', [PaketTryoutController::class, 'showTambahPaketTryout']);
    Route::post('/tryout/tambah-paket-tryout', [PaketTryoutController::class, 'storePaketTryout']);

    // Tambah Paket Tryout Kategori
    Route::get('/tryout/tambah-paket-tryout-kategori', [PaketTryoutKategoriController::class, 'showTambahPaketTryoutKategori']);
    Route::post('/tryout/tambah-paket-tryout-kategori', [PaketTryoutKategoriController::class, 'storePaketTryoutKategori']);


});