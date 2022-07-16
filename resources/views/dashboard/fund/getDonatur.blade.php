@extends('layouts.dashboard.master')
@section('header')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
<style>
    .status{
        padding: 5px;
        text-align: center;
    }
    .Pending{
        background-color: rgba(255, 255, 0, 30%);
        color: darkorange;
        border: 1px solid darkorange;
    }
    .Denied ,.Expire{
        background-color: rgba(255, 0, 0, 30%);
        color: red;
        border: 1px solid red;
    }
    .Settlement ,.Success{
        background-color: rgba(0, 255, 0, 30%);
        color: green;
        border: 1px solid green;
    }
    .Refund ,.partial_refund{
        background-color: rgba(0, 0, 0, 30%);
        color: blue;
        border: 1px solid blue;
    }
</style>
@endsection
@section('title')
    Halaman Fund
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="white-box">
            <h3 class="box-title">Halaman Fund</h3>
            <div class="text-right">
                <a href="{{route('detailFund',$fund_id)}}"><button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Lihat Detail Fund<i class="fa-solid fa-layer-plus"></i></button></a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" id="data_funds_reguler">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor Hp</th>
                            <th>Jumlah Donasi</th>
                            <th>Tipe Pembayaran</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($donaturs->count() != null)
                            @foreach ($donaturs as $donatur)

                            <tr>
                                <td>{{$donatur->nama}}</td>
                                <td>{{$donatur->email}}</td>
                                <td>{{$donatur->no_hp}}</td>
                                <td>{{$donatur->jumlah}}</td>
                                <td>{{$donatur->payment_type}}</td>
                                <td><div class="status {{$donatur->status}}">{{$donatur->status}}</div></td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                {{ $donaturs->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
@section('linkfooter')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
