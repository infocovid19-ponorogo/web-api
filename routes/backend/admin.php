<?php

use App\Http\Controllers\Backend\BimbinganController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\KecamatanController;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'kecamatan'], function() {
  Route::get('/', [KecamatanController::class, 'index'])->name('kecamatan.index');
  Route::get('/create', [KecamatanController::class, 'create'])->name('kecamatan.create');
  Route::post('/', [KecamatanController::class, 'store'])->name('kecamatan.store');

  Route::group(['prefix' => '/{kecamatan}'], function(){
    Route::get('/', [KecamatanController::class, 'show'])->name('kecamatan.show');
    Route::get('/edit', [KecamatanController::class, 'edit'])->name('kecamatan.edit');
    Route::post('/', [KecamatanController::class, 'update'])->name('kecamatan.update');
    Route::delete('/', [KecamatanController::class, 'destroy'])->name('kecamatan.destroy');
  });
});
