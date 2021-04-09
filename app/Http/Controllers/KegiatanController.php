<?php

namespace App\Http\Controllers;
use App\Galeri;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function galeri()
    {
        $galeris = Galeri::orderBy('created_at','desc')->paginate(20);
        return view('frontend.kegiatan.galeri',compact(['galeris']));
    }
}
