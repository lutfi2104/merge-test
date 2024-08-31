@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="gap-2 d-flex justify-content-md-end mb-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#importModalnama_produk">Import</button>
                <button type="button" class="btn btn-secondary">Export</button>
            </div>

            @include('layouts.importExport')

            <form method="POST" action="{{ route('nama_produk.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="kode_prd" class="form-label">Kode Produk</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('kode_prd') is-invalid @enderror" name="kode_prd"
                            id="kode_prd" value="{{ old('kode_prd') }}" placeholder="masukan kriteria">
                        @error('kode_prd')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="nama_prd" class="form-label">Nama Produk</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('nama_prd') is-invalid @enderror" name="nama_prd"
                            id="nama_prd" value="{{ old('nama_prd') }}" placeholder="masukan kriteria">
                        @error('nama_prd')
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
