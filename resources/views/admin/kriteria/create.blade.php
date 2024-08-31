@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="gap-2 d-flex justify-content-md-end mb-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#importModalkriteria">Import</button>
                    <a href="{{ route('export.data') }}" class="btn btn-secondary">Export</a>
            </div>

            @include('layouts.importExport')

            <form method="POST" action="{{ route('kriteria.store') }}" enctype="multipart/form-data" id="form-create">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="name" class="form-label">Nama</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" value="{{ old('name') }}" placeholder="masukan kriteria">
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
                    <div class="col-md-10"><button type="submit" class="btn btn-primary">Create</button></div>
                </div>
            </form>
        </div>
    </div>
@endsection
