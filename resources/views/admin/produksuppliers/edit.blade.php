@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="gap-2 d-flex justify-content-md-end mb-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModalkriteria">Import</button>
                <a href="{{ route('export.data') }}" class="btn btn-secondary">Export</a>
            </div>

            @include('layouts.importExport')

            <form method="POST" action="{{ route('produk_supplier.update', $produksuppliers->id) }}" enctype="multipart/form-data" id="form-edit">
                @csrf
                @method('PUT')

                <!-- <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="kode_jenis" class="form-label">Kode Jenis</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('kode_jenis') is-invalid @enderror" name="kode_jenis" id="kode_jenis" value="{{ old('kode_jenis', $produksuppliers->kode_jenis) }}" placeholder="Masukkan kode jenis">
                        @error('kode_jenis')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div> -->

                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="jenis_produk" class="form-label">Jenis Produk</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('jenis_produk') is-invalid @enderror" name="jenis_produk" id="jenis_produk" value="{{ old('jenis_produk', $produksuppliers->jenis_produk) }}" placeholder="Masukkan jenis produk">
                        @error('jenis_produk')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
