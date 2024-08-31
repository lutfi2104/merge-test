@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-md-end mb-4">
                <a class="btn btn-primary" href="{{ route('nama_produk.create') }}" role="button">Tambah Nama Produk</a>
            </div>
            <table class="table myTable">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">No</th>
                        <th class="text-center" scope="col">Nama Produk</th>
                        <th class="text-center" scope="col">Kode Produk</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nama_produks as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->nama_prd }}</td>
                            <td class="text-center">{{ $item->kode_prd }}</td>
                            <td class="d-flex gap-2">
                                <a class="btn btn-warning text-center" href="{{ route('nama_produk.edit', $item->id) }}"
                                    role="button">Edit</a>
                                <form action="{{ route('nama_produk.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
