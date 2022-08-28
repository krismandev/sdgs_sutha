@extends('layouts.fund.master')
@section('title')
    {{$fund->tujuan}}
@endsection
@section('meta')
<meta name="description" content="<?=strlen(strip_tags($fund->deskripsi)) > 150 ? substr(strip_tags($fund->deskripsi),0,150)."..." : strip_tags($fund->deskripsi);?>"/>
 
<!-- Google / Search Engine Tags -->
<meta itemprop="name" content="{{$fund->tujuan}}">
<meta itemprop="description" content="<?=strlen(strip_tags($fund->deskripsi)) > 150 ? substr(strip_tags($fund->deskripsi),0,150)."..." : strip_tags($fund->deskripsi);?>">
<meta itemprop="image" content="{{url('fund/img/'.$fund->gambar)}}">
 
<!-- Facebook Meta Tags -->
<meta property="og:url" content="">
<meta property="og:type" content="website">
<meta property="og:title" content="{{$fund->tujuan}}">
<meta property="og:description" content="<?=strlen(strip_tags($fund->deskripsi)) > 150 ? substr(strip_tags($fund->deskripsi),0,150)."..." : strip_tags($fund->deskripsi);?>">
<meta property="og:image" content="{{url('fund/img/'.$fund->gambar)}}">
 
<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{$fund->tujuan}}">
<meta name="twitter:description" content="<?=strlen(strip_tags($fund->deskripsi)) > 150 ? substr(strip_tags($fund->deskripsi),0,150)."..." : strip_tags($fund->deskripsi);?>">
<meta name="twitter:image" content="{{url('fund/img/'.$fund->gambar)}}">

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
                <div class="text-md font-medium capitalize"> <?= $deadline->y != 0 ? $deadline->y." <span class=\"text-slate-500 text-xs\">tahun</span>" : " " ?> <?= $deadline->m != 0 ? $deadline->m." <span class=\"text-slate-500 text-xs\">Bulan</span>" : " " ?> {{$deadline->d}} <span class="text-slate-500 text-xs">Hari lagi</span></div>
            </div>
            
        </div>
        <div class="card">
            <h2>deskripsi donasi</h2>
            <div class="text-md  first-letter:capitalize mt-4 font-normal indent-8">
                <?=$fund->deskripsi ?>
            </div>
            <div class="text-md font-medium capitalize flex justify-between mt-4"><abbr class="text-xl mr-10" title="Tengat Waktu"><i class="fa-solid fa-calendar"></i></abbr> <?= date("d-m-Y", strtotime($fund->deadline))  ?></div>
            <div class="garis"></div>
            <div class="text-md font-medium capitalize flex justify-between"><abbr class="text-xl mr-10" title="Lokasi"><i class="fa-solid fa-location-dot"></i></abbr> {{$fund->lokasi}}</div>
            <div class="garis"></div>
            
        </div>
        <div class="card mb-20">
            <h2>Daftar Donatur</h2>
            @if($donaturs->count() != null)
                @foreach ($donaturs as $donatur)
                    <div class="box-donatur"><div class="donatur text-sky-700 font-medium">{{$donatur->nama}}</div> <div>berdonasi sebesar {{"Rp " . number_format($donatur->jumlah,2,',','.') }}</div></div>  
                @endforeach
                <div class="w-24 mt-2 mx-auto"><a href="{{route('listDonatur',['id'=>$id])}}">Lihat Semua</a></div>
                @endif
            </div>
        </div>
    </div>
    <script>
        let url = location.href;
        document.querySelector('meta[property="og:url"]').setAttribute("content", url);
    </script>
@endsection