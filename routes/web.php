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

/*               ROUTE USER                */

//Homepage Forum
Route::get('/', 'forumCont@pendaftar');

//Inputan Data Pendaftar
Route::post('/prosesAnggota','forumCont@postPendaftar');

/*               ROUTE AUTH                    */

//Tampil View Login
Route::get('/login', 'authController@login')->name('login');

//Auth Login
Route::post('/postLogin', 'authController@authLogin');

//Logout
Route::get('/logout', 'authController@logout');

/*               ROUTE ADMIN                    */

//Tampil Beranda
Route::get('/berandaAdmin', function () {
    return view('admin.page.beranda');
})->middleware('auth');

//Tampil data
Route::get('/kegiatan', 'sistemCont@show')->middleware('auth');

//Inputan Data Kegiatan
Route::post('/prosesKegiatan','sistemCont@postKegiatan');

//Ubah Status Kegiatan
Route::get('/ubahStatus/{id}', 'sistemCont@ubahStatus');

//Hapus Data Kegiatan beserta Data Panitia
Route::get('/hapusData/{id}', 'sistemCont@hapusData');

//Ambil ID Kegiatan untuk Detail Kegiatan
Route::get('/detail/{id}', 'sistemCont@detailKegiatan');



