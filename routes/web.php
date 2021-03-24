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
    return view('frontend.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'data'],function(){
    Route::get('dokumen','DataController@dokumen')->name('dokumen');

});
Route::get('/berita','BeritaController@berita')->name('berita');

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
    });
});
