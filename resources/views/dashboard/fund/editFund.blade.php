@extends('layouts.dashboard.master')
@section('title')
    Edit Fund
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Edit Fund</h3>
            <b><p class="text-muted m-b-30 font-13"> {{$fund->tujuan}} </p></b>
            <form class="form-horizontal" action="{{route('updateFund')}}" method="POST" enctype="multipart/form-data">
                @csrf @method('PATCH')
                <div class="form-group">
                    <input type="hidden" value="{{$fund->id}}" name="fund_id">
                    <label class="col-md-12">Tujuan Fund</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Tulis Tujuan disini..." name="tujuan" value="{{$fund->tujuan}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Deskripsi</label>
                    <div class="col-md-12">
                        <textarea class="form-control ckeditor" name="deskripsi" value="{{$fund->desripsi}}">{{$fund->deskripsi}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                <label class="col-md-12">Deadline</label>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="deadline" value="{{$fund->deadline}}">
                    </div>
                </div>
                <div class="form-group">
                <label class="col-md-12">Lokasi</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Tulis Lokasi disini..." name="lokasi" value="{{$fund->lokasi}}">
                    </div>
                </div>
                <div class="form-group">
                <label class="col-md-12">Target</label>
                    <div class="col-md-12">
                        <input type="number" class="form-control"  name="target" value="{{$fund->target}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-12">Gambar</label>
                    <div class="col-sm-6">
                        {{-- <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                            <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                            <input type="file" name="gambar"> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div> --}}
                        <input type="file" class="form-control" name="gambar">
                        <small>Abaikan jika tidak ingin mengubah gambar</small>
                    </div>
                    <div class="col-sm-6">
                        <img src="{{url('fund/img/'.$fund->gambar)}}" alt="" style="width: 100%;">
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
<script src="{{asset('fund/js/currency.js')}} "></script>
@endsection
