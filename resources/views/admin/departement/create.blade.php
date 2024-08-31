@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('departement.store') }}" enctype="multipart/form-data" id="form-create">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="departement" class="form-label">Departement</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('departement') is-invalid @enderror"
                            name="departement" id="departement" value="{{ old('departement') }}"
                            placeholder="masukan kriteria">
                        @error('departement')
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
