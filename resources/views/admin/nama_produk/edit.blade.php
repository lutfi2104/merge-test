@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-body">

        <form method="POST" action="{{ route('nama_produk.update', $nama_produk->id) }}">
            @csrf
            @method('put')

            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="kode_produk" class="form-label">Kode Produk</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control @error('kode_prd') is-invalid @enderror" name="kode_prd" id="kode_produk"
                        value="{{ old('kode_prd', $nama_produk->kode_prd) }}" placeholder="Masukan Kode Produk">
                    @error('kode_prd') <small class="text-danger">{{ $message }} </small> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="nama_prd" class="form-label">Nama Produk</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control @error('nama_prd') is-invalid @enderror" name="nama_prd" id="nama_prd"
                        value="{{ old('nama_prd', $nama_produk->nama_prd) }}" placeholder="Masukan Nama Produk">
                    @error('nama_prd') <small class="text-danger">{{ $message }} </small> @enderror
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
