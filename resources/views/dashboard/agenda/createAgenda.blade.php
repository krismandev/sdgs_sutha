@extends('layouts.dashboard.master')
@section('title')
    {{$head_title}}
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">{{$page_title}}</h3>
            {{-- <p class="text-muted m-b-30 font-13"> All bootstrap element classies </p> --}}
            <form class="form-horizontal" action="{{isset($agenda) ? route('postAgenda') : route('updateAgenda')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($agenda))
                @method('PATCH')
                <input type="hidden" name="agenda_id" value="{{$agenda->id}}">
                @endif
                <div class="form-group">
                    <label class="col-md-12">Judul</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Tulis judul disini..." required name="judul" value="{{isset($agenda->judul) ? $agenda->judul : old('judul')}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-6">
                        <label class="col-md-12">Commite</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="" name="commite" value="{{isset($agenda->commite) ? $agenda->commite : old('commite')}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="col-md-12">Lokasi</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="" name="lokasi" value="{{isset($agenda->lokasi) ? $agenda->lokasi : old('lokasi')}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-6">
                        <label class="col-md-12">Tanggal</label>
                        <div class="col-md-12">
                            <input type="date" class="form-control" placeholder="" name="tanggal" required value="{{isset($agenda->tanggal) ? $agenda->tanggal : old('tanggal')}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="col-md-12">Contact Person</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="" name="kontak"value="{{isset($agenda->kontak) ? $agenda->kontak : old('kontak')}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Link Terkait</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="" name="link_terkait" value="{{isset($agenda->link_terkait) ? $agenda->link_terkait : old('link_terkait')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Deskripsi</label>
                    <div class="col-md-12">
                        <textarea class="form-control ckeditor" name="deskripsi" value="{{old('deskripsi')}}">{{isset($agenda->deskripsi) ? $agenda->deskripsi : ''}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-12">Dokumen</label>
                    <div class="col-sm-12">
                        <input type="file" class="form-control" name="dokumen">
                        @if (isset($agenda->dokumen))
                        <small>abaikan jika tidak ingin diubah</small>
                        @endif
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
