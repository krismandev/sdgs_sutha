@extends('layouts.frontend.master')
@section('title')
    Berita
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
<div class="blog-inner-page section-spacing">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-12 our-blog">
                <div class="post-wrapper">
                    @if ($beritas->count() != null)
                        @foreach ($beritas as $berita)
                        <div class="single-blog">
                            <div class="image-box">
                                <img src="{{url('images/'.$berita->gambar)}}" alt="" class="blog-image">
                                <div class="overlay"><a href="#" class="date">{{date('d M Y',strtotime($berita->created_at))}}</a></div>
                            </div> <!-- /.image-box -->
                            <div class="post-meta">
                                <h5 class="title"><a href="{{route('showBerita',['id'=>$berita->id,'slug'=>$berita->slug])}}">{{$berita->judul}}</a></h5>
                                <p>{!!Str::limit($berita->konten,200)!!}</p>
                                <a href="{{route('showBerita',['id'=>$berita->id,'slug'=>$berita->slug])}}" class="read-more">Baca selengkapnya...</a>
                            </div> <!-- /.post-meta -->
                        </div> <!-- /.single-blog -->
                        @endforeach
                    @endif
                </div> <!-- /.post-wrapper -->
                <div class="theme-pagination">
                    <ul>
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
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
                        <li class="clearfix">
                            <img src="images/blog/6.jpg" alt="" class="float-left">
                            <div class="post float-left">
                                <a href="blog-details.html">World don't move to beat of just one drum.</a>
                                <div class="date">5 minutes ago</div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <img src="images/blog/7.jpg" alt="" class="float-left">
                            <div class="post float-left">
                                <a href="blog-details.html">Be right for you may not be right for some.</a>
                                <div class="date">2 days ago</div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <img src="images/blog/8.jpg" alt="" class="float-left">
                            <div class="post float-left">
                                <a href="blog-details.html">World don't move to beat of just one drum.</a>
                                <div class="date">1 month ago</div>
                            </div>
                        </li>
                    </ul>
                </div> <!-- /.sidebar-recent-post -->
            </div> <!-- /.col- -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div>
@endsection
