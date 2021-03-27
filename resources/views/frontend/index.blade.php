@extends('layouts.frontend.master')
@section('title')
    SDGs Center UIN Sultan Thaha Syaifuddin Jambi
@endsection
@section('content')
<style>
    .about-compnay{
        padding: 25px;
    }
</style>
<div class="about-compnay section-spacing">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12"><img src="{{asset('frontend/images/home/1.jpg')}}" alt=""></div>
            <div class="col-lg-6 col-12">
                <div class="text">
                    <div class="theme-title-one">
                        <h2>Apa itu SDGs?</h2>
                        <p>{!!$tentang->tentang!!}}</p>
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
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="team-member">
                        <div class="image-box">
                            <img src="{{asset('frontend/images/sosial.jpg')}}" alt="">
                        </div> <!-- /.image-box -->
                    </div> <!-- /.team-member -->
                </div> <!-- /.col- -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="team-member">
                        <div class="image-box">
                            <img src="{{asset('frontend/images/hukum.jpg')}}" alt="">
                        </div> <!-- /.image-box -->
                    </div> <!-- /.team-member -->
                </div> <!-- /.col- -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="team-member">
                        <div class="image-box">
                            <img src="{{asset('frontend/images/lingkungan.jpg')}}" alt="">
                        </div> <!-- /.image-box -->
                    </div> <!-- /.team-member -->
                </div> <!-- /.col- -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="team-member">
                        <div class="image-box">
                            <img src="{{asset('frontend/images/pembangunan.jpg')}}" alt="">
                        </div> <!-- /.image-box -->
                    </div> <!-- /.team-member -->
                </div> <!-- /.col- -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.overlay -->
</div> <!-- /.testimonial-section -->
@endsection
