<?php

namespace App\Http\Controllers;
use App\Inbox;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function kontak()
    {
        return view('frontend.kontak');
    }

    public function postKontak(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email'=> 'required',
            'hp' => 'required',
            'subject' => 'required',
            'pesan' => 'required'
        ]);

        Inbox::create([
            'nama' => $request->nama,
            'email'=> $request->email,
            'hp' => $request->hp,
            'subject' => $request->subject,
            'pesan' => $request->pesan
        ]);

        return back();
    }
}
