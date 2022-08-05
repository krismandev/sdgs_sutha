<?php

namespace App\Http\Controllers\Dashboard;

use App\Featured;
use App\Http\Controllers\Controller;
use Alert;
use Illuminate\Http\Request;

class FeaturedController extends Controller
{
    public function getFeatured()
    {
        $featureds = Featured::orderBy("judul","asc")->get();
        return view("dashboard.featured.getFeatured",compact(["featureds"]));
    }

    public function postFeatured(Request $request)
    {
        $request->validate([
            "featured_id"=>"required",
            "judul"=>"required",
            "deskripsi"=>"required",
            "link"=>"required",
        ]);

        $featured = Featured::find($request->featured_id);
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time()."_".$gambar->getClientOriginalName();
            $tujuan_upload = 'featured';
            $gambar->move($tujuan_upload,$nama_gambar);
        }else{
            $nama_gambar = $featured->gambar;
        }
        $featured->update([
            "judul"=>$request->judul,
            "deskripsi"=>$request->deskripsi,
            "link"=>$request->link,
            "gambar"=>$nama_gambar
        ]);

        Alert::success("Sukses","Berhasil menambah data");
        return back();
    }
}
