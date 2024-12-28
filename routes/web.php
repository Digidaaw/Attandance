<?php

use App\Http\Controllers\IzinController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\PresensiController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

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

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard.admin');
    Route::get('/presensi', [PresensiController::class, 'index'])->name('admin.presensi.index');
    Route::delete('/presensi/{id}', [PresensiController::class, 'destroy'])->name('presensi.destroy');
    Route::get('/izin', [IzinController::class, 'index'])->name('admin.izin.index');
    Route::get('/lembur', [LemburController::class, 'index'])->name('admin.lembur.index');
});

Route::middleware(['auth', 'role:karyawan'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index', );
    })->name('dashboard.karyawan');
    
    Route::get('/absen', [PresensiController::class, 'create'])->name('presensi.create');
    Route::post('/submit', [PresensiController::class, 'store'])->name('presensi.store');
    Route::get('/submit/{id}/edit',  [PresensiController::class, 'edit'])->name('presensi.edit');
    Route::put('/presensi/{id}', [PresensiController::class, 'update'])->name('presensi.update');

    Route::get('/izin', [IzinController::class, 'create'])->name('karyawan.izin.create');
    Route::post('/submitizin', [IzinController::class, 'store'])->name('karyawan.izin.store');
    
    Route::get('/lembur', [LemburController::class, 'create'])->name('karyawan.lembur.create');
    Route::post('/submitlembur', [LemburController::class, 'store'])->name('karyawan.lembur.store');

});
