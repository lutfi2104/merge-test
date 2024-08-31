@extends('layouts.dashboard')
@section('content')
<div class="container">

    <a href="{{ route('jenis_inspeksi.create') }}" class="btn btn-primary">Tambah Jenis Inspeksi</a>

    {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            {{ $message }}
        </div>
    @endif --}}

    <table class="table mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jenis_inspeksis as $jenis_inspeksi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $jenis_inspeksi->name }}</td>
                    <td>
                        @if (auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Admin QC'))
                        <a href="{{ route('jenis_inspeksi.edit', $jenis_inspeksi->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('jenis_inspeksi.destroy', $jenis_inspeksi->id) }}" method="POST" id="delete-form{{ $jenis_inspeksi->id }}" style="display:inline; }}">
                            @csrf
                            @method('DELETE')
                            {{-- <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button> --}}
                            <button type="submit" class="btn btn-danger" onclick="hapus_data('#delete-form{{ $jenis_inspeksi->id }}' )">Hapus</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
