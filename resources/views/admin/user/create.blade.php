@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data" id="form-create">
                @csrf
                <div class="mb-3 row">
                    <label for="name" class="col-md-2 col-form-label">Nama Lengkap Pengguna</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" value="{{ old('name') }}" placeholder="masukan nama">
                        @error('name')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="departement_id" class="col-md-2 col-form-label">departement_id</label>
                    <div class="col-md-10">
                        <select class="form-control @error('departement_id') is-invalid @enderror" name="departement_id"
                            id="departement_id">
                            <option value="" selected>Select a Departement</option>
                            @foreach ($departements as $departement)
                                <option value="{{ $departement->id }}"
                                    {{ old('departement_id') == $departement->id ? 'selected' : '' }}>
                                    {{ $departement->departement }}
                                </option>
                            @endforeach
                        </select>
                        @error('departement_id')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="username" class="col-md-2 col-form-label">Username</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                            id="username" placeholder="masukan nama">
                        @error('username')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-md-2 col-form-label">Email</label>
                    <div class="col-md-10">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="email" value="{{ old('email') }}" placeholder="masukan nama">
                        @error('email')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="role" class="col-md-2 col-form-label">Role</label>
                    <div class="col-md-10">
                        <select class="form-control @error('role') is-invalid @enderror" name="role" id="role">
                            <option value="" selected>Select a Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('role')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="password" class="col-md-2 col-form-label">Password</label>
                    <div class="col-md-10">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            id="password" placeholder="Enter password" autocomplete="new-password">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-10"><button type="submit" class="btn btn-primary">Create</button></div>
                </div>
            </form>
        </div>
    </div>
@endsection
