@extends('layouts.dashboard')

@section('content')
    <div class="card">

        <div class="card-body d-flex flex-column">
            <h5 class="card-title">Detail Pengguna</h5>

            <div class="row flex-grow-1">
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Nama Lengkap:</strong> {{ $user->name }}</li>
                        <li class="list-group-item"><strong>Username:</strong> {{ $user->username }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                        <li class="list-group-item"><strong>Role:</strong> {{ $user->roles->first()->name }}</li>
                        <!-- Tambahkan informasi tambahan sesuai kebutuhan -->
                    </ul>
                </div>
                <div class="col-md-6">
                    <!-- Tambahkan bagian foto atau informasi tambahan di sini -->
                </div>
            </div>
            <div class="mt-4 gap-4 d-flex">
                <div >
                    <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
                <div>
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit User</a>
                </div>
            </div>

        </div>
    </div>
@endsection
