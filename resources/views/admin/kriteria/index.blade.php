@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-md-end mb-4">
                <a class="btn btn-primary" href="{{ route('kriteria.create') }}" role="button">Tambah Parameter</a>
            </div>
            <table class="table myTable">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">No</th>
                        <th class="text-center" scope="col">Nama</th>
                        <th class="text-center" scope="col">Kode</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kriterias as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $item->name }}</td>
                        <td class="text-center">{{ $item->kode }}</td>
                        <td class="d-flex gap-2 justify-content-center">
                            <a class="btn btn-warning text-center" href="{{ route('kriteria.edit', $item->id) }}" role="button">Edit</a>
                            <form action="{{ route('kriteria.hapus', $item->id) }}" method="post" id="delete-form{{ $item->id }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" onclick="hapus_data('#delete-form{{ $item->id }}')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>
@endsection
