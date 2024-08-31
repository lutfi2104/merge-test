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

        .signature {
            max-width: 80px;
            /* Adjust the width of the signature image */
            margin-top: 5px;
            margin-bottom: 50px;
            margin-left: 50px;


            /* Add a border to the signature */
        }

        .coa-details {
            list-style: none;
            padding-left: 0;
            margin-top: 100px;
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
            margin-top: -10px;
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
    @foreach ($perintahs as $perintah)
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
                <h1 class="mt-5 text-center">Instruction Form</h1>
            </div>

            <ul class="p-0 mt-7 coa-details" style="list-style: none">
                <li class="d-block lh"><strong>Product Name </strong> : <b>
                        {{ $perintah->produk->name }}</b>
                </li>
                <li class="d-block lh"><strong>Bobot</strong> :
                    <b> {{ $perintah->produk->packaging }}</b>
                </li>
                <li class="d-block lh"><strong>Best Before </strong> :
                    @if ($perintah->produk->name === 'WS 700 FR (Code : UNI 12-17)' || $perintah->produk->name === 'Lotuz White Classic')
                        <b>{{ \Carbon\Carbon::parse($perintah->tanggal_expired_coa)->format('d-m-Y') }}</b>
                    @else
                        <b>{{ \Carbon\Carbon::parse($perintah->tanggal_expired)->format('d-m-Y') }}</b>
                    @endif
                </li>
                <li class="d-block lh"><strong>Kode Batch</strong> :
                    <b>{{ $perintah->no_batch }}</b>
                </li>
            </ul>

            <div class="mt-5 d-flex justify-content-end bogor">
                <div class="text-center col-3">
                    <span>
                        Bogor, {{ \Carbon\Carbon::parse($perintah->tanggal_produksi)->format('d F Y') }}
                    </span>

                    <div class="signature">
                        <b class="border-bottom">Diketahui</b>
                    </div>

                    <br>
                    <b>Leader Production</b>
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
