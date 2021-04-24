<header class="header-one">
    {{-- <div class="top-header">
        <div class="container clearfix">
            <div class="logo float-left"><a href="index.html"><img src="{{asset('frontend/images/logouin.png')}}" alt="" style="max-height: 70px;"></a></div>
            <div class="address-wrapper float-right">
                <ul>
                    <li class="address">
                        <i class="icon flaticon-placeholder"></i>
                        <h6>Jambi:</h6>
                        <p>Jl. Lintas Jambi-Muara Bulian, Mendalo.</p>
                    </li>
                    <li class="address">
                        <i class="icon flaticon-multimedia"></i>
                        <h6>Email kami:</h6>
                        <p>sdgscenter@uinjambi.ac.id</p>
                    </li>

                </ul>
            </div>
        </div>
    </div>  --}}
    <div class="theme-menu-wrapper">
        <div class="container">
            <div class="bg-wrapper clearfix">
                <!-- ============== Menu Warpper ================ -->
                   <div class="menu-wrapper float-left">
                       <nav id="mega-menu-holder" class="clearfix">
                       <ul class="clearfix">
                            <li class="active"><a href="{{route('index')}}">Beranda</a>
                            </li>
                            <li class="active"><a href="#">Tentang</a>
                                <ul class="dropdown">
                                    <li><a href="{{route('tentang')}}">Tentang SDGs Sutha</a></li>
                                    <li><a href="{{route('petaKampus')}}">Peta Kampus</a></li>
                                    <li><a href="https://www.uinjambi.ac.id" target="_blank">Profil Kampus</a></li>
                               </ul>
                            </li>
                            <li><a href="#">Data</a>
                                <ul class="dropdown">
                                    <li><a href="{{route('dokumen')}}">Dokumen</a></li>
                                    <li><a href="{{route('sosial')}}">Pilar Sosial</a></li>
                                    <li><a href="{{route('ekonomi')}}">Pilar Ekonomi</a></li>
                                    <li><a href="{{route('lingkungan')}}">Pilar Lingkungan</a></li>
                                    <li><a href="{{route('hukum')}}">Pilar Hukum</a></li>
                               </ul>
                            </li>
                            <li><a href="#">Kegiatan</a>
                                <ul class="dropdown">
                                    <li><a href="{{route('webinar')}}">Webinar</a></li>
                                    <li><a href="{{route('seminar')}}">Seminar & Conference</a></li>
                                    <li><a href="{{route('pengabdian')}}">Pengabdian</a></li>
                                    <li><a href="{{route('survey')}}">Survey</a></li>
                                    {{-- <li><a href="project-details.html">SDGs Festival</a></li> --}}
                               </ul>
                            </li>
                            <li><a href="#">Publikasi</a>
                                <ul class="dropdown">
                                    <li><a href="{{route('jurnal')}}">Jurnal</a></li>
                                    <li><a href="{{route('buku')}}">Buku</a></li>
                                    <li><a href="{{route('report')}}">SDGs Annual Report</a></li>

                               </ul>
                            </li>
                            <li><a href="{{route('berita')}}">Berita</a>
                            </li>
                            <li><a href="{{route('kontak')}}">Kontak</a></li>
                       </ul>
                    </nav> <!-- /#mega-menu-holder -->
                   </div> <!-- /.menu-wrapper -->

                   <div class="right-widget float-right">
                       <ul>
                           <li class="social-icon">
                               <ul>
                                <li><a href="https://www.instagram.com/p/CHeWRh7pZ39/?igshid=1k6w1xy12bzns" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                {{-- <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li> --}}
                            </ul>
                           </li>
                           <li class="search-option">
                               <div class="dropdown">
                                   <button type="button" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search" aria-hidden="true"></i></button>
                                <form action="#" class="dropdown-menu">
                                    <input type="text" Placeholder="Enter Your Search">
                                    <button><i class="fa fa-search"></i></button>
                                </form>
                               </div>
                           </li>
                       </ul>
                   </div> <!-- /.right-widget -->
            </div> <!-- /.bg-wrapper -->
        </div> <!-- /.container -->
    </div> <!-- /.theme-menu-wrapper -->
</header>
