@extends('layouts.dashboard.master')
@section('title')
    Tambah Berita
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Membuat Fund</h3>
            <p class="text-muted m-b-30 font-13"> </p>
            <form class="form-horizontal" action="{{route('postFund')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="col-md-12">Tujuan Fund</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Tulis tujuan disini..." name="tujuan" value="{{old('tujuan')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Deskripsi</label>
                    <div class="col-md-12">
                        <textarea class="form-control ckeditor" name="deskripsi" value="{{old('deskripsi')}}"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-12">Gambar</label>
                    <div class="col-sm-12">
                        <input type="file" class="form-control" name="gambar" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Deadline</label>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="deadline" value="{{old('deadline')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Lokasi</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Tulis lokasi disini..." name="lokasi" value="{{old('lokasi')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Target</label>
                    <div class="col-md-12">
                        <input type="number" class="form-control" placeholder="Tulis target disini..." name="target" value="{{old('target')}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('linkfooter')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
@endsection
