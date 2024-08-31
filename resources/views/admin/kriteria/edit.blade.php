@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('kriteria.update', $kriteria->id) }}" id="form-edit">
                @csrf
                @method('put')

                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="name" class="form-label">Nama</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" value="{{ old('name', $kriteria->name) }}" placeholder="masukan kriteria">
                        @error('name')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3" style="display: none;">
                    <div class="col-md-2">
                        <label for="kode" class="form-label">Kode</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="kode" id="kode">
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
