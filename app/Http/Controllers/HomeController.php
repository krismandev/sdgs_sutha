<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\Tentang;
use App\Berita;
use App\Featured;
use App\Tujuan;
use App\Profil;
use App\Pilar;
use App\Fund;
use App\Galeri;
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
        $agendas = Agenda::orderBy('created_at','desc')->paginate(4);
        $galeris = Galeri::inRandomOrder()->paginate(4)->toArray();
        $galeris = $galeris['data'];
        $featured = Featured::paginate(4);
        return view('frontend.index',compact(['tentang','beritas','tujuans','pilars','funds','agendas','galeris','featured']));
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
