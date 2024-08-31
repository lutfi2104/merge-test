@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('departement.update', $departements->id) }}" id="form-edit">
                @csrf
                @method('put')

                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="name" class="form-label">Departement</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('departement') is-invalid @enderror"
                            name="departement" id="departement" value="{{ old('departement', $departements->departement) }}"
                            placeholder="masukan nama departement">
                        @error('departement')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-10"><button type="submit" class="btn btn-primary">Update</button></div>
                </div>
            </form>
            <!-- Modal Body -->
            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->


        </div>
    </div>
@endsection
