<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/','index')->name('login');
        Route::post('/','login');
        Route::get('/register','register');
        Route::post('/register','storeRegister');
    });
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::controller(UserController::class)->group(function () {
        Route::get('/dashboard', 'index');
        Route::get('/dashboard/form-pengaduan', 'pengaduan');
        Route::post('/dashboard/form-pengaduan', 'storePengaduan');
        Route::get('/dashboard/{id}/edit', 'editPengaduan');
        Route::put('/dashboard/{id}', 'updatePengaduan');
        Route::delete('/dashboard/{id}', 'destroyPengaduan');
        Route::get('/dashboard/profil', 'profil');
        Route::post('/dashboard/profil', 'updateProfil');
    });

    Route::prefix('/admin')->controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'index');
        Route::get('/dashboard/{id}/edit', 'editPengaduan');
        Route::put('/dashboard/{id}', 'updatePengaduan');
        Route::delete('/dashboard/{id}', 'destroyPengaduan');
        Route::get('/dashboard/daftar-user', 'listUser');
        Route::get('/dashboard/daftar-user/{id}/edit', 'editUser');
        Route::put('/dashboard/daftar-user/{id}', 'updateUser');
        Route::delete('/dashboard/daftar-user/{id}', 'destroyUser');
    });
});