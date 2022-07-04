<?php

namespace App\Http\Controllers;

use App\Tentang;
use App\Berita;
use App\Tujuan;
use App\Profil;
use App\Pilar;
use App\Fund;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $tujuans = Tujuan::orderBy('id','asc')->get();
        $tentang = Tentang::first();
        $beritas = Berita::orderBy('created_at','desc')->paginate(4);
        $pilars = Pilar::orderBy('created_at','asc')->get();
        $funds = Fund::orderBy('created_at','desc')->paginate(4);
        return view('frontend.index',compact(['tentang','beritas','tujuans','pilars','funds']));
    }

    public function tentang()
    {
        $tentang = Tentang::first();
        return view('frontend.tentang',compact(['tentang']));
    }

    public function petaKampus()
    {
        return view('frontend.petakampus');
    }

    public function profil()
    {
        $profil = Profil::first();
        return view('frontend.profil',compact(['profil']));
    }


}
