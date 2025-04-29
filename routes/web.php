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


use App\Http\Controllers\WorkprogramController;

// Public page: Everyone (without login) can view Work Programs
Route::get('/public-work-programs', [WorkprogramController::class, 'showPublic'])->name('workprogram.public');

// Logged-in users can view the list of Work Programs (for admin only)
Route::middleware(['auth.custom'])->group(function () {
    Route::get('workprogram', [WorkprogramController::class, 'index'])->name('workprogram.index');
    Route::get('workprogram/history', [WorkprogramController::class, 'history'])->name('workprogram.history');
});

// Only admins can create, edit, and delete
Route::middleware(['auth.custom'])->group(function () {
    Route::get('workprogram/create', [WorkprogramController::class, 'create'])->name('workprogram.create');
    Route::post('workprogram', [WorkprogramController::class, 'store'])->name('workprogram.store');
    Route::get('workprogram/{workprogram}/edit', [WorkprogramController::class, 'edit'])->name('workprogram.edit');
    Route::put('workprogram/{workprogram}', [WorkprogramController::class, 'update'])->name('workprogram.update');
    Route::delete('workprogram/{workprogram}', [WorkprogramController::class, 'destroy'])->name('workprogram.destroy');
});



