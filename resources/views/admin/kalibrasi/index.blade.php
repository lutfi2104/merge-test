@extends('layouts.dashboard')
@section('content')
    <style>
        .custom-bg-success {
            background-color: #006400;
            /* Warna hijau yang lebih tua, Anda dapat mengganti kode warna ini sesuai kebutuhan */
        }
    </style>


    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-md-end mb-4">
                <a class="btn btn-primary" href="{{ route('kalibrasi.create') }}" role="button">Tambah Alat Kalibrasi</a>
            </div>
            <table class="table myTable">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">No</th>
                        <th class="text-center" scope="col">Nama Alat</th>
                        <th class="text-center" scope="col">Rentang Ukur</th>
                        <th class="text-center" scope="col">Penempatan</th>
                        <th class="text-center" scope="col">Kalibrasi</th>
                        <th class="text-center" scope="col">Verifikasi</th>
                        <th class="text-center" scope="col">Kalibrasi Berikutnya</th>
                        <th class="text-center" scope="col">Sertifikat</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kalibrasis as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->nama_alat }}</td>
                            <td class="text-center">{{ $item->rentang_ukur }}</td>
                            <td class="text-center">{{ $item->tempat }}</td>
                            <td class="text-center">{{ $item->kalibrasi }}</td>
                            <td class="text-center">{{ $item->verifikasi }}</td>
                            <td>
                                <div class="text-center"
                                    style="background-color:
                                    @php
$tglKalibrasi = \Carbon\Carbon::parse($item->tgl_kalibrasi);
                                        $sekarang = \Carbon\Carbon::now();
                                        $selisihHari = $tglKalibrasi->diffInDays($sekarang);

                                        $bgColor = '';
                                        $textColor = '';

                                        if ($tglKalibrasi->lessThan($sekarang)) {
                                            $bgColor = 'red'; // Tanggal kalibrasi sudah lewat, berwarna merah
                                            $textColor = 'white'; // Tulisan warna putih
                                        } elseif ($selisihHari < 30) {
                                            $bgColor = 'red'; // Kurang dari 30 hari, berwarna hijau
                                            $textColor = 'white'; // Tulisan warna putih
                                        } elseif ($selisihHari < 90) {
                                            $bgColor = 'yellow'; // 30-89 hari, berwarna kuning
                                            $textColor = 'black'; // Tulisan warna hitam
                                        } else {
                                            $bgColor = 'green'; // 90 hari atau lebih, berwarna putih
                                            $textColor = 'white'; // Tulisan warna hitam
                                        }

                                        echo $bgColor . '; color: ' . $textColor; @endphp
                                ; border-radius: 10px; padding: 5px;">
                                    {{ $tglKalibrasi->format('d-m-Y') }}
                                </div>
                            </td>

                            <td class="text nowrap text-center justify-content-center">
                                <div class="d-flex gap-2 justify-content-center btn btn-primary p-2">
                                    <a href="{{ route('kalibrasi.sertifikat', $item->id) }}" target="_blank"
                                        class="text-white">View</a>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a class="btn btn-success text-center" href="{{ route('kalibrasi.show', $item->id) }}"
                                        role="button">Detail</a>
                                    <a class="btn btn-warning text-center" href="{{ route('kalibrasi.edit', $item->id) }}"
                                        role="button">Edit</a>
                                    <form action="{{ route('kalibrasi.destroy', $item->id) }}" method="post" id="delete-form{{ $item->id }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" onclick="hapus_data('#delete-form{{ $item->id }}')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
