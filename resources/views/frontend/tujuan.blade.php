

@extends('layouts.frontend.master')
@section('title')
    {{$tujuan->nama}}
@endsection
@section('content')
<style>
    .banner-inner-page{
        background-attachment: fixed;
        background-size: cover;
    }
</style>
@switch($tujuan->id)
    @case(1)
        <style>
            .single-banner{
                background-color: #eb1c2d;
            }
        </style>
    @break
    @case(2)
        <style>
            .single-banner{
                background-color: #d3a02a;
            }
        </style>
    @break
    @case(3)
        <style>
            .single-banner{
                background-color: #279b48;
            }
        </style>
    @break
    @case(4)
        <style>
            .single-banner{
                background-color: #c31f33;
            }
        </style>
    @break
    @case(5)
        <style>
            .single-banner{
                background-color: #ef3f2b;
            }
        </style>
    @break
    @case(6)
        <style>
            .single-banner{
                background-color: #04aed9;
            }
        </style>
    @break
    @case(7)
        <style>
            .single-banner{
                background-color: #fdb713;
            }
        </style>
    @break
    @case(8)
        <style>
            .single-banner{
                background-color: #8f1838;
            }
        </style>
    @break
    @case(9)
        <style>
            .single-banner{
                background-color: #f36d25;
            }
        </style>
    @break
    @case(10)
        <style>
            .single-banner{
                background-color: #e01a83;
            }
        </style>
    @break
    @case(11)
        <style>
            .single-banner{
                background-color: #f99d26;
            }
        </style>
    @break
    @case(12)
        <style>
            .single-banner{
                background-color: #cf8e2a;
            }
        </style>
    @break
    @case(13)
        <style>
            .single-banner{
                background-color: #48783e;
            }
        </style>
    @break
    @case(14)
        <style>
            .single-banner{
                background-color: #037dbc;
            }
        </style>
    @break
    @case(15)
        <style>
            .single-banner{
                background-color: #3db049;
            }
        </style>
    @break
    @case(16)
        <style>
            .single-banner{
                background-color: #04558c;
            }
        </style>
    @break
    @case(17)
        <style>
            .single-banner{
                background-color: #183668;
            }
        </style>
    @break

    @default
    <style>
        .single-banner{
                background-color: #ffffff;
        }
    </style>

@endswitch
{{-- <div class="banner-inner-page section-spacing" style="height: 500px;">
        <div class="col-lg-12">
            <div class="col-md-7">
                <h3>{{$tujuan->id}}. {{$tujuan->nama}}</h3>
            </div>
            <div class="col-md-5">
                <img src="{{url('images/'.$tujuan->getImage())}}" alt="" style="width: 100px;">
            </div>
        </div>

</div> --}}

<div class="single-banner" style=" height:50px;">

</div>



<div class="about-compnay section-spacing single-banner" style="height: 450px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-12" style="margin-top: 100px;">
                <div class="text">
                    <div class="theme-title-one">
                        <h2 style="color: white;">{{$tujuan->id}}.{{$tujuan->nama}}</h2>
                    </div> <!-- /.theme-title-one -->
                </div> <!-- /.text -->
            </div> <!-- /.col- -->
            <div class="col-lg-5 col-12 float-right">
                @switch($tujuan->id)
                    @case(1)
                        <img src="{{asset('images/goal-1-upload.png')}}" alt="" height="300px; width:100%;">
                        @break
                    @case(2)
                        <img src="{{asset('images/goal-2-upload.png')}}" alt="" height="300px; width:100%;">
                        @break
                        @case(3)
                        <img src="{{asset('images/goal-3-upload.png')}}" alt="" height="300px; width:100%;">
                        @break
                        @case(4)
                        <img src="{{asset('images/goal-4-upload.png')}}" alt="" height="300px; width:100%;">
                        @break
                        @case(5)
                        <img src="{{asset('images/goal-5-upload.png')}}" alt="" height="300px; width:100%;">
                        @break
                        @case(6)
                        <img src="{{asset('images/goal-6-upload.png')}}" alt="" height="300px; width:100%;">
                        @break
                        @case(7)
                        <img src="{{asset('images/goal-7-upload.png')}}" alt="" height="300px; width:100%;">
                        @break
                        @case(8)
                        <img src="{{asset('images/goal-8-upload.png')}}" alt="" height="300px; width:100%;">
                        @break
                        @case(9)
                        <img src="{{asset('images/goal-9-upload.png')}}" alt="" height="300px; width:100%;">
                        @break
                        @case(10)
                        <img src="{{asset('images/goal-10-upload.png')}}" alt="" height="300px; width:100%;">
                        @break
                        @case(11)
                        <img src="{{asset('images/goal-11-upload.png')}}" alt="" height="300px; width:100%;">
                        @break
                        @case(12)
                        <img src="{{asset('images/goal-12-upload.png')}}" alt="" height="300px; width:100%;">
                        @break
                        @case(13)
                        <img src="{{asset('images/goal-13-upload.png')}}" alt="" height="300px; width:100%;">
                        @break
                        @case(14)
                        <img src="{{asset('images/goal-14-upload.png')}}" alt="" height="300px; width:100%;">
                        @break
                        @case(15)
                        <img src="{{asset('images/goal-15-upload.png')}}" alt="" height="300px; width:100%;">
                        @break
                        @case(16)
                        <img src="{{asset('images/goal-16-upload.png')}}" alt="" height="300px; width:100%;">
                        @break
                        @case(17)
                        <img src="{{asset('images/goal-17-upload.png')}}" alt="" height="300px; width:100%;">
                        @break
                    @default
                    <img src="{{asset('images/goal-17-upload.png')}}" alt="" height="300px; width:100%;">

                @endswitch
            </div>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.about-compnay -->

<div class="about-compnay section-spacing">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="text">
                    <div class="theme-title-one">
                        {{-- <h2>Apa itu SDGs?</h2> --}}
                        <p>{!!$tujuan->deskripsi!!}</p>
                    </div> <!-- /.theme-title-one -->
                </div> <!-- /.text -->
            </div> <!-- /.col- -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.about-compnay -->

<div class="about-compnay section-spacing">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="text">
                    <div class="theme-title-one" style="text-align: left;">
                        <h2>Target</h2>
                        <p>{!!$tujuan->target!!}</p>
                    </div> <!-- /.theme-title-one -->
                </div> <!-- /.text -->
            </div> <!-- /.col- -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.about-compnay -->

@endsection
