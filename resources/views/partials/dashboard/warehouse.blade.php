
    <li class="menu-item {{ request()->routeIs('etiket.index') ? 'active' : '' }}">
        <a href="{{ route('etiket.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Support</div>
        </a>
    </li>
    <li
        class="menu-item {{ request()->routeIs('pengujian.*') || request()->routeIs('ujirm.*') ? 'active show open' : '' }}">
        <a href="#" class="menu-link menu-toggle ">
            <i class="menu-icon tf-icons bx bx-layout"></i>
            <div data-i18n="Layouts">CoA & Bahan Baku</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{ request()->routeIs('pengujian.coa') ? 'active' : '' }}">
                <a href="{{ route('pengujian.coa') }}" class="menu-link">
                    <div data-i18n="Without navbar">Daftar CoA</div>
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('ujirm.index') ? 'active' : '' }}">
                <a href="{{ route('ujirm.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-edit-alt"></i>
                    <div data-i18n="Without navbar">Bahan Baku Passed</div>
                </a>
            </li>
        </ul>

    </li>
    <li class="menu-item {{ request()->routeIs('sop.*') ? 'active show open' : '' }}">
        <a href="#" class="menu-link menu-toggle ">
            <i class="menu-icon tf-icons bx bxs-car-wash"></i>
            <div data-i18n="Layouts">Dokumen</div>
        </a>
        <ul class="menu-sub">
            @if (App\Models\Usersop::where('user_id', Auth::user()->id)->exists() ||
                    (auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Admin QC')))
                <li class="menu-item {{ request()->routeIs('sop.create') ? 'active' : '' }}">
                    <a href="{{ route('sop.create') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-edit-alt"></i>
                        <div data-i18n="Without menu">Create Dokumen</div>
                    </a>
                </li>
            @endif
            <li
                class="menu-item {{ request()->routeIs('list.sop') || (request()->routeIs('sop.*') && !request()->routeIs('sop.create')) ? 'active' : '' }}">
                <a href="{{ route('list.sop') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-edit-alt"></i>
                    <div data-i18n="Without navbar">List All</div>
                </a>
            </li>

        </ul>
    </li>
