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

Route::get('/', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('pegawai')->name('pegawai.')->group(function () {
    Route::get('', 'PegawaiController@index')->name('index');
    Route::get('create', 'PegawaiController@create')->name('create');
    Route::post('create', 'PegawaiController@store')->name('store');
    Route::post('{pegawai}/update', 'PegawaiController@update')->name('update');
    Route::get('{pegawai}', 'PegawaiController@show')->name('show');
    Route::get('{pegawai}/hitung', 'PegawaiController@hitung')->name('hitung');
    Route::post('{pegawai}/delete', 'PegawaiController@destroy')->name('delete');
});

Route::prefix('asuransi')->name('asuransi.')->group(function () {
    Route::get('', 'AsuransiController@index')->name('index');
    Route::get('create', 'AsuransiController@create')->name('create');
    Route::post('create', 'AsuransiController@store')->name('store');
    Route::get('{asuransi}', 'AsuransiController@show')->name('show');
    Route::post('{asuransi}', 'AsuransiController@update')->name('update');
    Route::post('{asuransi}/delete', 'AsuransiController@destroy')->name('delete');
    Route::get('{asuransi}/keuntungan', 'KeuntunganAsuransiController@index')->name('keuntungan');
    Route::get('{asuransi}/keuntungan/create', 'KeuntunganAsuransiController@create')->name('keuntungan.create');
    Route::post('{asuransi}/keuntungan/create', 'KeuntunganAsuransiController@store')->name('keuntungan.store');
    Route::get('{asuransi}/keuntungan/{keuntungan}', 'KeuntunganAsuransiController@show')->name('keuntungan.show');
    Route::post('{asuransi}/keuntungan/{keuntungan}', 'KeuntunganAsuransiController@update')->name('keuntungan.update');
    Route::post('{asuransi}/keuntungan/{keuntungan}/delete', 'KeuntunganAsuransiController@destroy')->name('keuntungan.delete');
});

Route::prefix('ajax')->namespace('Ajax')->name('ajax.')->group(function() {
    Route::get('pegawai', 'PegawaiController@index')->name('pegawai.index');
    Route::get('asuransi', 'AsuransiController@index')->name('asuransi.index');
});

