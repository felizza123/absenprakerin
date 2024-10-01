<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
]);

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function()  {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
    Route::get('/dashboard',[App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    //data siswa
    Route::resource('/datasiswa', App\Http\Controllers\DatasiswaController::class);

    //data jurnal
    Route::resource('/datajurnal', App\Http\Controllers\DatajurnalController::class)->only(['index', 'show', 'destroy']);

    //data absen
    Route::resource('/dataabsen', App\Http\Controllers\DataabsenController::class)->only(['index', 'show', 'destroy']);
});