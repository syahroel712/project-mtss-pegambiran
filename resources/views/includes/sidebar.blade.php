    <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{ asset('assets/dist/img/logo-swimoc.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Hello World</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('assets/dist/img/logo-swimoc.png') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ session()->get('user_nama') }}</a>
                        <a href="#" class="d-block" style="font-size: 13px;">{{ session()->get('user_jabatan') }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link {{ ($active == 'home') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview {{ ($active == 'kelas' || $active == 'mapel' || $active == 'semester' || $active == 'tahunAjar') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ ($active == 'kelas' || $active == 'mapel' || $active == 'semester' || $active == 'tahunAjar') ? 'active' : '' }}" >
                                <i class="nav-icon fas fa-box-open"></i>
                                <p>
                                    Data Master
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('kelas') }}" class="nav-link {{ ($active == 'kelas') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kelas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('tahunAjar') }}" class="nav-link {{ ($active == 'tahunAjar') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tahun Ajar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('semester') }}" class="nav-link {{ ($active == 'semester') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Semester</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('mapel') }}" class="nav-link {{ ($active == 'mapel') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Mata Pelajaran</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{ ($active == 'siswa' || $active == 'guru' || $active == 'kepsek') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ ($active == 'siswa' || $active == 'guru' || $active == 'kepsek') ? 'active' : '' }}" >
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                    Data User
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('kepsek') }}" class="nav-link {{ ($active == 'kepsek') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kepala Sekolah</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('guru') }}" class="nav-link {{ ($active == 'guru') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Guru</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin') }}" class="nav-link {{ ($active == 'admin') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Admin</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('siswa') }}" class="nav-link {{ ($active == 'siswa') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Siswa</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{ ($active == 'walas' || $active == 'rapor' || $active == 'input-rapor') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ ($active == 'walas' || $active == 'rapor' || $active == 'input-rapor') ? 'active' : '' }}" >
                                <i class="nav-icon fa fa-tasks"></i>
                                <p>
                                    Rapor Siswa
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('walas') }}" class="nav-link {{ ($active == 'walas') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Wali Kelas & Siswa</p>
                                    </a>
                                </li>
                                @if(session()->get('user_jabatan') !=  'Kepala Sekolah' AND session()->get('user_jabatan') !=  'Guru')
                                <li class="nav-item">
                                    <a href="{{ route('rapor.create') }}" class="nav-link {{ ($active == 'input-rapor') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Input Rapor</p>
                                    </a>
                                </li>
                                @endif
                                @if(session()->get('user_jabatan') !=  'Guru')
                                <li class="nav-item">
                                    <a href="{{ route('rapor') }}" class="nav-link {{ ($active == 'rapor') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Rapor</p>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('spp') }}" class="nav-link {{ ($active == 'spp') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-dollar-sign"></i>
                                <p>
                                    Pembayaran SPP
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview {{ ($active == 'profile' || $active == 'info' || $active == '') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ ($active == 'profile' || $active == 'info' || $active == '') ? 'active' : '' }}" >
                                <i class="nav-icon fa fa-school"></i>
                                <p>
                                    Data Sekolah
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('profile') }}" class="nav-link {{ ($active == 'profile') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Profile Sekolah</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('info') }}" class="nav-link {{ ($active == 'info') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Info Sekolah</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
    </aside>
