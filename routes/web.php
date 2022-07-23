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
// Route::get('/login','Dashboard\LoginController@login')->name('login');
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
Route::get('/buku','PublikasiController@buku')->name('buku');
Route::get('/jurnal','PublikasiController@jurnal')->name('jurnal');
Route::get('/report','PublikasiController@report')->name('report');
Route::get('/webinar','KegiatanController@webinar')->name('webinar');
Route::get('/seminar&conference','KegiatanController@seminar')->name('seminar');
Route::get('/pengabdian','KegiatanController@pengabdian')->name('pengabdian');
Route::get('/survey','KegiatanController@survey')->name('survey');
Route::get('/our-research','ResearchController@research')->name('research');
Route::get('/our-research/{id}','ResearchController@detailResearch')->name('detailResearch');
Route::get('/profil','HomeController@profil')->name('profil');
Route::get('/agenda/{id}','AgendaController@showAgenda')->name('showAgenda');
Route::get('/list-agenda','AgendaController@agenda')->name('agenda');


Route::group(['prefix' => 'fund'],function(){
    Route::get('detail/{id}','FundController@detailFund')->name('detailFund');
    Route::get('form/{id}','FundController@formFund')->name('formFund');
    Route::post('donatur/create','DonaturController@createDonatur')->name('createDonatur');
    Route::get('donatur/konfirmasi/{order_id}/{data}','DonaturController@konfirmasiDonatur')->name('konfirmasiDonatur');
    Route::get('donatur/list/{id}','DonaturController@listDonatur')->name('listDonatur');
    Route::post('donatur/notif','DonaturController@notifHandler')->name('notifHandler');
});

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

    Route::group(['prefix' => 'jurnal'],function(){
        Route::get('/','Dashboard\PublikasiController@getJurnal')->name('getJurnal');
        Route::post('/','Dashboard\PublikasiController@postJurnal')->name('postJurnal');
        Route::get('/{id}','Dashboard\PublikasiController@editJurnal')->name('editJurnal');
        Route::patch('/','Dashboard\PublikasiController@updateJurnal')->name('updateJurnal');
        Route::get('/delete/{id}','Dashboard\PublikasiController@deleteJurnal')->name('deleteJurnal');
    });

    Route::group(['prefix' => 'buku'],function(){
        Route::get('/','Dashboard\PublikasiController@getBuku')->name('getBuku');
        Route::post('/','Dashboard\PublikasiController@postBuku')->name('postBuku');
        Route::get('/{id}','Dashboard\PublikasiController@editBuku')->name('editBuku');
        Route::patch('/','Dashboard\PublikasiController@updateBuku')->name('updateBuku');
        Route::get('/delete/{id}','Dashboard\PublikasiController@deleteBuku')->name('deleteBuku');
    });

    Route::group(['prefix' => 'agenda'],function(){
        Route::get('/','Dashboard\AgendaController@getAgenda')->name('getAgenda');
        Route::get('/create','Dashboard\AgendaController@createAgenda')->name('createAgenda');
        Route::post('/','Dashboard\AgendaController@postAgenda')->name('postAgenda');
        Route::get('/{id}','Dashboard\AgendaController@editAgenda')->name('editAgenda');
        Route::patch('/','Dashboard\AgendaController@updateAgenda')->name('updateAgenda');
        Route::get('/delete/{id}','Dashboard\AgendaController@deleteAgenda')->name('deleteAgenda');
    });


    Route::group(['prefix' => 'annual-report'],function(){
        Route::get('/','Dashboard\PublikasiController@getReport')->name('getReport');
        Route::post('/','Dashboard\PublikasiController@postReport')->name('postReport');
        Route::get('/{id}','Dashboard\PublikasiController@editReport')->name('editReport');
        Route::patch('/','Dashboard\PublikasiController@updateReport')->name('updateReport');
        Route::get('/delete/{id}','Dashboard\PublikasiController@deleteReport')->name('deleteReport');
    });

    Route::group(['prefix' => 'kegiatan'],function(){
        Route::group(['prefix' => 'webinar'],function(){
            Route::get('/','Dashboard\KegiatanController@getWebinar')->name('getWebinar');
            Route::post('/','Dashboard\KegiatanController@postWebinar')->name('postWebinar');
            Route::get('/delete/{id}','Dashboard\KegiatanController@deleteWebinar')->name('deleteWebinar');
        });

        Route::group(['prefix' => 'seminar'],function(){
            Route::get('/','Dashboard\KegiatanController@getSeminar')->name('getSeminar');
            Route::post('/','Dashboard\KegiatanController@postSeminar')->name('postSeminar');
            Route::get('/delete/{id}','Dashboard\KegiatanController@deleteSeminar')->name('deleteSeminar');
        });

        Route::group(['prefix' => 'pengabdian'],function(){
            Route::get('/','Dashboard\KegiatanController@getPengabdian')->name('getPengabdian');
            Route::post('/','Dashboard\KegiatanController@postPengabdian')->name('postPengabdian');
            Route::get('/delete/{id}','Dashboard\KegiatanController@deletePengabdian')->name('deletePengabdian');
        });

        Route::group(['prefix' => 'survey'],function(){
            Route::get('/','Dashboard\KegiatanController@getSurvey')->name('getSurvey');
            Route::post('/','Dashboard\KegiatanController@postSurvey')->name('postSurvey');
            Route::get('/delete/{id}','Dashboard\KegiatanController@deleteSurvey')->name('deleteSurvey');
        });
    });

    Route::group(['prefix' => 'research'],function(){
        Route::get('/','Dashboard\ResearchController@getResearch')->name('getResearch');
        Route::get('/create','Dashboard\ResearchController@createResearch')->name('createResearch');
        Route::get('/{id}','Dashboard\ResearchController@editResearch')->name('editResearch');
        Route::post('/','Dashboard\ResearchController@postResearch')->name('postResearch');
        Route::get('/delete/{id}','Dashboard\ResearchController@deleteResearch')->name('deleteResearch');
        Route::patch('/','Dashboard\ResearchController@updateResearch')->name('updateResearch');

    });
    Route::group(['prefix' => 'fund'],function(){
        Route::get('/','Dashboard\FundController@getFund')->name('getFund');
        Route::get('/baru','Dashboard\FundController@createFund')->name('createFund');
        Route::post('/','Dashboard\FundController@postFund')->name('postFund');
        Route::get('/{id}','Dashboard\FundController@editFund')->name('editFund');
        Route::get('/donatur/{id}','Dashboard\FundController@listDonatur')->name('listDonatur');
        Route::patch('/','Dashboard\FundController@updateFund')->name('updateFund');
        Route::get('/delete/{id}','Dashboard\FundController@deleteFund')->name('deleteFund');
    });

    Route::group(['prefix' => 'pilar-sdgs'],function(){
        Route::get('/','Dashboard\PilarController@getPilar')->name('getPilar');
        Route::post('/','Dashboard\PilarController@postPilar')->name('postPilar');
        Route::get('/delete/{id}','Dashboard\PilarController@deletePilar')->name('deletePilar');
    });

    Route::group(['prefix' => 'profil-sdgs'],function(){
        Route::get('/','Dashboard\TentangController@getProfil')->name('getProfil');
        Route::post('/','Dashboard\TentangController@postProfil')->name('postProfil');
        Route::get('/delete/{id}','Dashboard\TentangController@deleteProfil')->name('deleteProfil');
    });

    Route::patch('/password','Dashboard\UserController@updatePassword')->name('updatePassword');
    Route::get('/logout','Dashboard\UserController@logout')->name('logout');
});
