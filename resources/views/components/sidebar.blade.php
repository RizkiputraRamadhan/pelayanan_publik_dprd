<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">DPRD</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">DPRD</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
            </li>

            <li class="menu-header">MAIN MENU</li>
            <li class="{{ $type_menu === 'berita' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('berita.index') }}"><i class="fas fa-newspaper"></i>
                    <span>Berita</span></a>
            </li>
            <li class="{{ $type_menu === 'struktur' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('struktur.index') }}"><i class="fas fa-solid fa-folder-tree"></i>
                    <span>Struktur Anggota</span></a>
            </li>
            <li class="{{ $type_menu === 'karir' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('karir.index') }}"><i class="fas fa-solid fa-ranking-star"></i>
                    <span>Karir</span></a>
            </li>
        </ul>

      
    </aside>
</div>
