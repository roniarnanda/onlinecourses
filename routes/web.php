<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstrukturController;
use App\Http\Controllers\DashboardMentorController;

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
    return view('login.index');
})->middleware('guest');

// login
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/dashboard', DashboardController::class)->middleware('auth');
Route::resource('/mentor', DashboardMentorController::class)->middleware('auth');

Route::get('/mentor/checkSlug', [DashboardMentorController::class], 'checkSlug')->middleware('auth');
// Route::get('/mentor/creatematerial', [DashboardMentorController::class], 'creatematerial')->middleware('auth');

Route::get('/materi', [MateriController::class, 'index'])->middleware('auth');
Route::get('/materi/{materi}', [MateriController::class, 'tambahmateri'])->middleware('auth');
Route::post('/materi/create', [MateriController::class, 'store'])->middleware('auth');

// Dashboard admin
Route::get('/admin/murid', [AdminController::class, 'murid'])->middleware('auth');
Route::get('/admin/instruktur', [AdminController::class, 'instruktur'])->middleware('auth');
Route::get('/admin/transaksi', [AdminController::class, 'transaksi'])->middleware('auth');
Route::get('/admin/transaksi/{id}', [AdminController::class, 'konfirmasi'])->middleware('auth');
Route::get('/admin/transaksi/tolak/{id}', [AdminController::class, 'tolak'])->middleware('auth');

// Dashboard Murid 
Route::get('/murid/kursus/beli/{slug}', [MuridController::class, 'beli'])->middleware('auth');
Route::post('/murid/kursus/beli', [MuridController::class, 'store'])->middleware('auth');
Route::get('/murid', [MuridController::class, 'index'])->middleware('auth');
Route::get('/murid/{slug}', [MuridController::class, 'show'])->middleware('auth');
Route::get('/murid/{slug}/{id}', [MuridController::class, 'materi'])->middleware('auth');

// Dashboard Instruktur
Route::get('/instruktur', [InstrukturController::class, 'index'])->middleware('auth');
Route::get('/instruktur/{slug}', [InstrukturController::class, 'show'])->middleware('auth');
Route::get('/instruktur/tambah/{slug}', [InstrukturController::class, 'tambahmateri'])->middleware('auth');
Route::post('/instruktur/tambah', [InstrukturController::class, 'store'])->middleware('auth');
Route::get('/instruktur/{slug}/{id}', [InstrukturController::class, 'materi'])->middleware('auth');