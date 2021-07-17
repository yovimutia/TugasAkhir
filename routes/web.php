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

Route::get('projectTA', function () {
    return view('tampilan/login');
});

Route::get('header', function () {
    return view('tampilan/header');
});

Route::get('footer', function () {
    return view('tampilan/footer');
});

Route::get('sidebar', function () {
    return view('tampilan/sidebar');
});

Route::get('dashboard', function () {
    return view('tampilan/dashboard');
});

Route::get('presensi_pdf', function () {
    return view('presensi/presensi_pdf');
});

Route::get('login','loginController@index');
Route::post('proses','loginController@proses');
Route::get('logout','loginController@logout');

Route::get('mapelcreate','mapelController@create');
Route::get('mapelindex','mapelController@index');
Route::post('mapelStore', 'mapelController@store');
Route::get('mapelEdit{id}', 'mapelController@edit');
Route::post('mapelUpdate', 'mapelController@update');
Route::get('mapelDestroy/{id}', 'mapelController@destroy');

Route::get('kelascreate','kelasController@create');
Route::get('kelasindex','kelasController@index');
Route::post('kelasStore', 'kelasController@store');
Route::get('kelasEdit{id}', 'kelasController@edit');
Route::post('kelasUpdate', 'kelasController@update');
Route::get('kelasDestroy/{id}', 'kelasController@destroy');

Route::get('skalacreate','skalaController@create');
Route::get('skalaindex','skalaController@index');
Route::post('skalaStore', 'skalaController@store');
Route::get('skalaEdit{id}', 'skalaController@edit');
Route::post('skalaUpdate', 'skalaController@update');
Route::get('skalaDestroy/{id}', 'skalaController@destroy');

Route::get('jabatancreate','jabatanController@create');
Route::get('jabatanindex','jabatanController@index');
Route::post('jabatanStore', 'jabatanController@store');
Route::get('jabatanEdit{id}', 'jabatanController@edit');
Route::post('jabatanUpdate', 'jabatanController@update');
Route::get('jabatanDestroy/{id}', 'jabatanController@destroy');

Route::get('pegawaicreate','pegawaiController@create');
Route::get('pegawaiindex','pegawaiController@index');
Route::post('pegawaiStore', 'pegawaiController@store');
Route::get('pegawaiEdit{id}', 'pegawaiController@edit');
Route::post('pegawaiUpdate', 'pegawaiController@update');
Route::get('pegawaiDestroy/{id}', 'pegawaiController@destroy');
Route::get('pegawaigantiStatus/{id}','pegawaiController@gantiStatus');

Route::get('edit_profil', 'pegawaiController@editprofile');
Route::post('edit_profileUpdate', 'pegawaiController@update_profil');

Route::get('jenisujiancreate','jenisujianController@create');
Route::get('jenisujianindex','jenisujianController@index');
Route::post('jenisujianStore', 'jenisujianController@store');
Route::get('jenisujianEdit{id}', 'jenisujianController@edit');
Route::post('jenisujianUpdate', 'jenisujianController@update');
Route::get('jenisujianDestroy/{id}', 'jenisujianController@destroy');

Route::get('periodecreate','periodebulanController@create');
Route::get('periodeindex','periodebulanController@index');
Route::post('periodeStore', 'periodebulanController@store');
Route::get('periodeEdit{id}', 'periodebulanController@edit');
Route::post('periodeUpdate', 'periodebulanController@update');
Route::get('periodeDestroy/{id}', 'periodebulanController@destroy');

Route::get('bimbingancreate','jenisbimbinganController@create');
Route::get('bimbinganindex','jenisbimbinganController@index');
Route::post('bimbinganStore', 'jenisbimbinganController@store');
Route::get('bimbinganEdit{id}', 'jenisbimbinganController@edit');
Route::post('bimbinganUpdate', 'jenisbimbinganController@update');
Route::get('bimbinganDestroy/{id}', 'jenisbimbinganController@destroy');

Route::get('siswacreate','siswaController@create');
Route::get('siswaindex','siswaController@index');
Route::post('siswaStore', 'siswaController@store');
Route::get('siswaEdit{id}', 'siswaController@edit');
Route::post('siswaUpdate', 'siswaController@update');
Route::get('siswaDestroy/{id}', 'siswaController@destroy');
Route::get('siswagantiStatus/{id}','siswaController@gantiStatus');

Route::get('ruangcreate','ruangController@create');
Route::get('ruangindex','ruangController@index');
Route::post('ruangStore', 'ruangController@store');
Route::get('ruangEdit{id}', 'ruangController@edit');
Route::post('ruangUpdate', 'ruangController@update');
Route::get('ruangDestroy/{id}', 'ruangController@destroy');

Route::get('presensiindex','presensiController@index');
Route::get('presensicreate','presensiController@create');
Route::post('presensiStore', 'presensiController@store');
Route::get('presensi{id}','presensiController@presensi');
Route::post('rekappresensi','presensiController@rekap');
Route::get('presensi_pdf', 'presensiController@cetak_presensi') ;

Route::get('jadwalcreate','jadwalController@create');
Route::get('jadwalindex','jadwalController@index');
Route::post('jadwalStore', 'jadwalController@store');

Route::get('penilaiancreate1','penilaianController@create1');
Route::get('penilaiancreate2','penilaianController@create2');
Route::get('penilaiancreate3','penilaianController@create3');
Route::get('penilaiancreate4','penilaianController@create4');
Route::get('penilaiancreate5','penilaianController@create5');
Route::get('penilaiancreate6','penilaianController@create6');
Route::get('penilaianindex1','penilaianController@index1');
Route::get('penilaianindex2','penilaianController@index2');
Route::get('penilaianindex3','penilaianController@index3');
Route::get('penilaianindex4','penilaianController@index4');
Route::get('penilaianindex5','penilaianController@index5');
Route::get('penilaianindex6','penilaianController@index6');
Route::post('penilaianStore1', 'penilaianController@store1');
Route::post('penilaianStore2', 'penilaianController@store2');
Route::post('penilaianStore3', 'penilaianController@store3');
Route::post('penilaianStore4', 'penilaianController@store4');
Route::post('penilaianStore5', 'penilaianController@store5');
Route::post('penilaianStore6', 'penilaianController@store6');
Route::get('penilaianEdit{id}', 'penilaianController@edit');
Route::post('penilaianUpdate', 'penilaianController@update');
Route::get('penilaianDestroy/{id}', 'penilaianController@destroy');
Route::get('penilaian_pdf1', 'penilaianController@cetak_penilaian1') ;
Route::get('penilaian_pdf2', 'penilaianController@cetak_penilaian2') ;
Route::get('penilaian_pdf3', 'penilaianController@cetak_penilaian3') ;
Route::get('penilaian_pdf4', 'penilaianController@cetak_penilaian4') ;
Route::get('penilaian_pdf5', 'penilaianController@cetak_penilaian5') ;
Route::get('penilaian_pdf6', 'penilaianController@cetak_penilaian6') ;
Route::post('importexcel4', 'penilaianController@importExcel')->name('import');
Route::get('penilaian_pdf4/{id}', 'penilaianController@cetak_penilaian4_ID') ;

Route::post('search1', 'penilaianController@search_siswa1') ;
Route::post('search2', 'penilaianController@search_siswa2') ;
Route::post('search3', 'penilaianController@search_siswa3') ;
Route::post('search4', 'penilaianController@search_siswa4') ;
Route::post('search5', 'penilaianController@search_siswa5') ;
Route::post('search6', 'penilaianController@search_siswa6') ;

Route::get('laporan_index1','penilaianController@laporan_mipa1');
Route::get('laporan_index2','penilaianController@laporan_mipa2');
Route::get('laporan_index3','penilaianController@laporan_mipa3');
Route::get('laporan_index4','penilaianController@laporan_ips1');
Route::get('laporan_index5','penilaianController@laporan_ips2');
Route::get('laporan_index6','penilaianController@laporan_ips3');
Route::post('cari_laporan','penilaianController@cari_laporan');
Route::post('cetak_pdf', 'penilaianController@cetak_pdf') ;