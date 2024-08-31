@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-md-end mb-4">
                <a class="btn btn-primary" href="{{ route('produk_supplier.create') }}" role="button">Tambah Jenis bahan Baku</a>
            </div>
            <table class="table myTable">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">No</th>
                        <th class="text-center" scope="col">Kode Jenis</th>
                        <th class="text-center" scope="col">Jenis Produk</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produksuppliers as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->kode_jenis }}</td>
                            <td class="text-center">{{ $item->jenis_produk }}</td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a class="btn btn-warning text-center" href="{{ route('produk_supplier.edit', $item->id) }}" role="button">Edit</a>
                                    <form action="{{ route('produk_supplier.destroy', $item->id) }}" method="post" id="delete-form{{ $item->id }}">
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
