<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\KarirController;
use App\Http\Controllers\StrukturController;

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

//frontend
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/post/{slug}', [FrontendController::class, 'postDetail'])->name('postDetail');
Route::get('/karir/{slug}', [FrontendController::class, 'karirDetail'])->name('karirDetail');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::put('/profile/update', [DashboardController::class, 'update'])->name('profile.update');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::resource('berita', BeritaController::class);
    Route::resource('struktur', StrukturController::class);
    Route::resource('karir', KarirController::class);
});
