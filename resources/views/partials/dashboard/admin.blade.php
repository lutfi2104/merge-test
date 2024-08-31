
    <!-- Dashboard -->
    <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <a href="{{ route('admin.dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>
    <li class="menu-item {{ request()->routeIs('etiket.index') ? 'active' : '' }}">
        <a href="{{ route('etiket.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Support</div>

        </a>
    </li>
    <li class="menu-item {{ request()->routeIs('log_activity.index') ? 'active' : '' }}">
        <a href="{{ route('log_activity.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div data-i18n="Analytics">Log Activity</div>
        </a>
    </li>
    <li
        class="menu-item {{ request()->routeIs('supplier.*') || request()->routeIs('namaproduksuppliers.*') || request()->routeIs('produk_supplier.*') ? 'active show open' : '' }}">
        <a href="#" class="menu-link menu-toggle ">
            <i class="menu-icon tf-icons bx bx-food-menu"></i>
            <div data-i18n="Layouts">Master Data RMPM</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{ request()->routeIs('supplier.index') ? 'active show open' : '' }}">
                <a href="{{ route('supplier.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-car-wash"></i>
                    <div data-i18n="Layouts">Supplier</div>
                </a>
            </li>

            <li class="menu-item {{ request()->routeIs('produk_supplier.index') ? 'active show open' : '' }}">
                <a href="{{ route('produk_supplier.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-car-wash"></i>
                    <div data-i18n="Layouts">Jenis Bahan Baku</div>
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('namaproduksuppliers.*') ? 'active show open' : '' }}">
                <a href="{{ route('namaproduksuppliers.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-car-wash"></i>
                    <div data-i18n="Layouts">Nama Bahan Baku</div>
                </a>
            </li>

        </ul>
    </li>
    <li
        class="menu-item {{ request()->routeIs('kriteria.*') || request()->routeIs('template.*') || request()->routeIs('produk.*') || request()->routeIs('spec.*') ? 'active show open' : '' }}">
        <a href="#" class="menu-link menu-toggle ">
            <i class="menu-icon tf-icons bx bx-food-menu"></i>
            <div data-i18n="Layouts">Master Data Produk</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{ request()->routeIs('kriteria.*') ? 'active' : '' }}">
                <a href="{{ route('kriteria.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-car-wash"></i>
                    <div data-i18n="Layouts">Parameter</div>
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('template.*') ? 'active' : '' }}">
                <a href="{{ route('template.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-car-wash"></i>
                    <div data-i18n="Layouts">Jenis Template CoA</div>
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('produk.*') ? 'active' : '' }}">
                <a href="{{ route('produk.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-car-wash"></i>
                    <div data-i18n="Layouts">Produk</div>
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('spec.*') ? 'active' : '' }}">
                <a href="{{ route('spec.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-car-wash"></i>
                    <div data-i18n="Layouts">Spec</div>
                </a>
            </li>
        </ul>
    <li
        class="menu-item {{ request()->routeIs('pengujian.create') || request()->routeIs('pengujian.index') ? 'active show open' : '' }}">
        <a href="#" class="menu-link menu-toggle ">
            <i class="menu-icon tf-icons bx bx-edit-alt"></i>
            <div data-i18n="Layouts">Pengujian Produk</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{ request()->routeIs('pengujian.create') ? 'active' : '' }}">
                <a href="{{ route('pengujian.create') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-edit-alt"></i>
                    <div data-i18n="Without menu">Buat Pengujian</div>
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('pengujian.index') ? 'active' : '' }}">
                <a href="{{ route('pengujian.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-edit-alt"></i>
                    <div data-i18n="Without navbar">Daftar Pengujian</div>
                </a>
            </li>
        </ul>
    </li>
    <li
        class="menu-item {{ request()->routeIs('ujirm.create') || request()->routeIs('ujirm.index') || request()->routeIs('reject') || request()->routeIs('ujirm.edit') || request()->routeIs('hold.rmpm') ? 'active show open' : '' }}">
        <a href="#" class="menu-link menu-toggle ">
            <i class="menu-icon tf-icons bx bxs-car-wash"></i>
            <div data-i18n="Layouts">Pengujian RMPM</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{ request()->routeIs('ujirm.create') ? 'active' : '' }}">
                <a href="{{ route('ujirm.create') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-edit-alt"></i>
                    <div data-i18n="Without menu">Buat Uji RM</div>
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('ujirm.index') ? 'active' : '' }}">
                <a href="{{ route('ujirm.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-edit-alt"></i>
                    <div data-i18n="Without navbar">List Bahan Baku Passed</div>
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('reject') ? 'active' : '' }}">
                <a href="{{ route('reject') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-edit-alt"></i>
                    <div data-i18n="Without navbar">List Bahan Baku Reject</div>
                </a>
            </li>
        </ul>
    </li>
    <li
        class="menu-item {{ request()->routeIs('dd_ccpdry.*') || request()->routeIs('baking_eb.*') || request()->routeIs('nama_produk.*') || request()->routeIs('bintik_hitam.*') ? 'active show open' : '' }}">
        <a href="#" class="menu-link menu-toggle ">
            <i class="menu-icon tf-icons bx bx-layout"></i>
            <div data-i18n="Layouts">Form PRD</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{ request()->routeIs('dd_ccpdry.index') ? 'active' : '' }}">
                <a href="{{ route('dd_ccpdry.index') }}" class="menu-link">
                    <div data-i18n="Without menu">Suhu DD</div>
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('baking_eb.index') ? 'active' : '' }}">
                <a href="{{ route('baking_eb.index') }}" class="menu-link">
                    <div data-i18n="Without navbar">Baking G2</div>
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('bintik_hitam.index') ? 'active' : '' }}">
                <a href="{{ route('bintik_hitam.index') }}" class="menu-link">
                    <div data-i18n="Without navbar">Bintik Hitam</div>
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('nama_produk.index') ? 'active' : '' }}">
                <a href="{{ route('nama_produk.index') }}" class="menu-link">
                    <div data-i18n="Without navbar">Nama Produk</div>
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
    <li class="menu-item {{ request()->routeIs('revisi.show') ? 'active show open' : '' }}">
        <a href="#" class="menu-link menu-toggle ">
            <i class="menu-icon tf-icons bx bxs-car-wash"></i>
            <div data-i18n="Layouts">History Dokumen</div>
        </a>
        <ul class="menu-sub">

            <li class="menu-item {{ request()->routeIs('revisi.show') ? 'active' : '' }}">
                <a href="{{ route('revisi.show') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-edit-alt"></i>
                    <div data-i18n="Without navbar">List Dokumen</div>
                </a>
            </li>

        </ul>
    </li>
    <li class="menu-item {{ request()->routeIs('pengujian.coa') ? 'active' : '' }}">
        <a href="{{ route('pengujian.coa') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bxs-car-wash"></i>
            <div data-i18n="Layouts">Daftar CoA</div>
        </a>
    </li>
    <li class="menu-item {{ request()->routeIs('kalibrasi.*') ? 'active' : '' }}">
        <a href="{{ route('kalibrasi.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bxs-car-wash"></i>
            <div data-i18n="Layouts">Kalibrasi</div>
        </a>
    </li>
    <li class="menu-item {{ request()->routeIs('hold_reject_wip.*') ? 'active' : '' }}">
        <a href="{{ route('hold_reject_wip.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bxs-car-wash"></i>
            <div data-i18n="Layouts">Produk NC</div>
        </a>
    </li>
