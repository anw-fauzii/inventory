<div class="app-sidebar sidebar-shadow bg-asteroid sidebar-text-light">
    <div class="app-header__logo">
        <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>    
    <div class="scrollbar-sidebar" style="overflow-y:scroll;">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Menu Utama</li>
                <li>
                    <a href="{{route('home')}}" class="{{(request()->is('home')) ? 'mm-active' : ''}}">
                        <i class="metismenu-icon pe-7s-home"></i>
                            Beranda
                    </a>
                </li>
                <li>
                    <a href="{{route('seragam.index')}}" class="{{(request()->is('seragam*')) ? 'mm-active' : ''}}">
                        <i class="metismenu-icon pe-7s-wallet"></i>
                            Seragam
                    </a>
                </li>
                <li>
                    <a href="{{route('barang-keluar.index')}}" class="{{(request()->is('barang-keluar*')) ? 'mm-active' : ''}}">
                        <i class="metismenu-icon pe-7s-cloud-upload"></i>
                            Barang Keluar
                    </a>
                </li>
                <li>
                    <a href="{{route('barang-masuk.index')}}" class="{{(request()->is('barang-masuk*')) ? 'mm-active' : ''}}">
                        <i class="metismenu-icon pe-7s-cloud-download"></i>
                            Barang Masuk
                    </a>
                </li>
                <li>
                    <a href="#" class="{{(request()->is('laporan*')) ? 'mm-active' : ''}}">
                        <i class="metismenu-icon pe-7s-display1"></i>
                           Laporan
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="{{(request()->is('laporan*')) ? 'mm-show' : ''}}">
                        <li>
                            <a href="{{route('laporan.keluar')}}" class="{{ 'laporan/Crypt::encrypt(3)' == request()->path ? 'mm-active' : ''}}">
                                <i class="metismenu-icon pe-7s-users"></i>Barang Keluar
                            </a>
                        </li>
                        <li>
                            <a href="{{route('laporan.masuk')}}" class="{{ 'laporan/Crypt::encrypt(5)' == request()->path ? 'mm-active' : ''}}">
                                <i class="metismenu-icon pe-7s-users"></i>Barang Masuk
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="metismenu-icon pe-7s-power"></i>Keluar</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                </li>                 
            </ul>
        </div>
    </div>
</div> 