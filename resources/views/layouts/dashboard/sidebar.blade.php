<aside class="sidebar">
    <div class="scroll-sidebar">
        <div class="user-profile">
            <div class="dropdown user-pro-body">
                <div class="profile-image">
                    <img src="{{asset('dashboard/user.png')}}" alt="user-img" class="img-circle">
                </div>
                <p class="profile-text m-t-15 font-16"><a href="javascript:void(0);"> {{auth()->user()->name}}</a></p>
            </div>
        </div>
        <nav class="sidebar-nav">
            <ul id="side-menu">
                {{-- <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-basket fa-fw"></i> <span class="hide-menu"> eCommerce </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li> <a href="">Webinar</a> </li>
                        <li> <a href="">Seminars & Conferences</a> </li>
                        <li> <a href="">Pengabdian</a></li>
                        <li> <a href="">Survey</a> </li>
                        <li> <a href="">Buku</a> </li>
                        <li> <a href="{{route('getGaleri')}}">Galeri</a> </li>
                    </ul>
                </li> --}}
                <li>
                    <a href="{{route('dashboard')}}" aria-expanded="false" class="{{(request()->is('admin'))?'active': ''}}"><i class="icon-screen-desktop fa-fw"></i> <span class="hide-menu">Dashboard</span></a>
                </li>
                <li>
                    <a href="{{route('getBanner')}}" aria-expanded="false" class="{{(request()->is('admin/banner*'))?'active': ''}}"><i class="fa fa-picture-o"></i> <span class="hide-menu">Banner</span></a>
                </li>
                <li>
                    <a href="{{route('getBerita')}}" aria-expanded="false" class="{{(request()->is('admin/berita*'))?'active': ''}}"><i class="icon-book-open"></i> <span class="hide-menu">Berita</span></a>
                </li>
                <li>
                    <a href="{{route('getTentang')}}" aria-expanded="false" class="{{(request()->is('admin/tentang*'))?'active': ''}}"><i class="fa fa-dot-circle-o"></i> <span class="hide-menu">Tentang</span></a>
                </li>
                <li>
                    <a href="{{route('getDokumen')}}" aria-expanded="false" class="{{(request()->is('admin/dokumen*'))?'active': ''}}"><i class="fa fa-file"></i> <span class="hide-menu">Dokumen</span></a>
                </li>
                <li>
                    <a class="waves-effect {{(request()->is('admin/publikasi*'))?'active': ''}}" href="javascript:void(0);" aria-expanded="false"><i class="icon-screen-desktop fa-fw"></i> <span class="hide-menu"> Publikasi </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li> <a href="{{route('getJurnal')}}">Jurnal</a> </li>
                        <li> <a href="{{route('getBuku')}}">Buku</a> </li>
                        <li> <a href="{{route('getReport')}}">SDGs Annual Report</a> </li>
                    </ul>
                </li>
                <li>
                    <a class="waves-effect {{(request()->is('admin/kegiatan*'))?'active': ''}}" href="javascript:void(0);" aria-expanded="false"><i class="icon-pin fa-fw"></i> <span class="hide-menu"> Kegiatan </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li> <a href="{{route('getWebinar')}}">Webinar</a> </li>
                        <li> <a href="{{route('getSeminar')}}">Seminars & Conferences</a> </li>
                        <li> <a href="{{route('getPengabdian')}}">Pengabdian</a></li>
                        <li> <a href="{{route('getSurvey')}}">Survey</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="{{route('getResearch')}}" aria-expanded="false" class="{{(request()->is('admin/research*'))?'active': ''}}"><i class="icon-grid"></i> <span class="hide-menu">Research</span></a>
                </li>
                <li>
                    <a href="{{route('getTujuan')}}" aria-expanded="false" class="{{(request()->is('admin/tujuan*'))?'active': ''}}"><i class="fa fa-info"></i> <span class="hide-menu">Tujuan SDGs</span></a>
                </li>
                <li>
                    <a href="{{route('getMitra')}}" aria-expanded="false" class="{{(request()->is('admin/mitra*'))?'active': ''}}"><i class="icon-globe"></i> <span class="hide-menu">Mitra</span></a>
                </li>
                <li>
                    <a href="{{route('getInbox')}}" aria-expanded="false" class="{{(request()->is('admin/inbox*'))?'active': ''}}"><i class="icon-envelope-letter fa-fw"></i> <span class="hide-menu">Inbox</span></a>
                </li>
            </ul>
        </nav>

    </div>
</aside>
