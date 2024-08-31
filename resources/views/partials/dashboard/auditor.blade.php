
    <li class="menu-item {{ request()->routeIs('sop.*') ? 'active show open' : '' }}">
        <a href="#" class="menu-link menu-toggle ">
            <i class="menu-icon tf-icons bx bxs-car-wash"></i>
            <div data-i18n="Layouts">Dokumen</div>
        </a>
        <ul class="menu-sub">

            <li class="menu-item {{ request()->routeIs('sop.index') ? 'active' : '' }}">
                <a href="{{ route('sop.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-edit-alt"></i>
                    <div data-i18n="Without navbar">List Dokumen</div>
                </a>
            </li>
        </ul>
    </li>
