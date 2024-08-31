@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-md-end mb-4">
            <a class="btn btn-primary" href="{{ route('usersop.create') }}" role="button">Tambah User Dokumen</a>
        </div>
        <table class="table myTable">
            <thead>
                <tr>
                    <th class="text-center" scope="col">No</th>
                    <th class="text-center" scope="col">Nama</th>
                    <th class="text-center" scope="col">Departement</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usersops as $usersop)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $usersop->usersop->name }}</td>
                        <td class="text-center">{{ $usersop->departement->departement }}</td>

                        <td>

                          <div class="d-flex gap-2">
                            <a class="btn btn-warning text-center"
                            href="{{ route('usersop.edit', $usersop->id) }}" role="button">Edit</a>
                        <form action="{{ route('usersop.destroy', $usersop->id) }}" method="post" id="delete-form{{ $usersop->id }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" onclick="hapus_data('#delete-form{{ $usersop->id }}')">Hapus</button>
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
