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
});

Route::prefix('ajax')->namespace('Ajax')->name('ajax.')->group(function() {
    Route::get('pegawai', 'PegawaiController@index')->name('pegawai.index');
    Route::get('pegawai/{pegawai}', 'PegawaiController@show')->name('pegawai.show');
    Route::get('pegawai/{pegawai}/hitung', 'PegawaiController@hitung')->name('pegawai.hitung');
});

