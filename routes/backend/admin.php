<?php

use App\Http\Controllers\Backend\BimbinganController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\KecamatanController;
use App\Http\Controllers\Backend\ProvinsiController;
use App\Http\Controllers\Backend\NewsController;

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

Route::group(['prefix' => 'provinsi'], function() {
  Route::get('/', [ProvinsiController::class, 'index'])->name('provinsi.index');
  Route::get('/create', [ProvinsiController::class, 'create'])->name('provinsi.create');
  Route::post('/', [ProvinsiController::class, 'store'])->name('provinsi.store');

  Route::group(['prefix' => '/{kecamatan}'], function(){
    Route::get('/', [ProvinsiController::class, 'show'])->name('provinsi.show');
    Route::get('/edit', [ProvinsiController::class, 'edit'])->name('provinsi.edit');
    Route::post('/', [ProvinsiController::class, 'update'])->name('provinsi.update');
    Route::delete('/', [ProvinsiController::class, 'destroy'])->name('provinsi.destroy');
  });
});


Route::group(['prefix' => 'news'], function() {
  Route::get('/', [NewsController::class, 'index'])->name('news.index');
  Route::get('/create', [NewsController::class, 'create'])->name('news.create');
  Route::post('/', [NewsController::class, 'store'])->name('news.store');

  Route::group(['prefix' => '/{news}'], function(){
    Route::get('/', [NewsController::class, 'show'])->name('news.show');
    Route::get('/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::post('/', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/', [NewsController::class, 'destroy'])->name('news.destroy');
  });
});
