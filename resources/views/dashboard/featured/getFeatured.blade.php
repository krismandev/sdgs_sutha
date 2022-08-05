@extends('layouts.dashboard.master')
@section('title')
    Featured
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="white-box">
            <h3 class="box-title">Featured</h3>
            <div class="text-right">
                {{-- <a href="#"><button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah featured</button></a> --}}
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Link</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($featureds->count() != null)
                            @foreach ($featureds as $featured)

                            <tr>
                                <td>{{$featured->judul}}</td>
                                <td>{{$featured->deskripsi}}</td>
                                <td>
                                    <a href="{{url('featured/'.$featured->gambar)}}">
                                        <img src="{{url('featured/'.$featured->gambar)}}" alt="{{$featured->judul}}" style="max-width: 150px;">
                                    </a>
                                </td>
                                <td>{{$featured->link}}</td>
                                <td>
                                    <button class="btn btn-warning edit-featured" 
                                    data-featured_id="{{$featured->id}}" 
                                    data-toggle="modal" 
                                    data-target="#myModal"
                                    data-judul="{{$featured->judul}}"
                                    data-deskripsi="{{$featured->deskripsi}}"
                                    data-link="{{$featured->link}}">Edit</button>
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


{{-- MODAL ADD featured --}}
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Edit</h4> </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{route('postFeatured')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-12">Judul</label>
                            <input type="hidden" name="featured_id" id="featured_id-update" value="">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Deskripsi..." name="judul" value="#" id="judul-update">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Deskripsi</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Deskripsi..." name="deskripsi" value="#" id="deskripsi-update">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Link</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Link..." name="link" value="#" id="link-update">
                            </div>
                        </div>
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
    $(".edit-featured").click(function (e) {
        const featured_id = $(this).data("featured_id");
        const judul = $(this).data("judul");
        const deskripsi = $(this).data("deskripsi");
        const link = $(this).data("link");

        $("#featured_id-update").val(featured_id);
        $("#judul-update").val(judul);
        $("#deskripsi-update").val(deskripsi);
        $("#link-update").val(link);
    });
</script>
@endsection
