<?php

namespace App\Http\Controllers\Dashboard;

use App\Dokumen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    public function getDokumen()
    {
        $dokumens = Dokumen::orderBy('nama_dokumen','asc')->get();
        return view('dashboard.dokumen.getDokumen',compact(['dokumens']));
    }

    public function postDokumen(Request $request)
    {
        $request->validate([
            'nama_dokumen' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:png,jpg,jpeg',
            'file' => 'required|file|mimes:pdf'
        ]);

        $gambar = $request->file('gambar');
        $nama_gambar = time()."_".$gambar->getClientOriginalName();
        $tujuan_upload = 'dokumen';
        $gambar->move($tujuan_upload,$nama_gambar);

        $file = $request->file('file');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'dokumen';
        $file->move($tujuan_upload,$nama_file);

        $dokumen = Dokumen::create([
            'nama_dokumen' => $request->nama_dokumen,
            'deskripsi' => $request->deskripsi,
            'gambar' => $nama_gambar,
            'file' => 'required|file|mimes:pdf'
        ]);

        return "ok";
    }

    public function editDokumen($id)
    {
        $dokumen = Dokumen::find($id);
        return view('dashboard.dokumen.editDokumen',compact(['dokumen']));
    }
}
