@extends('layouts.frontend.master')
@section('title')
    {{$berita->judul}}
@endsection
<style>
    .our-blog{
        margin-top: 15px;
    }
</style>
@section('content')
<div class="our-blog section-spacing">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-12">
                <div class="post-wrapper blog-details">
                    <div class="single-blog">
                        <div class="image-box">
                            <img src="{{url('images/'.$berita->gambar)}}" alt="">
                            <div class="overlay"><a href="#" class="date">{{date('d M Y',strtotime($berita->created_at))}}</a></div>
                        </div> <!-- /.image-box -->
                        <div class="post-meta">
                            <h5 class="title">{{$berita->judul}}</h5>
                            <p>{!!$berita->konten!!}</p>
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
</div> <!-- /.blog-details -->
@endsection
