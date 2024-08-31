<!doctype html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        /* * {

            border: 1px solid red
        } */

        .lh {
            margin-top: -5px
        }



        @media print {
            .page-break {
                display: block;
                page-break-after: auto;
                page-break-inside: avoid;
                page-break-before: always;
                max-width: 100%;

            }

            .page-break:last-child {
                page-break-after: always;
            }

            @page {
                size: A4;
                margin: 0;
            }

            .d-print-none {
                display: none
            }

            td,
            th {
                border-width: 1px !important;
                border-color: black !important
            }

            thead {
                /* background-color: rgb(255, 102, 0) !important; */
                -webkit-print-color-adjust: exact;
                /* Untuk browser WebKit seperti Chrome dan Safari */
                color-adjust: exact;
                /* Untuk browser lainnya */
            }

            body {
                width: 210mm;
                height: 296mm;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                overflow: hidden;
                Prevent content overflow
                /* font-size: 1000pt; */
            }

            table {
                font-size: inherit;
                /* Gunakan ukuran font yang sama dengan body untuk tabel */
                width: 100%;
                /* Pastikan tabel mengisi lebar penuh konten */
                border-collapse: collapse;
                /* Agar batas sel (border) terlihat baik */
            }

            .signature img {
                page-break-inside: avoid;
                /* Hindari pemotongan elemen di dalam halaman */

            }

            .kriteria {
                padding-top: 0 !important;
                /* py-0 untuk padding atas 0 */
                text-align: left !important;
                /* text-center untuk teks tengah */
                /* white-space: nowrap !important; no-wrap untuk mencegah wrapping teks */
            }




        }

        .signature img {
            max-width: 80px;
            /* Adjust the width of the signature image */
            margin-top: 5px;
            margin-left: 5px;


            /* Add a border to the signature */
        }

        .coa-details {
            list-style: none;
            padding-left: 0;
            margin-top: 20px;
            /* Add space between name/title and details */
        }

        .coa-details li {
            margin-bottom: 10px;
            /* Add space between list items */
        }

        .coa-details strong {
            display: inline-block;
            width: 150px;
            /* Adjust as needed for alignment */
        }

        Style for colons .coa-details strong::after {
            content: ":";
            margin-left: 10px;
        }

        .logo-bcn {
            margin-bottom: -500;
            margin-top: -50px;
        }

        .coa-nama {
            margin-top: -50px;
            margin-bottom: -40px;
        }

        .rekom-penyimpanan {
            margin-top: -10px;
            margin-bottom: -40px;
        }

        td,
        th {
            border-width: 1px !important;
            border-color: black !important;
            font-size: 15px;


        }

        .head-table {
            font-size: 15px;
        }

        body {
            width: 21cm;
            /* height: 29.7cm; */
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            /* overflow: hidden; Prevent content overflow */
            font-size: 10pt;
        }
    </style>
</head>

<body>
    @foreach ($coas as $coa)
        {{-- @dd($coa); --}}
        <div class="container my-5 page-break">
            <div class="d-flex justify-content-between logo-bcn">
                <div style="margin-top: 20px;">
                    <img src="https://berkatcahayanovena.id/id/cc-content/themes/cicool/asset/bcn/img/icon/logo.svg"
                        alt="" width="100px">
                </div>
                <div style="margin-top: 20px;">
                    <ul style="list-style: none; max-width:300px" class="p-0">
                        <li>
                            <h6>PT Berkat Cahaya Novena</h6>
                        </li>
                        <li>
                            <small class="d-block lh">Jl Teratai Kp Cikoleang</small>
                            <small class="d-block lh">Rt 002 RW 002</small>
                            <small class="d-block lh">Pabuaran, Gunung Sindur</small>
                            <small class="d-block lh">Kabupaten bogor indonesia</small>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- @php
                $buah = [
                    'buah' => ['mangga', 'pisang'],
                    'buah b' => ['jambu', 'pepaya'],
                ];
                $buah['buah b'][1];
            @endphp --}}

            <div class="coa-nama">
                <h1 class="mt-5 text-center">Certificate Of Analysis</h1>
            </div>

            <ul class="p-0 mt-5 coa-details" style="list-style: none">
                <li class="d-block lh"><strong>Product Name </strong> : <b>
                        {{ $coa['pengujian']->produk->name }}</b>
                </li>
                <li class="d-block lh"><strong>Packaging Size </strong> :
                    <b> {{ $coa['pengujian']->produk->packaging }}</b>
                </li>
                <li class="d-block lh">
                    <strong>Best Before </strong> :
                    @if ($coa['pengujian']->produk->name === 'WS 700 FR (Code : UNI 12-17)' || $coa['pengujian']->produk->name === 'Lotuz White Classic')
                    <b>{{ \Carbon\Carbon::parse($coa['pengujian']->tanggal_expired_coa ?? $coa['pengujian']->tanggal_expired)->format('d F Y') }}</b>
                    @else
                        <b>{{ \Carbon\Carbon::parse($coa['pengujian']->tanggal_expired)->format('d F Y') }}</b>
                    @endif
                </li>
                <li class="d-block lh"><strong>Kode Batch</strong> : <b>{{ $coa['coa']->no_batch_coa }}</b>
                </li>
            </ul>
            <div class="table-responsive">

                <table class="table mt-20 table-bordered">
                    <thead style="background-color: rgb(255, 102, 0)" class="text-white">
                        <tr class="text-center">
                            <th scope="col" class="head-table">Parameter</th>
                            <th scope="col" class="head-table">Spesification</th>
                            <th scope="col" class="head-table" style="white-space: nowrap; text-align: center;">
                                Result</th>

                        </tr>
                    </thead>
                    <tbody>
                        {{-- @dd($coa['pengujian']->produk->kriterias()); --}}
                        @foreach ($coa['pengujian']->produk->kriterias() as $kriteria)
                            <tr class="">
                                <td scope="row" class="py-0 kriteria">{{ $kriteria->name }}</td>
                                <td class="py-0 kriteria">
                                    @switch($kriteria->name)
                                        @case('Appearance')
                                            {{ $coa['pengujian']->produk->appearance }}
                                        @break

                                        @case('Taste')
                                            {{ $coa['pengujian']->produk->taste }}
                                        @break

                                        @case('Flavor')
                                            {{ $coa['pengujian']->produk->flavor }}
                                        @break

                                        @case('Texture')
                                            {{ $coa['pengujian']->produk->texture }}
                                        @break

                                        @case('Color')
                                            {{ $coa['pengujian']->produk->color }}
                                        @break

                                        @case('Granule Shape')
                                            {{ $coa['pengujian']->produk->granule }}
                                        @break

                                        @case('Partical Size (mm)')
                                            {{ $coa['pengujian']->produk->partical_size }}
                                        @break

                                        @case('Salinity %')
                                            Max {{ $coa['pengujian']->produk->spec->salinity }}
                                        @break

                                        @case('Bulk Density (g/ml)')
                                            @php
                                                $bulkDensity = $coa['pengujian']->produk->spec->bulk_density;
                                                $bulkDensityArray = json_decode($bulkDensity, true);
                                            @endphp

                                            @if (is_array($bulkDensityArray) && isset($bulkDensityArray['min']) && isset($bulkDensityArray['max']))
                                                {{ $bulkDensityArray['min'] }} - {{ $bulkDensityArray['max'] }}
                                            @else
                                                <span>Tidak ada data</span>
                                            @endif
                                        @break

                                        @case('Moisture %')
                                            Max {{ $coa['pengujian']->produk->spec->kadar_air }}
                                        @break

                                        @case('Particle Size Distribution:<Mesh No.4 (%)')
                                            Max {{ $coa['pengujian']->produk->spec->mesh_4 }}
                                        @break

                                        @case('Particle Size Distribution:Mesh No.4 - No 6(%)')
                                            Min {{ $coa['pengujian']->produk->spec->mesh_4_6 }}
                                        @break

                                        @case('Particle Size Distribution:<Mesh No. 3 (%)')
                                            {{ $coa['pengujian']->produk->spec->mesh_3 }}
                                        @break

                                        @case('Particle Size Distribution:Mesh No. 3 – No.5 (%)')
                                            {{ $coa['pengujian']->produk->spec->mesh_3_5 }}
                                        @break

                                        @case('Particle Size Distribution:> Mesh No 20 (%)')
                                            Min {{ $coa['pengujian']->produk->spec->mesh_20 }}
                                        @break

                                        @case('Particle Size Distribution: Mesh No. 5 – No.6 (%)')
                                            Min {{ $coa['pengujian']->produk->spec->mesh_5_6 }}
                                        @break

                                        @case('Particle Size Distribution: Mesh No 20 (%) Max')
                                            Max {{ $coa['pengujian']->produk->spec->mesh_20_max }}
                                        @break

                                        @case('Particle Size Distribution:< Mesh No 40 (%)')
                                            Max {{ $coa['pengujian']->produk->spec->mesh_40 }}
                                        @break

                                        @case('Particle Size Distribution: Mesh No 1/4 (%)')
                                            Max {{ $coa['pengujian']->produk->spec->mesh_1_4 }}
                                        @break

                                        @case('Particle Size Distribution:Mesh No. 1/4 – No.5 (%)')
                                            Min {{ $coa['pengujian']->produk->spec->mesh_1_4_5 }}
                                        @break

                                        @case('Particle Size Distribution:Mesh No. 6 (%)')
                                            Max {{ $coa['pengujian']->produk->spec->mesh_6 }}
                                        @break

                                        @case('Particle Size Distribution:Mesh No. 6 – No.10 (%)')
                                            Min {{ $coa['pengujian']->produk->spec->mesh_6_10 }}
                                        @break

                                        @case('Filth and insect infestation')
                                            {{ $coa['pengujian']->produk->filth_insect }}
                                        @break

                                        @case('Screen (mm)')
                                            {{ $coa['pengujian']->produk->screen_mm }}
                                        @break

                                        @case('ALT (colony/g)')
                                            Max {!! App\Models\Pengujian::pangkat($coa['pengujian']->produk->spec->tpc, true) !!}
                                        @break

                                        @case('Enterobacteriaceae (colony/g)')
                                            Max {!! App\Models\Pengujian::pangkat($coa['pengujian']->produk->spec->entero, true) !!}
                                        @break

                                        @case('Salmonella sp. (/25g)')
                                            {!! $coa['pengujian']->produk->spec->salmonella == 0 ? 'Negative' : $coa['pengujian']->produk->spec->salmonella !!}
                                        @break

                                        @case('Yeast Mould (colony/g)')
                                            Max {!! App\Models\Pengujian::pangkat($coa['pengujian']->produk->spec->ym, true) !!}
                                        @break

                                        @default
                                    @endswitch
                                </td>
                                <td class="py-0 text-center kriteria"
                                    style="text-align: center !important; white-space: nowrap !important;">
                                    @switch($kriteria->name)
                                        @case('Appearance')
                                            <b>Meet Standard</b>
                                        @break

                                        @case('Taste')
                                            <b>Meet Standard</b>
                                        @break

                                        @case('Flavor')
                                            <b>Meet Standard</b>
                                        @break

                                        @case('Texture')
                                            <b>Meet Standard</b>
                                        @break

                                        @case('Color')
                                            <b>Meet Standard</b>
                                        @break

                                        @case('Granule Shape')
                                            <b>Meet Standard</b>
                                        @break

                                        @case('Partical Size (mm)')
                                            <b>Meet Standard</b>
                                        @break

                                        @case('Salinity %')
                                            {{ number_format($coa['coa']->salinity, 2) }}
                                        @break

                                        @case('Bulk Density (g/ml)')
                                            {{ number_format($coa['coa']->bulk_density, 2) }}
                                        @break

                                        @case('Moisture %')
                                            {{ number_format($coa['coa']->kadar_air, 2) }}
                                        @break

                                        @case('Particle Size Distribution:<Mesh No.4 (%)')
                                            {{ number_format($coa['coa']->mesh_4, 0, '', '') }}
                                        @break

                                        @case('Particle Size Distribution:Mesh No.4 - No 6(%)')
                                            {{ number_format($coa['coa']->mesh_4_6, 0, '', '') }}
                                        @break

                                        @case('Particle Size Distribution:<Mesh No. 3 (%)')
                                            {{ number_format($coa['coa']->mesh_3, 0, '', '') }}
                                        @break

                                        @case('Particle Size Distribution:Mesh No. 3 – No.5 (%)')
                                            {{ number_format($coa['coa']->mesh_3_5, 0, '', '') }}
                                        @break

                                        @case('Particle Size Distribution:> Mesh No 20 (%)')
                                            {{ number_format($coa['coa']->mesh_20, 0, '', '') }}
                                        @break

                                        @case('Particle Size Distribution:< Mesh No 40 (%)')
                                            {{ number_format($coa['coa']->mesh_40, 0, '', '') }}
                                        @break

                                        @case('Particle Size Distribution: Mesh No 20 (%) Max')
                                            {{ number_format($coa['coa']->mesh_20_max, 0, '', '') }}
                                        @break

                                        @case('Particle Size Distribution: Mesh No. 5 – No.6 (%)')
                                            {{ number_format($coa['coa']->mesh_5_6, 0, '', '') }}
                                        @break

                                        @case('Particle Size Distribution: Mesh No 1/4 (%)')
                                            {{ number_format($coa['coa']->mesh_1_4, 0, '', '') }}
                                        @break

                                        @case('Particle Size Distribution:Mesh No. 1/4 – No.5 (%)')
                                            {{ number_format($coa['coa']->mesh_1_4_5, 0, '', '') }}
                                        @break

                                        @case('Particle Size Distribution:Mesh No. 6 (%)')
                                            {{ number_format($coa['coa']->mesh_6, 0, '', '') }}
                                        @break

                                        @case('Particle Size Distribution:Mesh No. 6 – No.10 (%)')
                                            {{ number_format($coa['coa']->mesh_6_10, 0, '', '') }}
                                        @break

                                        @case('Filth and insect infestation')
                                            <b>Negative</b>
                                        @break

                                        @case('Screen (mm)')
                                            <b>Meet Standard</b>
                                        @break

                                        @case('ALT (colony/g)')
                                            {!! $coa['coa']->tpc !!}
                                        @break

                                        @case('Enterobacteriaceae (colony/g)')
                                            {!! $coa['coa']->entero !!}
                                        @break

                                        @case('Salmonella sp. (/25g)')
                                            {!! $coa['coa']->salmonella !!}
                                        @break

                                        @case('Yeast Mould (colony/g)')
                                            {!! $coa['coa']->ym !!}
                                        @break

                                        @default
                                    @endswitch
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="rekom-penyimpanan">
                @switch($coa['pengujian']->produk->jenis)
                    @case('Dry Breadcrumbs')
                        <p>
                            Keep in dry, well ventilated place, away from light & heat. Recommended
                            storage at room temperature.
                        </p>
                    @break

                    @case('Fresh Breadcrumbs')
                        <p>
                            The recommended storage are dry, well ventilated place, away from light & heat, with temperature
                            -18&deg;C.
                        </p>
                    @break

                    @case('Bubblecrumbs')
                        <p>
                            Keep in dry, well ventilated place, away from light & heat. Recommended
                            storage at room temperature.
                        </p>
                    @break

                    @case('Consumer Pack')
                        <p>
                            Keep in dry, well ventilated place, away from light & heat. Recommended
                            storage at room temperature.
                        </p>
                    @break

                    @default
                @endswitch
            </div>
            <div class="mt-5 d-flex justify-content-end bogor">
                <div class="text-center col-3">
                    <span>
                        Bogor, {{ \Carbon\Carbon::parse($coa['pengujian']->tanggal_produksi)->format('d F Y') }}
                    </span>

                    <div class="signature">
                        <img src="{{ URL::asset('/ttd_lutfi.jpg') }}" alt="Signature">
                    </div>
                    <b class="border-bottom">Muhammad Lutfi Abdullah</b>
                    <br>
                    <b>QA/QC Jr Spv</b>
                </div>
            </div>


        </div>
        <hr class="d-print-none">
    @endforeach
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>

</body>


</html>
