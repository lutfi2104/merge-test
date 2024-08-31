<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />


    <title>{{ $title }}</title>

    <meta name="description" content="" />



    <!-- Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    @include('partials.css')
    <style>
        .app-brand-logo img {
            width: 150px;
            /* Ganti dengan lebar yang Anda inginkan */
            height: 70px;
            /* Ganti dengan tinggi yang Anda inginkan */
        }
    </style>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles --}}
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{ url('https://berkatcahayanovena.id/id/') }}" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="/sneat/assets/img/logo/Fotoram.io.png"
                                alt="https://berkatcahayanovena.id/id/cc-content/themes/cicool/asset/bcn/img/icon/logo.svg" />
                        </span>
                        {{-- <span class="app-brand-text demo menu-text fw-bolder ms-2">SIAF</span> --}}
                    </a>

                    <a href="{{ url('javascript:void(0);') }}"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="align-middle bx bx-chevron-left bx-sm"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>
                <ul class="py-1 menu-inner">
                    @include('partials.dashboard.master')
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme "
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="px-0 nav-item nav-link me-xl-4" href="{{ url('javascript:void(0)') }}">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>




                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        {{-- <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" class="border-0 shadow-none form-control" placeholder="Search..."
                                    aria-label="Search..." />
                            </div>
                        </div> --}}
                        <!-- /Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                @php
                                    use Jenssegers\Agent\Facades\Agent;
                                @endphp
                                @if (Agent::isDesktop())
                                    <div style="font-size: 1.5em;">{{ auth()->user()->name }}</div>
                                @elseif (Agent::isMobile())
                                    <small>{{ auth()->user()->name }}</small>
                                @endif
                            </div>
                        </div>


                        <ul class="flex-row navbar-nav align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->
                            {{-- <li class="nav-item lh-1 me-3">
                                <a class="github-button"
                                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                                    data-icon="octicon-star" data-size="large" data-show-count="true"
                                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub">Star</a>
                            </li> --}}

                            <!-- User -->



                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="{{ url('javascript:void(0);') }}"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="/sneat/assets/img/logo/siaf_logo_3-removebg-preview.png" alt
                                            class="h-auto w-px-40 rounded-circle" />
                                    </div>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="{{ url('#') }}">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="/sneat/assets/img/logo/Fotoram.io.png" alt
                                                            class="h-auto w-px-40 rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">{{ auth()->user()->name }}</span>
                                                    <small
                                                        class="text-muted">{{ implode('|', auth()->user()->getRoleNames()->toArray()) }}</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">Profil Saya</span>
                                        </a>
                                    </li>


                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="post" id="logout_form">
                                            @csrf
                                            <div class="dropdown-item" onclick="logout('#logout_form')">
                                                <i class="bx bx-power-off me-2"></i>
                                                <span class="align-middle">Log Out</span>
                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div>
                            <h3>{{ $title }}</h3>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                <strong>Berhasil !</strong> {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                <strong>Gagal !</strong> {{ session('error') }}
                            </div>
                        @endif
                        @yield('content')
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        {{-- <div
                            class="flex-wrap py-2 container-xxl d-flex justify-content-between flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                , made with ❤️ by
                                <a href="https://themeselection.com" target="_blank"
                                    class="footer-link fw-bolder">ThemeSelection</a>
                            </div>
                            <div>
                                <a href="https://themeselection.com/license/" class="footer-link me-4"
                                    target="_blank">License</a>
                                <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More
                                    Themes</a>

                                <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                                    target="_blank" class="footer-link me-4">Documentation</a>

                                <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                                    target="_blank" class="footer-link me-4">Support</a>
                            </div>
                        </div> --}}
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    @include('partials.js')

    {{-- @livewireScripts --}}

</body>

</html>
