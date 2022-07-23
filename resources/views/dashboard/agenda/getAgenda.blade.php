@extends('layouts.dashboard.master')
@section('header')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
@endsection
@section('title')
    Agenda
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="white-box">
            <h3 class="box-title">Halaman Agenda</h3>
            <div class="text-right">
                <a href="{{route('createAgenda')}}"><button class="btn btn-primary">Tambah agenda</button></a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" id="data_agendas_reguler">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Judul</th>
                            <th>Lokasi</th>
                            <th>Commite</th>
                            <th>Kontak</th>
                            <th>Link Terkait</th>
                            <th>Dokumen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($agendas->count() != null)
                            @foreach ($agendas as $agenda)

                            <tr>
                                <td>{{date('d-m-Y',strtotime($agenda->tanggal))}}</td>
                                <td><a href="#" title="{{$agenda->judul}}">{{Str::limit($agenda->judul,50)}}</a> </td>
                                <td>{{$agenda->lokasi}}</td>
                                <td>{{$agenda->commite}}</td>
                                <td>{{$agenda->kontak}}</td>
                                <td>
                                    <a href="{{$agenda->link_terkait}}" target="_blank">Visit</a>
                                </td>
                                <td>
                                    @if ($agenda->dokumen != null)
                                    <a href="{{url('agenda/'.$agenda->dokumen)}}" target="_blank">Download</a>
                                    @else 
                                     No File
                                    @endif
                                </td>

                                <td>
                                    <a href="{{route('editAgenda',$agenda->id)}}">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>
                                    <button class="btn btn-danger hapus-agenda" data-agenda_id="{{$agenda->id}}">Hapus</button>
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
    $(document).ready(function () {
        $(".hapus-agenda").click(function (e) {
            const agenda_id = $(this).data("agenda_id");

            swal({
                title: "Yakin?",
                text: "Mau menghapus agenda ini?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/admin/agenda/delete/"+agenda_id;
                }
            });
        });
        $('#data_agendas_reguler').DataTable();
    });
</script>
@endsection
