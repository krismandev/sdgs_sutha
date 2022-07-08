@extends('layouts.dashboard.master')
@section('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
<style>
    .tombol{
        display: flex;
        width: 35px;
        height: 35px;
        justify-content: center;
        align-items: center;
        border-radius: 5px;
        margin: 10px;
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
                <a href="{{route('createFund')}}"><button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Buat fund baru <i class="fa-solid fa-layer-plus"></i></button></a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" id="data_funds_reguler">
                    <thead>
                        <tr>
                            <th>Tujuan</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Deadline</th>
                            <th>Lokasi</th>
                            <th>Dana Masuk / Target / Persentase</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($funds->count() != null)
                            @foreach ($funds as $fund)

                            <tr>
                                <td>{{$fund->tujuan}}</td>
                                <td>{!!Str::limit($fund->deskripsi,150)!!}</td>
                                <td>
                                    <a href="{{url('fund/img/'.$fund->gambar)}}">
                                        <img src="{{url('fund/img/'.$fund->gambar)}}" alt="{{$fund->tujuan}}" style="max-width: 150px;">
                                    </a>
                                </td>
                                <td>{{$fund->deadline}}</td>
                                <td>{{$fund->lokasi}}</td>
                                <td>{{"Rp " . number_format($fund->dana_masuk,2,',','.')}}  /<br> {{"Rp " . number_format($fund->target,2,',','.')}} /<br> {{explode('.',$fund->dana_masuk/$fund->target*100,2)[0]."%"}}</td>
                                <td>
                                    <a href="{{route('editFund',$fund->id)}}">
                                        <button class="tombol btn-primary edit-fund"><i class="fa-solid fa-pen-to-square"></i></button>
                                    </a>
                                    <a href="{{route('listDonatur',$fund->id)}}">
                                        <button class="tombol btn-info"><i class="fa-solid fa-list"></i></button>
                                    </a>
                                    <a href="#" class="tombol btn-danger hapus-fund" data-fund_id="{{$fund->id}}"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('linkfooter')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

$(".hapus-fund").click(function (e) {
    const fund_id = $(this).data('fund_id');
    swal({
        title: "Yakin?",
        text: "Akan menghapus fund ini?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            window.location = "/admin/fund/delete/"+fund_id;
        }
    });
});

$('#data_funds_reguler').DataTable();
</script>
@endsection
