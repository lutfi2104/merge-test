@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-start mb-4">
                <a href="{{ route('user.create') }}" class="btn btn-secondary">Tambah User</a>
            </div>
            <table class="table myTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th class="text-center" scope="col">Nama Pengguna</th>
                        <th class="text-center" scope="col">Departement</th>
                        <th class="text-center" scope="col">Email</th>
                        <th class="text-center" scope="col">Role</th>
                        @if (auth()->user()->hasRole('Super Admin'))
                            <th class="text-center" scope="col">Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>

                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->name }}</td>
                            <td class="text-center">{{ $item->departement->departement }}</td>
                            <td class="text-center">{{ $item->email }}</td>
                            <td class="text-center">{{ $item->roles->first()->name }}
                            </td>
                            @if (auth()->user()->hasRole('Super Admin'))
                                <td class="d-flex gap-2 justify-content-center">
                                    <a class="btn btn-primary text-center" href="{{ route('user.show', $item->id) }}"
                                        role="button">Detail</a>
                                    <a class="btn btn-warning text-center" href="{{ route('user.edit', $item->id) }}"
                                        role="button">Edit</a>
                                    <form action="{{ route('user.destroy', $item->id) }}" method="post"
                                        id="form-delete{{ $item->id }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="hapus_data('#form-delete{{ $item->id }}')">Hapus</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
