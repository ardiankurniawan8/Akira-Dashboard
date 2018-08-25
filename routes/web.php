<?php

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
Auth::routes();


Route::get('/','ProdukController@index')->middleware('auth');
Route::resource('dashboard','ProdukController')->middleware('auth');
Route::get('/management/voucher/{voucher}/editowner','VoucherController@editowner')->middleware('auth')->name('voucher.editowner');
Route::patch('/management/voucher/{voucher}/updateowner','VoucherController@updateowner')->middleware('auth')->name('voucher.updateowner');
Route::resource('/management/voucher','VoucherController')->middleware('auth');
Route::resource('/laporan/historyvoucher','LaporanVoucherController')->middleware('auth');
Route::resource('/calendar','CalendarController')->middleware('auth');
Route::get('/terapis/{terapis}/editWorkshift','TerapisController@editWorkshift')->middleware('auth')->name('terapis.editworkshift');
Route::patch('/terapis/{terapis}/updateWorkshift','TerapisController@updateworkshift')->middleware('auth')->name('terapis.updateworkshift');
Route::patch('/terapis/{terapis}/updateWorkshift/enableworkshift','TerapisController@enableworkshift')->middleware('auth')->name('terapis.enableworkshift');
Route::patch('/terapis/{terapis}/updateWorkshift/disableworkshift','TerapisController@disableworkshift')->middleware('auth')->name('terapis.disableworkshift');
Route::resource('/terapis','TerapisController')->middleware('auth');
Route::resource('/pembayaran/cekvoucher','CekVoucherController')->middleware('auth');
Route::resource('/pembayaran','PembayaranController')->middleware('auth');
Route::get('/reservasi/konfirmasi/{konfirmasi}/edit2','ReservasiMasukController@edit2')->middleware('auth')->name('konfirmasi.edit2');
Route::resource('/reservasi/konfirmasi','ReservasiMasukController')->middleware('auth');
Route::resource('/reservasi/checkin','ReservasiDiterimaController')->middleware('auth');
Route::resource('/management/admin','AdminController')->middleware('auth');
Route::resource('/laporan/pelanggan','LaporanPelangganController')->middleware('auth');
Route::resource('/laporan/transaksi','LaporanTransaksiController')->middleware('auth');
Route::resource('/laporan/reservasi','LaporanReservasiController')->middleware('auth');
