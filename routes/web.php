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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('mahasiswa', 'MahasiswaController');

Route::get('/mahasiswa/list_matkul/{id}', 'MahasiswaController@list_matkul')->name('list.matkul');
Route::delete('/mahasiswa/list_matkul/{id}', 'MahasiswaController@delete_list')->name('delete.list');

Route::resource('matkul','MatkulController');

Route::resource('dosen','DosenController');
Route::resource('listmatkul', 'ListmatkulController');

Route::resource('nilai', 'NilaiController');
Route::get('/nilai/list_nilai/{id}', 'NilaiController@list_nilai')->name('list.nilai');

// Route::resource('ambilmatkul', 'Ambil_MatkulController');