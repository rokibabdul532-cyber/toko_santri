<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('/') }}" class="brand-link">
        <span class="brand-text font-weight-light">Toko Santri</span>
    </a>
    
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link {{ ($activeMenu == 'dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
                <!-- Data Karyawan -->
                <li class="nav-item">
                    <a href="{{ url('/karyawan') }}" class="nav-link {{ ($activeMenu == 'karyawan') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Data Karyawan</p>
                    </a>
                </li>
                
                <!-- Menu Penjualan Kitab (Untuk pengembangan selanjutnya) -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Penjualan Kitab</p>
                    </a>
                </li>
                
                <!-- Menu Laporan -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>Laporan</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>