@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-md-end mb-4">
            <a class="btn btn-primary" href="{{ route('supplier.create') }}" role="button">Tambah Supplier</a>
        </div>
        <table class="table myTable">
            <thead>
                <tr>
                    <th class="text-center" scope="col">No</th>
                    <th class="text-center" scope="col">Nama Produsen</th>
                    <th class="text-center" scope="col">Asal Produsen</th>
                    <th class="text-center" scope="col">Nama Supplier</th>
                    <th class="text-center" scope="col">Nama PIC</th>
                    <th class="text-center" scope="col">Jabatan</th>
                    <th class="text-center" scope="col">Email</th>
                    <th class="text-center" scope="col">No HP</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $supplier->nama_produsen }}</td>
                        <td class="text-center">{{ $supplier->asal_produsen }}</td>
                        <td class="text-center">{{ $supplier->nama_supplier }}</td>
                        <td class="text-center">{{ $supplier->nama_pic }}</td>
                        <td class="text-center">{{ $supplier->jabatan }}</td>
                        <td class="text-center">{{ $supplier->email }}</td>
                        <td class="text-center">{{ $supplier->no_hp }}</td>
                        <td>

                          <div class="d-flex gap-2">
                            <a class="btn btn-warning text-center"
                            href="{{ route('supplier.edit', $supplier->id) }}" role="button">Edit</a>
                        <form action="{{ route('supplier.destroy', $supplier->id) }}" method="post" id="delete-form{{ $supplier->id }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" onclick="hapus_data('#delete-form{{ $supplier->id }}')">Hapus</button>
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
