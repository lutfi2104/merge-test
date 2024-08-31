@extends('layouts.dashboard') <!-- Sesuaikan dengan layout yang Anda gunakan -->

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Dept</th>
                        <th>Dok</th>
                        <th>Kode Dokumen</th>
                        <th>Revisi</th>
                        <th>Tanggal Efektif</th>
                        <th>Dibuat Oleh</th>
                        <th>File</th>
                        <th>Actions</th> <!-- Kolom baru untuk Edit dan Delete -->
                        <th>Status</th>
                        <!-- Tambahkan kolom lain sesuai kebutuhan -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sop as $sopItem)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sopItem->judul }}</td>
                            <td>{{ $sopItem->dep->departement }}</td>
                            <td>{{ $sopItem->jenis }}</td>
                            <td>{{ $sopItem->kode_dokumen }}</td>
                            <td>{{ $sopItem->revisi }}</td>
                            <td>{{ $sopItem->tgl_efektif }}</td>
                            <td>

                                {{ $sopItem->pic ? $sopItem->pics->name : '-' }}
                            </td>
                            <td>
                                <a href="{{ asset('storage/files/' . $sopItem->file) }}" class="btn btn-primary btn-sm"
                                    target="_blank">View</a>
                                {{-- <a href="{{ route('sop.viewDocument', ['sop' => $sopItem]) }}" target="_blank">View</a> --}}
                            </td>
                            <td>
                                <div class="gap-2 d-flex justify-content-center">
                                    <a class="mr-2 btn btn-success btn-sm" href="{{ route('sop.show', ['sop' => $sopItem]) }}"
                                        role="button">Detail</a>
                                    @if (auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Admin QC'))
                                        <a href="{{ route('sop.edit', ['sop' => $sopItem]) }}"
                                            class="mr-2 btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('sop.destroy', ['sop' => $sopItem]) }}" method="POST"
                                            id="delete-form{{ $sopItem->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="hapus_data('#delete-form{{ $sopItem->id }}')">Delete</button>
                                        </form>
                                    @endif
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
