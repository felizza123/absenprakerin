<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AbsensiController;

    Route::get('/', function () {
        return redirect('/login');
    });

    Auth::routes([
        'register' => false,
        'reset' => false,
        'verify' => false
    ]);

    Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function() {

        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
        Route::get('/dashboard',[App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

        //ADMIN//data siswa
        Route::resource('/datasiswa', App\Http\Controllers\DatasiswaController::class);

        //data jurnal
        Route::resource('/datajurnal', App\Http\Controllers\DatajurnalController::class)->only(['index', 'show', 'destroy']);

        //data absen
        Route::resource('/dataabsen', App\Http\Controllers\DataabsenController::class)->only(['index', 'show', 'destroy']);

        

        //SISWA
        //absensi
        Route::get('/absen', [AbsensiController::class, 'index'])->name('form.index');
        Route::post('/absen', [AbsensiController::class, 'store'])->name('form.store');
            
        //riwayat absensi
        Route::resource('/riwayatabsensi', App\Http\Controllers\RiwayatabsensiController::class)->only(['index', 'show', 'edit', 'update']);
        
        //jurnal
        Route::resource('/jurnal', App\Http\Controllers\JurnalController::class);
        
});