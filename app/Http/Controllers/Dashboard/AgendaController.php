<?php

namespace App\Http\Controllers\Dashboard;

use App\Agenda;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AgendaController extends Controller
{
    public function getAgenda()
    {
        $agendas = Agenda::orderBy('created_at','desc')->get();
        return view('dashboard.agenda.getAgenda',compact(['agendas']));
    }

    public function createAgenda()
    {
        $page_title = 'Buat Agenda Baru';
        $head_title = 'Tambah Agenda';
        return view('dashboard.agenda.createAgenda',compact(['page_title','head_title']));
    }

    public function postAgenda(Request $request)
    {
        $request->validate([
            'judul'=>'required',
            'tanggal'=>'required',
            'file' => 'file'
        ]);

        if ($request->has('dokumen')) {
            $file = $request->file('dokumen');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'agenda';
            $file->move($tujuan_upload,$nama_file);
        }else {
            $nama_file = null;
        }

        Agenda::create([
            'judul'=>$request->judul,
            'tanggal'=>$request->tanggal,
            'commite'=>$request->commite,
            'lokasi'=>$request->lokasi,
            'kontak'=>$request->kontak,
            'link_terkait'=>$request->link_terkait,
            'deskripsi'=>$request->deskripsi,
            'dokumen'=>$nama_file,
        ]);

        Alert::success("Sukses","Berhasil menambah agenda");
        return redirect()->route('getAgenda');
    }

    public function editAgenda($id)
    {
        $agenda = Agenda::find($id);
        $head_title = 'Buat Agenda Baru';
        $page_title = 'Edit Agenda - '.$agenda->judul;
        return view('dashboard.agenda.createAgenda',compact(['agenda','head_title','page_title']));
    }

    public function updateAgenda(Request $request)
    {
        $request->validate([
            'judul'=>'required',
            'tanggal'=>'required',
            'file' => 'file'
        ]);

        $agenda = Agenda::find($request->agenda_id);
        
        if ($request->has('dokumen')) {
            $file = $request->file('dokumen');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'agenda';
            $file->move($tujuan_upload,$nama_file);
        }else {
            $nama_file = $agenda->dokumen;
        }

        $agenda->update([
            'judul'=>$request->judul,
            'tanggal'=>$request->tanggal,
            'commite'=>$request->commite,
            'lokasi'=>$request->lokasi,
            'kontak'=>$request->kontak,
            'link_terkait'=>$request->link_terkait,
            'deskripsi'=>$request->deskripsi,
            'dokumen'=>$nama_file,
        ]);

        Alert::success("Sukses","Berhasil mengupdate agenda");
        return redirect()->route('getAgenda');
    }

    public function deleteAgenda($id)
    {
        $agenda = Agenda::find($id);
        $file_path = public_path().'/agenda/'.$agenda->dokumen;
        
        File::delete($file_path);
        $agenda->delete();
        Alert::success("Sukses","Berhasil menghapus agenda");
        return redirect()->back();
    }
}
