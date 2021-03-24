<?php

namespace App\Http\Controllers;

use App\Dokumen;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function dokumen()
    {
        $dokumens = Dokumen::orderBy('created_at','desc')->get();
        return view('frontend.data.dokumen',compact(['dokumens']));
    }
}
