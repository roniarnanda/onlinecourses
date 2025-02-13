<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/">
                    <div class="sb-nav-link-icon ">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    Dashboard
                </a>
                @if (auth()->user()->role == 'Murid')
                    <a class="nav-link {{ Request::is('murid') ? 'active' : '' }}" href="/murid">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        Kursus Saya
                    </a>
                @elseif (auth()->user()->role == 'Instruktur')
                    <a class="nav-link {{ Request::is('instruktur') ? 'active' : '' }}" href="/instruktur">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        Kursus Saya
                    </a>
                @else
                    <a class="nav-link {{ Request::is('admin/murid') ? 'active' : '' }}" href="/admin/murid">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        Data Murid
                    </a>
                    <a class="nav-link {{ Request::is('admin/instruktur') ? 'active' : '' }}" href="/admin/instruktur">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        Data Instruktur
                    </a>
                    <a class="nav-link {{ Request::is('admin/transaksi') ? 'active' : '' }}" href="/admin/transaksi">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        Data Transaksi
                    </a>
                @endif
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Masuk sebagai:</div>
            {{ auth()->user()->role }}
        </div>
    </nav>
</div>
