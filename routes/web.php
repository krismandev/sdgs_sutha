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
});
