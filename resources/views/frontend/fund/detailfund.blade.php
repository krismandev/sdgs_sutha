@extends('layouts.fund.master')
@section('title')
    Detail Donasi
@endsection
@section('content')
    <div class="kontainer min-h-screen">
        <div class="card sm:mt-8">
            <button onclick="history.back()" class="close-button close"><i class="fa-solid fa-arrow-left"></i></button>
            <img src="{{url('fund/img/'.$fund->gambar)}}" alt="">
            <h1 class="mt-2">{{$fund->tujuan}}</h1>
            <div class="mt-2">
                <div class="flex flex-row justify-between">
                    <h2 >dana terkumpul</h2> <h2 class="">{{$persentasefund}}</h2>
                </div>
                <div class="rounded-sm h-1 bg-slate-400 w-full">
                    <div class="bg-sky-600 h-full rounded" style="width:<?= $persentasefund?>;" ></div>
                </div>
                <div>{{$dana_masuk}} <span class="text-xs text-slate-500">Dari {{$target}}</span></div>
                
            </div>
            <div class="mt-2 flex justify-between">
                <a class="" href="{{route('formFund',['id'=>$id])}}">
                    <button class="tombol">donasi</button>
                </a>
                <div class="text-md font-medium capitalize">{{$deadline}} <span class="text-slate-500 text-xs">hari lagi</span></div>
            </div>
            
        </div>
        <div class="card">
            <h2>deskripsi donasi</h2>
            <div class="text-md font-medium first-letter:capitalize indent-8">
                <p class="mt-4 font-normal indent-8">
                {{$fund->deskripsi}}
                </p>
            </div>
            <div class="text-md font-medium capitalize flex justify-between mt-4"><abbr class="text-xl mr-10" title="Tengat Waktu"><i class="fa-solid fa-calendar"></i></abbr> <?= date("d-m-Y", strtotime($fund->deadline))  ?></div>
            <div class="garis"></div>
            <div class="text-md font-medium capitalize flex justify-between"><abbr class="text-xl mr-10" title="Lokasi"><i class="fa-solid fa-location-dot"></i></abbr> {{$fund->lokasi}}</div>
            <div class="garis"></div>
            
        </div>
        <div class="card mb-20">
            <h2>donasi</h2>
                <div class="box-donatur"><div class="donatur text-sky-700 font-medium">alfi</div> <div>berdonasi sebesar 1000</div></div>  
                <div class="w-24 mt-2 mx-auto"><a href="daftar-donasi.php?id-fund=1">Lihat Semua</a></div>
            </div>
        </div>
    </div>
@endsection