<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AdminMahasiswaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Home route
Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth.custom')->group(function () {
    Route::get('/', fn() => view('home'));
    Route::get('/admin', fn() => view('admin.dashboard'));
    Route::get('/admin/keuangan', fn() => view('admin.keuangan'));
});

Route::middleware(['auth.admin'])->group(function () {
    Route::get('/admin/role', [AdminRoleController::class, 'index'])->name('admin.role.index');
    Route::post('/admin/role', [AdminRoleController::class, 'storeRole'])->name('admin.role.index');
});

Route::middleware('auth.custom')->group(function () {
    Route::get('/admin/kas', [AdminMahasiswaController::class, 'index'])->name('admin.kas.index');
    Route::post('/admin/kas', [AdminMahasiswaController::class, 'store'])->name('admin.kas.store');
});


use App\Http\Controllers\ProkerController;

// Semua yang login boleh lihat daftar Program Kerja
Route::middleware(['auth.custom'])->group(function () {
    Route::get('proker', [ProkerController::class, 'index'])->name('proker.index');
    Route::get('proker/{id}', [ProkerController::class, 'show'])->name('proker.show');
});

// Hanya admin yang bisa create, edit, delete
Route::middleware(['auth.custom', 'isAdmin'])->group(function () {
    Route::get('proker/create', [ProkerController::class, 'create'])->name('proker.create');
    Route::post('proker', [ProkerController::class, 'store'])->name('proker.store');
    Route::get('proker/{id}/edit', [ProkerController::class, 'edit'])->name('proker.edit');
    Route::put('proker/{id}', [ProkerController::class, 'update'])->name('proker.update');
    Route::delete('proker/{id}', [ProkerController::class, 'destroy'])->name('proker.destroy');
});

