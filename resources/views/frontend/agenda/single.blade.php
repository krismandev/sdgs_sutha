@extends('layouts.frontend.master')
@section('title')
    {{$agenda->judul}}
@endsection
<style>
    .our-blog{
        margin-top: 15px;
    }

    @media screen and (min-width: 900px) {
        .form-wrapper{
            height: 200px !important;
        }
    }
</style>
@section('content')
<div class="our-blog section-spacing">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-12">
                <div class="post-wrapper blog-details">
                    <div class="single-blog">
                        <div class="post-meta">
                            <h5 class="title">{{$agenda->judul}}</h5>
                            <div class="consultation-form">
                                <div class="container">
                                    <div class="clearfix main-content no-gutters row">
                                        <div class="col-xl-12">
                                            <div class="form-wrapper" style="padding-top: 25px !important; padding-bottom: 25px !important">
                                                <form action="#" class="theme-form-one">
                                                    <div class="row">
                                                        
                                                            <div class="col-xl-4">Commite</div>
                                                            <div class="col-xl-8">: {{$agenda->commite}}</div>

                                                            <div class="col-xl-4">Lokasi</div>
                                                            <div class="col-xl-8">: {{$agenda->lokasi}}</div>

                                                            <div class="col-xl-4">Contsat Person</div>
                                                            <div class="col-xl-8">: {{$agenda->kontak}}</div>
                                                            
                                                            <div class="col-xl-4">Tanggal</div>
                                                            <div class="col-xl-8">: {{date('d-m-Y',strtotime($agenda->tanggal))}}</div>

                                                            <div class="col-xl-4">Link Terkait</div>
                                                            <div class="col-xl-8">: {{$agenda->link_terkait}}</div>

                                                            @if ($agenda->dokumen != null)
                                                                <div class="col-xl-4">
                                                                </div>
                                                                <div class="col-xl-8">
                                                                    <a href="{{url('agenda/'.$agenda->dokumen)}}" style="font-size: 14px;">Download</a>
                                                                </div>

                                                            @endif

                                                        
                                                    </div> <!-- /.row -->
                                                </form>
                                            </div> <!-- /.form-wrapper -->
                                        </div> <!-- /.col- -->
                                    </div> <!-- /.main-content -->
                                </div> <!-- /.container -->
                            </div>
                            <p>{!!$agenda->deskripsi!!}</p>
                        </div> <!-- /.post-meta -->
                        {{-- <div class="share-option clearfix">
                            <ul class="tag-meta float-left">
                                <li><i class="fa fa-tags" aria-hidden="true"></i> Tags :</li>
                                <li><a href="#">Business,</a></li>
                                <li><a href="#">Consulting,</a></li>
                                <li><a href="#">Financial</a></li>
                            </ul>
                            <ul class="social-icon float-right">
                                <li><i class="fa fa-share-alt" aria-hidden="true"></i> Share :</li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            </ul>
                        </div> <!-- /.share-option --> --}}
                    </div> <!-- /.single-blog -->
                </div> <!-- /.post-wrapper -->
                <!-- ==================== Related Post ================= -->

            </div>
            <!-- ===================== Blog Sidebar ==================== -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8 col-12 blog-sidebar" style="padding-left: 20px;">
                <div class="sidebar-container sidebar-search">
                    <form action="#">
                        <input type="text" placeholder="Cari...">
                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div> <!-- /.sidebar-search -->
                <div class="sidebar-container sidebar-recent-post">
                    <h5 class="title">agenda lainnya...</h5>
                    <ul>
                        @if ($agendaLainnya->count() != null)
                        @foreach ($agendaLainnya as $dt)
                        <li class="clearfix">
                            <div class="float-left">
                                <div class="row">
                                    <h4>28</h4>
                                </div>
                                <div class="row">
                                    {{date('M',strtotime($dt->tanggal))}}
                                </div>
                            </div>
                            <div class="post float-left">
                                <a href="{{route('showAgenda',$dt->id)}}">{{Str::limit($dt->judul,100)}}</a>
                                {{-- <div class="date">{{$dt->created_at->diffForHumans()}}</div> --}}
                            </div>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </div> <!-- /.sidebar-recent-post -->
            </div> <!-- /.col- -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.blog-details -->
@endsection
