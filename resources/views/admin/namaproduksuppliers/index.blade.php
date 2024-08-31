@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-md-end mb-4">
                <a class="btn btn-primary" href="{{ route('namaproduksuppliers.create') }}" role="button">Tambah Data Bahan Baku</a>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <table class="table myTable">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">No</th>
                        <th class="text-center" scope="col">Produsen</th>
                        <th class="text-center" scope="col">Jenis Bahan</th>
                        <th class="text-center" scope="col">Nama Bahan</th>
                        <th class="text-center" scope="col">Berat</th>
                        <th class="text-center" scope="col">Kemasan</th>
                        <th class="text-center" scope="col">Halal By</th>
                        <th class="text-center" scope="col">Masa Berlaku Halal</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($namaproduksuppliers as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->supplier->nama_produsen }}</td>
                            <td class="text-center">{{ $item->produk_supplier->jenis_produk }}</td>
                            <td class="text-center">{{ $item->nama_produk }}</td>
                            <td class="text-center">{{"{$item->berat} {$item->satuan}" }}</td>
                            <td class="text-center">{{ $item->kemasan }}</td>
                            <td class="text-center">{{ $item->by_halal }}</td>
                            <td class="text-center">{{ $item->masa_halal }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a class="btn btn-warning text-center" href="{{ route('namaproduksuppliers.edit', $item->id) }}" role="button">Edit</a>
                                    <form action="{{ route('namaproduksuppliers.destroy', $item->id) }}" method="post" id="delete-form{{ $item->id }}">
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
