<?php

namespace App\Http\Controllers;

use App\Tentang;
use App\Berita;
use App\Tujuan;
use App\Pilar;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tujuans = Tujuan::orderBy('id','asc')->get();
        $tentang = Tentang::first();
        $beritas = Berita::orderBy('created_at','desc')->paginate(3);
        $pilars = Pilar::orderBy('created_at','asc')->get();
        return view('frontend.index',compact(['tentang','beritas','tujuans','pilars']));
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


}
