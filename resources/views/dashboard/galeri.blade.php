@extends('layouts.dashboard.master')
@section('title')
    Galeri
@endsection
@section('content')



<div class="row">
    <div class="col-lg-12">
        <div class="white-box">
            <h3 class="box-title">Halaman Galeri</h3>
            <div class="text-right">
                <a href="#"><button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah dokumen baru</button></a>
            </div>
            <div class="row">
            @if ($galeris->count() !=null)
            @foreach ($galeris as $galeri)
            <div class="col-lg-3">
                <div class="row">
                    <div class="text-right">
                        <button class="btn btn-default copy-link" style="margin-bottom: 5px;" data-link_gambar="{{url('galeri/'.$galeri->gambar)}}">Copy</button>
                        <a href="#">
                            <i class="icon-trash" data-galeri_id="{{$galeri->id}}" style="margin-right: 10%;" style="color: red;"></i>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <img src="{{url('galeri/'.$galeri->gambar)}}" alt="" style="width: 90%; height: 170px;">
                </div>
            </div>
            @endforeach
            @endif
            </div>
        </div>
    </div>
</div>


<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Gambar</h4> </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{route('postGaleri')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-12">Gambar</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control" name="gambar">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-info waves-effect">Simpan</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection
@section('linkfooter')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

    $(".icon-trash").click(function (e) {
        const galeri_id = $(this).data("galeri_id");

        swal({
            title: "Yakin?",
            text: "Mau menghapus gambar ini?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/admin/galeri/delete/"+galeri_id;
            }
        });
    });

    $(".copy-link").click(function (e) {
        let copyText = $(this).data("link_gambar");
        // alert(copyText);
        // copyText.select();
        navigator.clipboard.writeText(copyText);
        // document.execCommand("copy");

        alert("Link gambar telah disalin");
    });
</script>
@endsection
