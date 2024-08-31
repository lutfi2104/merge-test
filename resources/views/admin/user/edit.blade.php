@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <!-- Other form fields -->
            <!-- ... -->

            <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data" id="form-edit">
                @csrf
                @method('PUT')

                <div class="mb-3 row">
                    <label for="name" class="col-md-2 col-form-label">Nama Lengkap Pengguna</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" value="{{ old('name', $user->name) }}" placeholder="masukan nama">
                        @error('name')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                {{-- <div class="mb-3 row">
                <label for="role" class="col-md-2 col-form-label">Departement</label>
                <div class="col-md-10">
                    <select class="form-control @error('role') is-invalid @enderror" name="role" id="role">
                        <option value="" selected disabled>Select a Role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ old('role', $user->roles->first()->id) == $role->id ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('role')
                        <small class="text-danger">{{ $message }} </small>
                    @enderror
                </div>
            </div> --}}
                <div class="mb-3 row">
                    <label for="username" class="col-md-2 col-form-label">Username</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                            id="username" value="{{ old('username', $user->username) }}" placeholder="masukan username">
                        @error('username')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-md-2 col-form-label">Email</label>
                    <div class="col-md-10">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="email" value="{{ old('email', $user->email) }}" placeholder="masukan email">
                        @error('email')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <!-- ... Other fields ... -->

                <div class="mb-3 row">
                    <label for="role" class="col-md-2 col-form-label">Role</label>
                    <div class="col-md-10">
                        <select class="form-control @error('role') is-invalid @enderror" name="role" id="role">
                            <option value="" selected disabled>Select a Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}"
                                    {{ old('role', $user->roles->first()->id) == $role->id ? 'selected' : '' }}>
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
                            id="password" placeholder="masukan password">
                        @error('password')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>

        </div>
    </div>
@endsection
