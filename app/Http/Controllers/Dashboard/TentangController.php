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
            // 'gambar'=>'required'
        ]);

        // dd($request->gambar);

        $tentang = Tentang::first();

        if ($request->has('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time()."_".$gambar->getClientOriginalName();
            $tujuan_upload = 'images';
            $gambar->move($tujuan_upload,$nama_gambar);
        }else{
            $nama_gambar = $tentang->gambar;
        }



        if ($tentang != null) {
            $tentang->update([
                'tentang'=> $request->tentang,
                'gambar'=> $nama_gambar
            ]);
        }else {
            Tentang::create([
                'tentang'=>$request->tentang,
                'gambar' => $nama_gambar
            ]);
        }

        Alert::success('success','Berhasil memperbarui data');
        return back();
    }
}
