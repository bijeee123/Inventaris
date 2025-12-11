<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\ProfileController;

// Default route -> redirect ke login
Route::get('/', function () {
    return redirect()->route('halaman');
});
Route::get('/halaman', [HalamanController::class, 'index'])->name('halaman');


// Hanya untuk guest (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

});

// Logout (khusus user login)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Dashboard + Sidebar (khusus user login)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/barang-masuk', [BarangMasukController::class, 'index'])->name('barang.masuk');
    Route::get('/barang-keluar', [BarangKeluarController::class, 'index'])->name('barang.keluar');
    Route::get('/pemasukan', [PemasukanController::class, 'index'])->name('pemasukan');
    Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran');
    Route::get('/stok-barang', [StokController::class, 'index'])->name('stok');
});

// barang masuk
Route::resource('barang-masuk', BarangMasukController::class);

// barang keluar
Route::resource('barang-keluar', BarangKeluarController::class); 

// Pemasukan
Route::get('pemasukan', [PemasukanController::class, 'index'])->name('pemasukan.index');
// Pengeluaran
Route::get('pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran.index');

// STOK BARANG
Route::prefix('stok-barang')->middleware('auth')->name('stok.')->group(function () {
    Route::get('/', [StokController::class, 'index'])->name('index');
    Route::delete('/delete/{id}', [StokController::class, 'destroy'])->name('destroy');
    Route::get('/trash', [StokController::class, 'trash'])->name('trash');
    Route::post('/restore/{id}', [StokController::class, 'restore'])->name('restore');
    Route::delete('/force-delete/{id}', [StokController::class, 'forceDelete'])->name('forceDelete');
    Route::get('/export/pdf', [StokController::class, 'exportPdf'])->name('export.pdf');
    Route::get('/export/excel', [StokController::class, 'exportExcel'])->name('export.excel');
});



// Profile
Route::resource('profil', ProfileController::class);
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

    