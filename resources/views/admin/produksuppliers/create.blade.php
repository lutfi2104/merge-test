@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-4">
                <div class="gap-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModaljenis_bahan">
                        Import
                    </button>
                    <a href="{{ route('produk_supplier.index') }}" class="btn btn-secondary">List Jenis Bahan Baku</a>
                </div>

            </div>

            <div class="modal fade" id="importModaljenis_bahan" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Import Jenis Bahan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('jenis.import') }}" method="POST" enctype="multipart/form-data" id="form-create">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="file">Pilih File</label>
                                <input type="file" class="form-control" name="file" accept=".xlsx, .xls">
                            </div>
                            <button class="btn btn-success" type="submit">Import</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

            <form method="POST" action="{{ route('produk_supplier.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="kode_jenis" class="form-label">Kode Jenis</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('kode_jenis') is-invalid @enderror"
                            name="kode_jenis" id="kode_jenis" value="{{ old('kode_jenis') }}"
                            placeholder="Masukkan kode jenis">
                        @error('kode_jenis')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div> -->

                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="jenis_produk" class="form-label">Jenis Produk</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('jenis_produk') is-invalid @enderror"
                            name="jenis_produk" id="jenis_produk" value="{{ old('jenis_produk') }}"
                            placeholder="Masukkan jenis produk">
                        @error('jenis_produk')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
