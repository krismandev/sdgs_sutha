<?php

namespace App\Http\Controllers;

use App\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function berita()
    {
        $beritas = Berita::orderBy('created_at','desc')->get();
        return view('frontend.berita.berita',compact(['beritas']));
    }

    public function showBerita($id,$slug)
    {
        $berita = Berita::find($id);
        return view('frontend.berita.single',compact(['berita']));
    }
}
