@extends('layouts.fund.master')
@section('title')
    Konfirmasi donasi
@endsection
@section('content')
<div class="card mb-20">
    <h2>Daftar Donatur</h2>
    @if($donaturs->count() != null)
        @foreach ($donaturs as $donatur)
            <div class="box-donatur"><div class="donatur text-sky-700 font-medium">{{$donatur->nama}}</div> <div>berdonasi sebesar {{"Rp " . number_format($donatur->jumlah,2,',','.') }}</div></div>  
        @endforeach
        {{$donaturs->links()}}
    @endif
    </div>
</div>
@endsection