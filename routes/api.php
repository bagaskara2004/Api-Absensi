<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\PermintaanCutiController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('pegawai')->controller(UserController::class)->group(function () {
   Route::get('/','index'); 
   Route::get('/{user:nip}','show'); 
   Route::post('/','store'); 
   Route::put('/{user:nip}','update'); 
   Route::delete('/{user:nip}','destroy');
});
Route::prefix('absensi')->controller(AbsensiController::class)->group(function () {
   Route::get('/','index'); 
   Route::get('/{absensi:id}','show'); 
   Route::get('/pegawai/{nip}','getAbsensiPegawai'); 
   Route::post('/masuk','store');
   Route::put('/selesai/{absensi:id}','update');
   Route::delete('/{absensi:id}','destroy');
});
Route::prefix('izin')->controller(PermintaanCutiController::class)->group(function () {
   Route::get('/','index'); 
   Route::get('/{permintaan_cuti:id}','show'); 
   Route::get('/pegawai/{nip}','getCutiPegawai');
   Route::post('/','store');
   Route::delete('/{permintaan_cuti:id}','destroy');
   Route::put('/{permintaan_cuti:id}/setujui','disetujui');
   Route::put('/{permintaan_cuti:id}/tolak','ditolak');
});
