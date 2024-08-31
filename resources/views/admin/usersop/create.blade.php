@extends('Layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('usersop.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-2">

                    <label for="user_id" class="form-label">Nama</label>
                </div>
                <div class="col-md-10">
                    <select class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id">
                        <option value="" selected>Select a Departement</option>
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('user_id')
                    <small class="text-danger">{{ $message }} </small>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">

                    <label for="departement_id" class="form-label">Departement</label>
                </div>
                <div class="col-md-10">
                    <select class="form-control @error('departement_id') is-invalid @enderror" name="departement_id" id="departement_id">
                        <option value="" selected>Select a Departement</option>
                        @foreach ($dept as $departement)
                        <option value="{{ $departement->id }}" {{ old('departement_id') == $departement->id ? 'selected' : '' }}>
                            {{ $departement->departement }}
                        </option>
                        @endforeach
                    </select>
                    @error('departement_id')
                    <small class="text-danger">{{ $message }} </small>
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
