<?php

use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

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

// Simple CRUD
Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswas.index');
Route::get('/insert', [MahasiswaController::class, 'create'])->name('mahasiswas.create');
Route::post('/', [MahasiswaController::class, 'store'])->name('mahasiswas.store');
Route::get('/{mahasiswa}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswas.edit');
Route::delete('/{mahasiswa}', [MahasiswaController::class, 'destroy'])->name('mahasiswas.destroy');

// File Upload
Route::get('/file-upload', [FileUploadController::class, 'fileUpload']);
Route::post('/file-upload', [FileUploadController::class, 'prosesFileUpload']);