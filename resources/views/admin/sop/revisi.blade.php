@extends('layouts.dashboard') <!-- Sesuaikan dengan layout yang Anda gunakan -->

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kode Dokumen</th>
                    <th>Revisi</th>
                    <th>Tanggal Efektif</th>
                    <th>Dok</th>
                    <th>Dept</th>
                    <th>File</th>
                    <th>Actions</th> <!-- Kolom baru untuk Edit dan Delete -->
                    <th>Status</th>
                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                </tr>
            </thead>
            <tbody>
                @foreach($revisis as $sopItem)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sopItem->judul }}</td>
                        <td>{{ $sopItem->kode_dokumen }}</td>
                        <td>{{ $sopItem->revisi }}</td>
                        <td>{{ $sopItem->tgl_efektif }}</td>
                        <td>{{ $sopItem->jenis }}</td>
                        <td>{{ $sopItem->dept }}</td>
                        <td>
                            <a href="{{ asset('storage/files/' . $sopItem->file) }}" class="btn btn-primary btn-sm" target="_blank">View</a>
                            {{-- <a href="{{ route('sop.viewDocument', ['sop' => $sopItem]) }}" target="_blank">View</a> --}}
                        </td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">

                                <a class="btn btn-success btn-sm mr-2" href="{{ route('revisi.detail', $sopItem->id) }}" role="button">Detail</a>

                            </div>
                        </td>
                        <td>{{ $sopItem->status }}</td>
                        <!-- Tambahkan kolom lain sesuai kebutuhan -->
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
