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
Route::resource('dashboard','ProdukController')->middleware('admin');
Route::get('/management/voucher/{voucher}/editowner','VoucherController@editowner')->middleware('owner')->name('voucher.editowner');
Route::patch('/management/voucher/{voucher}/updateowner','VoucherController@updateowner')->middleware('owner')->name('voucher.updateowner');
Route::resource('/management/voucher','VoucherController')->middleware('owner');
Route::resource('/laporan/historyvoucher','LaporanVoucherController')->middleware('owner');
Route::resource('/calendar','CalendarController')->middleware('admin');
Route::get('/terapis/{terapis}/editWorkshift','TerapisController@editWorkshift')->middleware('owner')->name('terapis.editworkshift');
Route::patch('/terapis/{terapis}/updateWorkshift','TerapisController@updateworkshift')->middleware('owner')->name('terapis.updateworkshift');
Route::patch('/terapis/{terapis}/updateWorkshift/enableworkshift','TerapisController@enableworkshift')->middleware('owner')->name('terapis.enableworkshift');
Route::patch('/terapis/{terapis}/updateWorkshift/disableworkshift','TerapisController@disableworkshift')->middleware('owner')->name('terapis.disableworkshift');
Route::resource('/terapis','TerapisController')->middleware('owner');
Route::resource('/pembayaran/cekvoucher','CekVoucherController')->middleware('admin');
Route::resource('/pembayaran','PembayaranController')->middleware('admin');
Route::get('/reservasi/konfirmasi/{konfirmasi}/edit2','ReservasiMasukController@edit2')->middleware('admin')->name('konfirmasi.edit2');
Route::resource('/reservasi/konfirmasi','ReservasiMasukController')->middleware('admin');
Route::resource('/reservasi/checkin','ReservasiDiterimaController')->middleware('admin');
Route::resource('/management/admin','AdminController')->middleware('owner');
Route::resource('/laporan/pelanggan','LaporanPelangganController')->middleware('owner');
Route::resource('/laporan/transaksi','LaporanTransaksiController')->middleware('owner');
Route::resource('/laporan/reservasi','LaporanReservasiController')->middleware('owner');
Route::resource('/print','PrintPDFController')->middleware('admin');

Route::get('/printpdf', 'PagesController@getinvoice');
Route::resource('/gantipassword','ChangePasswordController')->middleware('admin');
Route::get('notallowed',function(){
	return view('notallowed');
});
