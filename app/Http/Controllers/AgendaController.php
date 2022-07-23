<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\Berita;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function showAgenda($id)
    {
        $agenda = Agenda::find($id);
        $agendaLainnya = Agenda::inRandomOrder()->paginate(5);
        return view('frontend.agenda.single',compact(['agenda','agendaLainnya']));
    }

    public function agenda()
    {
        $agendas = Agenda::orderBy('created_at','desc')->paginate(10);
        $beritaLainnya = Berita::orderBy('created_at','desc')->paginate(5);
        return view('frontend.agenda.agenda',compact(['agendas','beritaLainnya']));
    }
}
