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
            .banner-inner-page{
                background-color: #eb1c2d;
            }
        </style>
    @break
    @case(2)
        <style>
            .banner-inner-page{
                background-color: #d3a02a;
            }
        </style>
    @break
    @case(3)
        <style>
            .banner-inner-page{
                background-color: #279b48;
            }
        </style>
    @break
    @case(4)
        <style>
            .banner-inner-page{
                background-color: #c31f33;
            }
        </style>
    @break
    @case(5)
        <style>
            .banner-inner-page{
                background-color: #ef3f2b;
            }
        </style>
    @break
    @case(6)
        <style>
            .banner-inner-page{
                background-color: #04aed9;
            }
        </style>
    @break
    @case(7)
        <style>
            .banner-inner-page{
                background-color: #fdb713;
            }
        </style>
    @break
    @case(8)
        <style>
            .banner-inner-page{
                background-color: #8f1838;
            }
        </style>
    @break
    @case(9)
        <style>
            .banner-inner-page{
                background-color: #f36d25;
            }
        </style>
    @break
    @case(10)
        <style>
            .banner-inner-page{
                background-color: #e01a83;
            }
        </style>
    @break
    @case(11)
        <style>
            .banner-inner-page{
                background-color: #f99d26;
            }
        </style>
    @break
    @case(12)
        <style>
            .banner-inner-page{
                background-color: #cf8e2a;
            }
        </style>
    @break
    @case(13)
        <style>
            .banner-inner-page{
                background-color: #48783e;
            }
        </style>
    @break
    @case(14)
        <style>
            .banner-inner-page{
                background-color: #037dbc;
            }
        </style>
    @break
    @case(15)
        <style>
            .banner-inner-page{
                background-color: #3db049;
            }
        </style>
    @break
    @case(16)
        <style>
            .banner-inner-page{
                background-color: #04558c;
            }
        </style>
    @break
    @case(17)
        <style>
            .banner-inner-page{
                background-color: #183668;
            }
        </style>
    @break

    @default
    <style>
        .banner-inner-page{
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

<div class="single-banner" style="background-color: #04558c; height:400px;">
    <div class="col-lg-12">
        <div class="col-md-7">
            <h3>{{$tujuan->id}}. {{$tujuan->nama}}</h3>
        </div>
        <div class="col-md-5">
            <img src="{{url('images/'.$tujuan->getImage())}}" alt="" style="width: 100px;">
        </div>
    </div>
</div>

@endsection
