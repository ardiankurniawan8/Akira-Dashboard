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
Route::get('/management/voucher/{voucher}/editowner','VoucherController@editowner')->name('voucher.editowner');
Route::patch('/management/voucher/{voucher}/updateowner','VoucherController@updateowner')->name('voucher.updateowner');
Route::resource('/management/voucher','VoucherController')->middleware('auth');
Route::resource('/laporan/historyvoucher','LaporanVoucherController')->middleware('auth');
Route::resource('/calendar','CalendarController')->middleware('auth');
Route::resource('/terapis','TerapisController')->middleware('auth');
Route::resource('/pembayaran','PembayaranController')->middleware('auth');
Route::get('/therapist/history','PagesController@getTherapistHistory')->middleware('auth');
Route::get('/therapist/komisi','PagesController@getTherapistKomisi')->middleware('auth');
Route::get('/therapist/rating','PagesController@getTherapistRating')->middleware('auth');
Route::get('/management/admin','PagesController@getManagementAdmin')->middleware('auth');
Route::get('/laporan/pelanggan','PagesController@getLaporanPelanggan')->middleware('auth');
Route::resource('/laporan/transaksi','LaporanTransaksiController')->middleware('auth');
