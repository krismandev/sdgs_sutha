<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Tentang;
use Alert;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function getTentang()
    {
        $tentang = Tentang::first();
        return view('dashboard.tentang',compact(['tentang']));
    }

    public function postTentang(Request $request)
    {
        $request->validate([
            'tentang'=>'required'
        ]);
        $tentang = Tentang::first();
        if ($tentang != null) {
            $tentang->update([
                'tentang'=> $request->tentang
            ]);
        }else {
            Tentang::create([
                'tentang'=>$request->tentang
            ]);
        }

        Alert::success('success','Berhasil memperbarui data');
        return back();
    }
}
