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

Route::get('/', 'HomeController@index')->name('index');
Auth::routes();


Route::group(['prefix' => 'data'],function(){
    Route::get('dokumen','DataController@dokumen')->name('dokumen');

});
Route::get('/berita','BeritaController@berita')->name('berita');
Route::get('/berita/{id}/{slug}','BeritaController@showBerita')->name('showBerita');
Route::get('/tujuan-{id}','TujuanController@showTujuan')->name('showTujuan');
Route::get('/kontak','KontakController@kontak')->name('kontak');
Route::post('/kontak','KontakController@postkontak')->name('postKontak');
Route::get('/pilar-sosial','DataController@sosial')->name('sosial');
Route::get('/pilar-ekonomi','DataController@ekonomi')->name('ekonomi');
Route::get('/pilar-hukum','DataController@hukum')->name('hukum');
Route::get('/pilar-lingkungan','DataController@lingkungan')->name('lingkungan');
Route::get('/galeri-kegiatan','KegiatanController@galeri')->name('galeri');
Route::get('/tentang','HomeController@tentang')->name('tentang');
Route::get('/maps','HomeController@petaKampus')->name('petaKampus');
// ----------------------------------------------------------------------------------------------------
Route::group(['middleware'=>'auth','prefix' => 'admin'],function(){
    Route::get('/','Dashboard\HomeController@index')->name('dashboard');

    Route::group(['prefix' => 'berita'],function(){
        Route::get('/','Dashboard\BeritaController@getBerita')->name('getBerita');
        Route::get('/baru','Dashboard\BeritaController@createBerita')->name('createBerita');
        Route::post('/','Dashboard\BeritaController@postBerita')->name('postBerita');
        Route::get('/{id}','Dashboard\BeritaController@editBerita')->name('editBerita');
        Route::patch('/','Dashboard\BeritaController@updateBerita')->name('updateBerita');
        Route::get('/delete/{id}','Dashboard\BeritaController@deleteBerita')->name('deleteBerita');
    });
    Route::group(['prefix' => 'tentang'],function(){
        Route::get('/','Dashboard\TentangController@getTentang')->name('getTentang');
        Route::post('/','Dashboard\TentangController@postTentang')->name('postTentang');
        Route::patch('/','Dashboard\TentangController@updateTentang')->name('updateTentang');
    });
    Route::group(['prefix' => 'dokumen'],function(){
        Route::get('/','Dashboard\DokumenController@getDokumen')->name('getDokumen');
        Route::post('/','Dashboard\DokumenController@postDokumen')->name('postDokumen');
        Route::get('/{id}','Dashboard\DokumenController@editDokumen')->name('editDokumen');
        Route::patch('/','Dashboard\DokumenController@updateDokumen')->name('updateDokumen');
        Route::get('/delete/{id}','Dashboard\DokumenController@deleteDokumen')->name('deleteDokumen');

    });

    Route::group(['prefix' => 'galeri'],function(){
        Route::get('/','Dashboard\GaleriController@getGaleri')->name('getGaleri');
        Route::post('/','Dashboard\GaleriController@postGaleri')->name('postGaleri');
        Route::get('/delete/{id}','Dashboard\GaleriController@deleteGaleri')->name('deleteGaleri');
    });

    Route::group(['prefix' => 'banner'],function(){
        Route::get('/','Dashboard\BannerController@getBanner')->name('getBanner');
        Route::post('/','Dashboard\BannerController@postBanner')->name('postBanner');
        Route::get('/delete/{id}','Dashboard\BannerController@deleteBanner')->name('deleteBanner');
    });

    Route::group(['prefix' => 'tujuan'],function(){
        Route::get('/','Dashboard\TujuanController@getTujuan')->name('getTujuan');
        Route::post('/','Dashboard\TujuanController@postTujuan')->name('postTujuan');
        Route::get('/{id}','Dashboard\TujuanController@editTujuan')->name('editTujuan');
        Route::patch('/','Dashboard\TujuanController@updateTujuan')->name('updateTujuan');
    });

    Route::group(['prefix' => 'inbox'],function(){
        Route::get('/','Dashboard\InboxController@getInbox')->name('getInbox');
        Route::get('/{id}','Dashboard\InboxController@showMessage')->name('showMessage');
        Route::patch('/','Dashboard\InboxController@updateInbox')->name('updateInbox');
    });

    Route::group(['prefix' => 'mitra'],function(){
        Route::get('/','Dashboard\MitraController@getMitra')->name('getMitra');
        Route::post('/','Dashboard\MitraController@postMitra')->name('postMitra');
        Route::get('/delete/{id}','Dashboard\MitraController@deleteMitra')->name('deleteMitra');
    });

    Route::group(['prefix' => 'users'],function(){
        Route::get('/','Dashboard\UserController@getUsers')->name('getUsers');
        Route::post('/','Dashboard\UserController@postUser')->name('postUser');
    });

    Route::group(['prefix' => 'profile'],function(){
        Route::get('/','Dashboard\UserController@profile')->name('profile');
        Route::patch('/','Dashboard\UserController@updateProfile')->name('updateProfile');
    });

    Route::patch('/password','Dashboard\UserController@updatePassword')->name('updatePassword');
    Route::get('/logout','Dashboard\UserController@logout')->name('logout');
});
