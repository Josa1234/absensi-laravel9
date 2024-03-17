<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\InvalidController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\RekapAbsensiController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LayoutController::class, 'dashboard'])->name('dashboard')->middleware('isLogin');
Route::get('/scan', [LayoutController::class, 'scan'])->name('scan')->middleware('isLogin');

Route::prefix('siswa')
    ->name('siswa.')
    ->middleware('isLogin')
    ->controller(SiswaController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{uid}', 'show')->name('show');
        Route::get('/{uid}/edit', 'edit')->name('edit');
        Route::put('/{uid}', 'update')->name('update');
        Route::get('/{uid}/delete',  'deleteForm')->name('deleteForm');
        Route::delete('/{uid}', 'destroy')->name('destroy');
    });

Route::prefix('karyawan')
    ->name('karyawan.')
    ->middleware('isLogin')
    ->controller(KaryawanController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
    });

Route::prefix('invalid')
    ->name('invalid.')
    ->middleware('isLogin')
    ->controller(InvalidController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/delete',  'deleteForm')->name('deleteForm');
        Route::delete('/{id}', 'destroy')->name('destroy');
        Route::get('/delete', 'delete')->name('delete');
        Route::post('/deleteAll', 'deleteAll')->name('deleteAll');
    });

Route::prefix('absensi')
    ->name('absensi.')
    ->middleware('isLogin')
    ->controller(AbsenController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'createMateri')->name('createmateri');
        Route::post('/', 'storeMateri')->name('storemateri');
    });

Route::prefix('materi')
    ->name('materi.')
    ->middleware('isLogin')
    ->controller(MateriController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::get('/{id}/delete',  'deleteForm')->name('deleteForm');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

Route::prefix('jadwal')
    ->name('jadwal.')
    ->middleware('isLogin')
    ->controller(JadwalController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{jadwal}/siswa', 'showAddSiswaForm')->name('showAddSiswaForm');
        Route::post('/{jadwal}/siswa', 'addSiswaToJadwal')->name('addSiswa');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::get('/{id}/delete',  'deleteForm')->name('deleteForm');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

Route::prefix('rekap')
    ->name('rekap.')
    ->middleware('isLogin')
    ->controller(RekapAbsensiController::class)
    ->group(function () {
        Route::get('/hari', 'rekapHari')->name('hari');
        Route::get('/bulan', 'rekapBulan')->name('bulan');
        Route::get('/tahun', 'rekapTahun')->name('tahun');
    });

Route::get('/sesi', [SessionController::class, 'index'])->middleware('isGuest');
Route::post('/sesi/login', [SessionController::class, 'login'])->middleware('isGuest');
Route::get('/sesi/logout', [SessionController::class, 'logout']);
Route::get('/sesi/register', [SessionController::class, 'register'])->middleware('isGuest');
Route::post('/sesi/create', [SessionController::class, 'create'])->middleware('isGuest');
