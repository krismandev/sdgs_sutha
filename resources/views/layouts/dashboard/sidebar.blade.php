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
                <li>
                    <a href="{{route('getBanner')}}" aria-expanded="false" class="{{(request()->is('admin/banner*'))?'active': ''}}"><i class="icon-book-open"></i> <span class="hide-menu">Banner</span></a>
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
                    <a href="{{route('getGaleri')}}" aria-expanded="false" class="{{(request()->is('admin/galeri*'))?'active': ''}}"><i class="fa fa-file"></i> <span class="hide-menu">Galeri</span></a>
                </li>
                <li>
                    <a href="{{route('getTujuan')}}" aria-expanded="false" class="{{(request()->is('admin/tujuan*'))?'active': ''}}"><i class="fa fa-file"></i> <span class="hide-menu">Tujuan SDGs</span></a>
                </li>
                <li>
                    <a href="{{route('getMitra')}}" aria-expanded="false" class="{{(request()->is('admin/mitra*'))?'active': ''}}"><i class="fa fa-file"></i> <span class="hide-menu">Mitra</span></a>
                </li>
                <li>
                    <a href="{{route('getInbox')}}" aria-expanded="false" class="{{(request()->is('admin/inbox*'))?'active': ''}}"><i class="fa fa-file"></i> <span class="hide-menu">Inbox</span></a>
                </li>
            </ul>
        </nav>

    </div>
</aside>
