
    <li class="menu-item {{ request()->routeIs('etiket.index') ? 'active' : '' }}">
        <a href="{{ route('etiket.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Support</div>
        </a>
    </li>
    <li
        class="menu-item {{ request()->routeIs('dd_ccpdry.*') || request()->routeIs('baking_eb.*') || request()->routeIs('nama_produk.*') || request()->routeIs('bintik_hitam.*') ? 'active show open' : '' }}">
        <a href="#" class="menu-link menu-toggle ">
            <i class="menu-icon tf-icons bx bx-layout"></i>
            <div data-i18n="Layouts">Form PRD</div>
        </a>
        <ul class="menu-sub">

            <li class="menu-item {{ request()->routeIs('bintik_hitam.index') ? 'active' : '' }}">
                <a href="{{ route('bintik_hitam.index') }}" class="menu-link">
                    <div data-i18n="Without navbar">Data Drum Drier</div>
                </a>
            </li>
        </ul>
    </li>
