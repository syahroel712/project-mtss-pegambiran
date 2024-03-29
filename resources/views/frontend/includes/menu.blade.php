    <header class="header">

            <!-- Top Bar -->
            <div class="top_bar">
                <div class="top_bar_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
                                    <ul class="top_bar_contact_list">
                                        <li>
                                            <div class="question">Punya pertanyaan?</div>
                                        </li>
                                        <li>
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <div>082387354178</div>
                                        </li>
                                        <li>
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            <div>alihsan.pegambiran@yahoo.com</div>
                                        </li>
                                    </ul>
                                    <div class="top_bar_login ml-auto">
                                        <div class="login_button"><a href="{{ route('dashboard') }}">Login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header Content -->
            <div class="header_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="header_content d-flex flex-row align-items-center justify-content-start">
                                <div class="logo_container">
                                    <a href="#">
                                        <div class="logo_text">MTSS <span>Pegambiran</span></div>
                                    </a>
                                </div>
                                <nav class="main_nav_contaner ml-auto">
                                    <ul class="main_nav">
                                        <li class="{{ ($active == 'home') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                                        <div class="dropdown">
                                            <li class="{{ ($active == 'profile') ? 'active' : '' }}"><a href="">Profile</a></li>
                                            <div class="dropdown-content">
                                                @foreach($menu_profile as $no => $mp)    
                                                <a href="{{ route('frontend.profile', $mp->profile_slug) }}">{{ $mp->profile_nama }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <li class="{{ ($active == 'info') ? 'active' : '' }}"><a href="">Informasi</a></li>
                                            <div class="dropdown-content">
                                                @foreach($menu_info as $no => $mi)    
                                                <a href="{{ route('frontend.info', $mi->info_tipe_slug) }}">{{ $mi->info_tipe }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <li class="{{ ($active == 'guru') ? 'active' : '' }}"><a href="{{ route('frontend.guru') }}">Guru</a></li>
                                        <li class="{{ ($active == 'galeri') ? 'active' : '' }}"><a href="{{ route('frontend.galeri') }}">Galeri</a></li>
                                        <li class="{{ ($active == 'kontak') ? 'active' : '' }}"><a href="{{ route('frontend.kontak') }}">Kontak</a></li>
                                    </ul>
                                    <div class="hamburger menu_mm">
                                        <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                                    </div>
                                </nav>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header Search Panel -->
            <div class="header_search_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="header_search_content d-flex flex-row align-items-center justify-content-end">
                                <form action="#" class="header_search_form">
                                    <input type="search" class="search_input" placeholder="Search" required="required">
                                    <button
                                        class="header_search_button d-flex flex-column align-items-center justify-content-center">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Menu -->
        <div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
            <div class="menu_close_container">
                <div class="menu_close">
                    <div></div>
                    <div></div>
                </div>
            </div>
            <nav class="menu_nav">
                <ul class="menu_mm">
                    <li class="menu_mm"><a href="{{ route('home') }}">Home</a></li>
                    @foreach($menu_profile as $no => $mp)    
                    <li class="menu_mm">
                        <a href="{{ route('frontend.profile', $mp->profile_slug) }}">{{ $mp->profile_nama }}</a>
                    </li>
                    @endforeach
                    @foreach($menu_info as $no => $mi)    
                    <li class="menu_mm">
                        <a href="{{ route('frontend.info', $mi->info_tipe_slug) }}">{{ $mi->info_tipe }}</a>
                    </li>
                    @endforeach
                    <li class="menu_mm"><a href="{{ route('frontend.guru') }}">Guru</a></li>
                    <li class="menu_mm"><a href="{{ route('frontend.galeri') }}">Galeri</a></li>
                    <li class="menu_mm"><a href="{{ route('frontend.kontak') }}">Kontak</a></li>
                </ul>
            </nav>
        </div>