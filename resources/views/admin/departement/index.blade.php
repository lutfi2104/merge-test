@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-md-end mb-4">
                <a class="btn btn-primary" href="{{ route('departement.create') }}" role="button">Tambah Departement</a>
            </div>
            <table class="table myTable">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">No</th>
                        <th class="text-center" scope="col">Departement</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departements as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->departement }}</td>
                            <td class="d-flex gap-2 justify-content-center">
                                <a class="btn btn-warning text-center" href="{{ route('departement.edit', $item->id) }}"
                                    role="button">Edit</a>
                                <form action="{{ route('departement.destroy', $item->id) }}" method="post"
                                    id="delete-form{{ $item->id }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="hapus_data('#delete-form{{ $item->id }}')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
@endsection
