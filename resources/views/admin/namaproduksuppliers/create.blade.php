@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-body">
    <div class="d-flex justify-content-between mb-4">
            <div class="gap-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModalnamaproduksupplier">Import</button>
                <a href="{{ route('export.data') }}" class="btn btn-secondary">Export</a>
            </div>
            <a href="{{ route('namaproduksuppliers.index') }}" class="btn btn-secondary">List Data Bahan Baku</a>
        </div>

        @include('layouts.importExport')
        <form method="POST" action="{{ route('namaproduksuppliers.store') }}" id="form-create">
            @csrf
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="supplier_id" class="form-label">Nama Produsen</label>
                </div>
                <div class="col-md-10">
                    <select class="form-select @error('supplier_id') is-invalid @enderror" name="supplier_id" id="supplier_id">
                        <option value="" selected>--Pilih Produsen</option>
                        @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>{{ $supplier->nama_produsen }}</option>

                        @endforeach
                    </select>
                    @error('supplier_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="produk_supplier_id" class="form-label">jenis Bahan</label>
                </div>
                <div class="col-md-10">
                    <select class="form-select @error('produk_supplier_id') is-invalid @enderror" name="produk_supplier_id" id="produk_supplier_id">
                        <option value="" selected>--Pilih Jenis Bahan</option>
                        @foreach ($produksuppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ old('produk_supplier_id') == $supplier->id ? 'selected' : ''  }}>{{ $supplier->jenis_produk }}</option>
                        @endforeach
                    </select>
                    @error('produk_supplier_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="nama_produk" class="form-label">Nama Bahan Baku</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" name="nama_produk" id="nama_produk" value="{{ old('nama_produk') }}" placeholder="masukan nama produk">
                    @error('nama_produk') <small class="text-danger">{{ $message }} </small> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="satuan" class="form-label">Satuan Bahan</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control @error('satuan') is-invalid @enderror" name="satuan" id="satuan" value="{{ old('satuan') }}" placeholder="satuan bahan">
                    @error('satuan') <small class="text-danger">{{ $message }} </small> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="berat" class="form-label">Berat Bahan</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control @error('berat') is-invalid @enderror" name="berat" id="berat" value="{{ old('berat') }}" placeholder="berat bahan">
                    @error('berat') <small class="text-danger">{{ $message }} </small> @enderror

                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="kemasan" class="form-label">Jenis Kemasan</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control @error('kemasan') is-invalid @enderror" name="kemasan" id="kemasan" value="{{ old('kemasan') }}" placeholder="Jenis Kemasan">
                    @error('kemasan') <small class="text-danger">{{ $message }} </small> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="by_halal" class="form-label">Halal By</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control @error('by_halal') is-invalid @enderror" name="by_halal" id="by_halal" value="{{ old('by_halal') }}" placeholder="Disertifikasi Halal Oleh">
                    @error('by_halal') <small class="text-danger">{{ $message }} </small> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="masa_halal" class="form-label">Masa Berlaku Sertifikat Halal</label>
                </div>
                <div class="col-md-10">
                    <input type="date" class="form-control @error('masa_halal') is-invalid @enderror" name="masa_halal" id="masa_halal" value="{{ old('masa_halal') }}" placeholder="Masa Berlaku Sertifikat Halal">
                    @error('masa_halal') <small class="text-danger">{{ $message }} </small> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="kode" class="form-label">Kode Bahan</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control @error('kode') is-invalid @enderror" name="kode" id="kode" value="{{ old('kode') }}" placeholder="kode bahan">
                    @error('kode') <small class="text-danger">{{ $message }} </small> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">

                </div>
                <div class="col-md-10"><button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>

        </form>
        {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif --}}
    </div>
</div>
@endsection
