<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/master2', function () {
    return view('layout.master2');
});

Route::get('/table', function () {
    return view('table');
});


Route::resource('karyawan', 'KaryawanController');
Route::resource('jabatan', 'JabatanController');
Route::resource('pendidikan', 'PendidikanController');
Route::resource('status', 'StatusController');
