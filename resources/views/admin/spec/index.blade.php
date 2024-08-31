@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-md-end mb-4">
                <a class="btn btn-primary" href="{{ route('spec.create') }}" role="button">Tambah Spec Produk</a>
            </div>
            <table class="table myTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th class="text-center" scope="col">Nama</th>
                        <th class="text-center" scope="col">Kadar Air</th>
                        <th class="text-center" scope="col">Bulk Density</th>
                        <th class="text-center" scope="col">Salinity</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($specs as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->produk->name }}</td>
                            <td class="text-center">{{ $item->kadar_air }}</td>
                            <td class="text-center">
                                {{ $item->bulk_density()->min || $item->bulk_density()->max ? $item->bulk_density()->min . ' - ' . $item->bulk_density()->max : '-' }}
                            </td>
                            <td class="text-center">{{ $item->salinity }}</td>
                            <td class="d-flex gap-2">
                                <a class="btn btn-primary text-center" href="{{ route('spec.show', $item->id) }}" role="button">Detail</a>
                                <a class="btn btn-warning text-center" href="{{ route('spec.edit', $item->id) }}"
                                    role="button">Edit</a>
                                <form action="{{ route('spec.destroy', $item->id) }}" method="post" id="form-delete{{ $item->id }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" onclick="hapus_data('#form-delete{{ $item->id }}')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
