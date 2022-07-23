@extends('layouts.frontend.master')
@section('title')
    Agenda
@endsection
@section('content')
<style>
    .blog-image{
        max-height: 500px;
    }

    .blog-inner-page{
        margin-top: 30px;
    }
</style>
<div class="service-details section-spacing">
    <div class="container">
        <div class="row">
            @if ($agendas->count() != null)
            <div class="col-xl-9 col-lg-8 col-12 our-blog">
                <div class="service-content">
                    {{-- <div class="presentation-section">
                        <div class="row">
                            <div class="col-md-10 col-12">
                                <ul class="best-list-item">
                                    @if ($agendas->count() > 0)
                                    @foreach ($agendas as $agenda)
                                        <li>
                                            <div class="icon">
                                                <h3 style="">28</h3>
                                            </div>
                                            <h5 style="">{{$agenda->judul}}</h5>
                                            <p style="line-height: 2px !important;">{!!Str::limit($agenda->deskripsi,100)!!}</p>
                                            <p>{{date('d-M-Y',strtotime($agenda->tanggal))}}</p>
                                        </li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                    <div class="market-growth">
                        <div class="wrapper">
                            @if ($agendas->count() > 0)
                                @foreach ($agendas as $agenda)
                                <div class="row">
                                    <div class="col-xl-2 col-md-5 col-12">
                                        <div style="margin: 0; position: absolute; top: 50%; left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
                                            <h2>{{date('d',strtotime($agenda->tanggal))}}</h2>
                                            <p>{{date('M Y',strtotime($agenda->tanggal))}}</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-10 col-md-7 col-12">
                                        <h5 style="margin: 0; padding: 0;"><a href="{{route('showAgenda', $agenda->id)}}">{{$agenda->judul}}</a></h5>
                                        {{-- <small>{{date('d M Y',strtotime($agenda->tanggal))}}</small> --}}
                                        <p style="margin: 0px; padding: 0px;">{!!Str::limit($agenda->deskripsi,200)!!}</p>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div> <!-- /.wrapper -->
                    </div>
                </div>
                <div class="theme-pagination">
                    <ul>
                        {{$agendas->links()}}
                    </ul>
                </div>
            </div>
            @endif
            <!-- ===================== Blog Sidebar ==================== -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8 col-12 blog-sidebar">
                <div class="sidebar-container sidebar-search">
                    <form action="#">
                        <input type="text" placeholder="Cari...">
                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div> <!-- /.sidebar-search -->
                <div class="sidebar-container sidebar-recent-post">
                    <h5 class="title">Berita lainnya...</h5>
                    <ul>
                        @if ($beritaLainnya->count() != null)
                        @foreach ($beritaLainnya as $berita)
                        <li class="clearfix">
                            <img src="{{url('images/'.$berita->gambar)}}" alt="" class="float-left">
                            <div class="post float-left">
                                <a href="{{route('showBerita',['id'=>$berita->id,'slug'=>$berita->slug])}}">{{Str::limit($berita->judul,100)}}</a>
                                <div class="date">{{$berita->created_at->diffForHumans()}}</div>
                            </div>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </div> <!-- /.sidebar-recent-post -->
            </div> <!-- /.col- -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div>
@endsection
