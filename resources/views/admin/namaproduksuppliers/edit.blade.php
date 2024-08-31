@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('namaproduksuppliers.update', $namaproduksupplier->id) }}" method="POST" id="form-edit">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="supplier_id" class="form-label">Nama Supplier</label>
                    </div>
                    <div class="col-md-10">
                        <select class="form-select" name="supplier_id" id="supplier_id">
                            <option value="" selected>--Pilih Supplier--</option>
                            <option value="{{ $namaproduksupplier->supplier->id }}" selected>{{ $namaproduksupplier->supplier->nama_produsen }}</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="produk_supplier_id" class="form-label">Jenis Produk</label>
                    </div>
                    <div class="col-md-10">
                        <select class="form-select" name="produk_supplier_id" id="produk_supplier_id">
                            <option value="" selected>--Pilih Jenis Produk--</option>
                            <option value="{{ $namaproduksupplier->produk_supplier->id }}" selected>{{ $namaproduksupplier->produk_supplier->jenis_produk }}</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="nama_produk" id="nama_produk"
                            value="{{ $namaproduksupplier->nama_produk }}" placeholder="Masukkan nama produk">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="satuan" class="form-label">Satuan</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="satuan" id="satuan"
                            value="{{ $namaproduksupplier->satuan }}" placeholder="Satuan">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="berat" class="form-label">Berat</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="berat" id="berat"
                            value="{{ $namaproduksupplier->berat }}" placeholder="Berat">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="kemasan" class="form-label">Kemasan</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="kemasan" id="kemasan"
                            value="{{ $namaproduksupplier->kemasan }}" placeholder="Kemasan">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="by_halal" class="form-label">Halal By</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="by_halal" id="by_halal"
                            value="{{ $namaproduksupplier->by_halal }}" placeholder="by_halal">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="masa_halal" class="form-label">Halal masa</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="masa_halal" id="masa_halal"
                            value="{{ $namaproduksupplier->masa_halal }}" placeholder="masa_halal">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="kode" class="form-label">Kode</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="kode" id="kode"
                            value="{{ $namaproduksupplier->kode }}" placeholder="Kode">
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
