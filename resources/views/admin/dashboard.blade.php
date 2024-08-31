@extends('layouts.dashboard')

@section('content')
    <style>
        .dropdown-menu {
            max-height: 200px;
            /* Menentukan tinggi maksimum dropdown */
            overflow-y: auto;
            /* Menambahkan scrollbar vertikal jika konten melebihi tinggi maksimum */
        }
    </style>

    <div class="container">
        <form method="GET" action="{{ route('admin.dashboard') }}" id="filterForm">
            <div class="form-group d-flex justify-content-between">
                <div class="mx-2 dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ $selectedJenis }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        @foreach ($jenis as $j)
                            <li>
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.getElementById('selectedJenis').value='{{ $j }}'; document.getElementById('filterForm').submit();">
                                    {{ $j }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <input type="hidden" id="selectedJenis" name="jenis" value="{{ $selectedJenis }}">
                </div>

                <div class="mx-2 dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ $mesin[$selectedMesin] }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                        @foreach ($mesin as $id => $name)
                            <li>
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.getElementById('selectedMesin').value='{{ $id }}'; document.getElementById('filterForm').submit();">
                                    {{ $name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <input type="hidden" id="selectedMesin" name="mesin" value="{{ $selectedMesin }}">
                </div>

                <div class="mx-2 dropdown">
                    <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton4"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ $produkIds[$selectedProdukId] ?? 'Semua Produk' }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                        <li>
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault(); document.getElementById('selectedProdukId').value=''; document.getElementById('filterForm').submit();">
                                Semua Produk
                            </a>
                        </li>
                        @foreach ($produkIds as $id => $name)
                            <li>
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.getElementById('selectedProdukId').value='{{ $id }}'; document.getElementById('filterForm').submit();">
                                    {{ $name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <input type="hidden" id="selectedProdukId" name="produk_id" value="{{ $selectedProdukId }}">
                </div>

                <div class="mx-2 dropdown">
                    <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton4"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ $selectedRange }} Hari
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                        @foreach ($ranges as $range)
                            <li>
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.getElementById('selectedRange').value='{{ $range }}'; document.getElementById('filterForm').submit();">
                                    {{ $range }} Hari
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <input type="hidden" id="selectedRange" name="range" value="{{ $selectedRange }}">
                </div>
            </div>
        </form>
    </div>

    <div class="container mt-4">
        <div id="chart">
            {!! $chart->container() !!}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>
    {!! $chart->script() !!}
@endsection
