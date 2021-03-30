<?php

namespace App\Http\Controllers;

use App\Tentang;
use App\Berita;
use App\Tujuan;
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
        return view('frontend.index',compact(['tentang','beritas','tujuans']));
    }
}
