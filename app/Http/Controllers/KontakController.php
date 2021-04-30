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

        $to = "krismanpratama@gmail.com";
        $headers = 'From: <a2262189@bangkit.academy>'."rn";
        $pengirim	= 'Dari: '.$request->nama.' <'.$request->email.'>';

        @mail($to,$request->subject,$request->pesan,$pengirim);

        if (@main) {
            dd("ok");
        }else{
            dd("ups");
        }

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
