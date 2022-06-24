<?php

use App\Banner;

$banners = Banner::orderBy('created_at','desc')->get();

?>

@extends('layouts.frontend.master')
@section('title')
    SDGs Center UIN Sultan Thaha Syaifuddin Jambi
@endsection
@section('content')
<style>
    .about-compnay{
        padding: 25px;
    }

    .tujuanimg{
        /* -webkit-transform: translate(-50% , -50%);
                transform: translate(-50% , -50%); */
        transition:all 0.5s ease-in-out;
        box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.12);
    }

    .tujuanimg:hover{
        -webkit-transform:translate(-50% , -50%) scale3D(1.1,1.1,1);
          transform:translate(-50% , -50%) scale3D(1.1,1.1,1);
    }
</style>

<div class="about-compnay section-spacing">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12"><img src="{{url('images/'.$tentang->gambar)}}" alt="" style="width: 550px; height: 550px;"></div>
            <div class="col-lg-6 col-12">
                <div class="text">
                    <div class="theme-title-one">
                        <h2>Apa itu SDGs?</h2>
                        <p>{!!Str::limit($tentang->tentang,500)!!}...</p> <a href="{{route('tentang')}}">Baca Selengkapnya</a>
                    </div> <!-- /.theme-title-one -->
                </div> <!-- /.text -->
            </div> <!-- /.col- -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.about-compnay -->

<div class="testimonial-section section-spacing">
    <div class="overlay">
        <div class="container">
            <div class="row">
                @if ($pilars->count() != null)
                @foreach ($pilars as $pilar)
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="team-member">
                        <div class="image-box">
                            <a href="{{url('pilar/'.$pilar->file)}}">
                                <img src="{{url('pilar/'.$pilar->gambar)}}" alt="">
                            </a>
                        </div> <!-- /.image-box -->
                    </div> <!-- /.team-member -->
                </div> <!-- /.col- -->
                @endforeach
                @endif
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.overlay -->
</div> <!-- /.testimonial-section -->

<div class="our-blog latest-news section-spacing">
    <div class="container">
        <div class="theme-title-one">
            <h2>Berita Terbaru</h2>
            {{-- <p>A tale of a fateful trip that started from this tropic port aboard this tiny ship today stillers </p> --}}
        </div> <!-- /.theme-title-one -->
        @if($beritas->count() != null)
        <div class="wrapper">
            <div class="clearfix">
                <div class="latest-news-slider">
                    @foreach ($beritas as $berita)

                    <div class="item">
                        <div class="single-blog">
                            <div class="image-box">
                                <img src="{{url('images/'.$berita->gambar)}}" alt="" style="max-height: 278px;">
                                <div class="overlay"><a href="#" class="date">{{date('d M Y',strtotime($berita->created_at))}}</a></div>
                            </div> <!-- /.image-box -->
                            <div class="post-meta">
                                <h5 class="title"><a href="{{route('showBerita',['id'=>$berita->id,'slug'=>$berita->slug])}}">{!!Str::limit($berita->konten,150)!!}</a></h5>
                                <a href="{{route('showBerita',['id'=>$berita->id,'slug'=>$berita->slug])}}" class="read-more">Baca selengkapnya...</a>
                            </div> <!-- /.post-meta -->
                        </div> <!-- /.single-blog -->
                    </div> <!-- /.col- -->
                    @endforeach
                </div> <!-- /.latest-news-slider -->
            </div> <!-- /.row -->
        </div> <!-- /.wrapper -->
        @endif
    </div> <!-- /.container -->
</div> <!-- /.our-blog -->

<div class="our-blog latest-news section-spacing">
    <div class="container">
        {{-- <div class="theme-title-one">
            <h2>Berita Terbaru</h2>
        </div>  --}}
        <div class="wrapper">
            <div class="clearfix">
                <iframe src="http://alfidashboard.000webhostapp.com/" frameborder="0" width="100%" height="500px"></iframe>
            </div> <!-- /.row -->
        </div> <!-- /.wrapper -->
    </div> <!-- /.container -->
</div> <!-- /.our-blog -->

<div class=" section-spacing">
    <div class="overlay">
        <div class="container">
            <div class="row">
                @if($tujuans->count() != null)
                @foreach ($tujuans as $tujuan)
                <div class="col-lg-2 col-sm-6 col-12 mb-1">
                    <div class="team-member">
                        <div class="image-box">
                            <a href="{{route('showTujuan',$tujuan->id)}}"><img src="{{$tujuan->getImage()}}" alt="" class="tujuanimg"></a>
                        </div> <!-- /.image-box -->
                    </div> <!-- /.team-member -->
                </div> <!-- /.col- -->
                @endforeach
                @endif
                <div class="col-lg-2 col-sm-6 col-12 mb-1">
                    <div class="team-member">
                        <div class="image-box">
                            <a href="#"><img src="{{asset('images/TPB-Logo.jpg')}}" alt="" class="tujuanimg"></a>
                        </div> <!-- /.image-box -->
                    </div> <!-- /.team-member -->
                </div> <!-- /.col- -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.overlay -->
</div> <!-- /.testimonial-section -->

@endsection
