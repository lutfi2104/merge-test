@extends('layouts.dashboard')
@section('content')
    @php
        use Carbon\Carbon;
        Carbon::setLocale('id');
    @endphp
    <style>
        .bg-tanggal-produksi {
            background-color: #d4edda !important;
            /* Warna latar belakang untuk kolom tanggal produksi */
        }


        .bg-produk {
            background-color: #f5c6cb !important;
            /* Warna latar belakang untuk kolom produk */
        }
    </style>


    <div class="card">
        <div class="card-body">
            <div class="mb-4 d-flex justify-content-md-between">
                <a class="btn btn-outline-primary" href="{{ route('pengujian.export') }}" role="button">Export</a>
                <a class="btn btn-primary" href="{{ route('pengujian.create') }}" role="button">Create Uji Produk</a>
            </div>
            <table class="table myTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th class="text-center" scope="col">Tanggal Produksi</th>
                        <th class="text-center" scope="col">Tanggal Expired</th>
                        <th class="text-center" scope="col">Shift</th>
                        <th class="text-center" scope="col">Nama Produk</th>
                        <th class="text-center" scope="col">Kode Batch</th>
                        <th class="text-center" scope="col">Sak</th>
                        <th class="text-center" scope="col">Created By</th>
                        @if (auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Admin QC'))
                            <th class="text-center" scope="col">Created At</th>
                        @endif
                        <th class="text-center" scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengujians as $item)
                        <tr>
                            <td class="text-center bg-iteration">{{ $loop->iteration }}</td>

                            <td class="text-center bg-tanggal-produksi">
                                {{ Carbon::parse($item->tanggal_produksi)->isoFormat('dddd, DD-MM-YYYY') }}</td>
                            <td class="text-center bg-tanggal-expired">
                                @php
                                    // Ambil nama produk
                                    $productName = $item->produk->name;
                                    // Ambil tanggal kadaluarsa COA atau fallback ke tanggal kadaluarsa jika COA null
                                    $tanggalExpiredCoa = $item->tanggal_expired_coa
                                        ? date('d-m-Y', strtotime($item->tanggal_expired_coa))
                                        : null;
                                    $tanggalExpired = date('d-m-Y', strtotime($item->tanggal_expired));
                                @endphp

                                @if ($productName === 'WS 700 FR (Code : UNI 12-17)' || $productName === 'Lotuz White Classic')
                                    {{ $tanggalExpiredCoa ?? $tanggalExpired }}
                                @else
                                    {{ $tanggalExpired }}
                                @endif
                            </td>
                            <td class="text-center bg-shift">{{ $item->shift->shift }}</td>
                            <td class="text-center bg-produk">{{ $item->produk->name }}</td>
                            <td class="text-center bg-no-batch">{{ $item->no_batch }}</td>
                            <td class="text-center no-wrap bg-sak" style="white-space: nowrap">
                                {{ $item->sak_awal . '-' . $item->sak_akhir }}</td>
                            <td class="text-center bg-qc">{{ $item->qc }}</td>
                            @if (auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Admin QC'))
                                <td class="text-center bg-created-at">{{ $item->created_at }}</td>
                            @endif

                            <td>
                                <div class="gap-2 d-flex">
                                    <a class="text-center btn btn-primary" href="{{ route('pengujian.show', $item->id) }}"
                                        role="button">Detail</a>
                                    @if (auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Admin QC'))
                                        <a class="text-center btn btn-warning"
                                            href="{{ route('pengujian.edit', $item->id) }}" role="button">Edit</a>
                                        <form action="{{ route('pengujian.destroy', $item->id) }}" method="post"
                                            id="delete-form{{ $item->id }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="hapus_data('#delete-form{{ $item->id }}')">Hapus</button>
                                        </form>
                                    @endif
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
