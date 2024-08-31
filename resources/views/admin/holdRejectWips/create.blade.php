<!-- resources/views/holdRejectWips/create.blade.php -->

@extends('layouts.dashboard')

@section('content')
    <div class="container">


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-4 d-flex justify-content-end">

            <a href="{{ route('hold_reject_wip.index') }}" class="btn btn-secondary">List Data Bahan Baku</a>
        </div>

        <form action="{{ route('hold_reject_wip.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="produk_id" class="form-label">Produk:</label>
                <select name="produk_id" class="form-select" required>
                    <option value="" selected>--Pilih Produk--</option>
                    @foreach ($produks as $produk)
                        <option value="{{ $produk->id }}">{{ $produk->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="mesin_id" class="form-label">Mesin:</label>
                <select name="mesin_id" class="form-select" required>
                    <option value="" selected>--Pilih Mesin--</option>
                    @foreach ($mesins as $mesin)
                        <option value="{{ $mesin->id }}">{{ $mesin->nama_mesin }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="shift_id" class="form-label">Shift:</label>
                <select name="shift_id" class="form-select" required>
                    <option value="" selected>--Pilih Shift--</option>
                    @foreach ($shifts as $item)
                        <option value="{{ $item->id }}">{{ $item->shift }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal_produksi" class="form-label">Tanggal Produksi:</label>
                <input type="date" name="tanggal_produksi" class="form-control" required>
            </div>
            <!-- Tambahkan input fields lainnya sesuai kebutuhan -->

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah:</label>
                <div class="input-group">
                    <input type="float" name="jumlah" class="form-control" required>
                    <span class="input-group-text" id="basic-addon2">Kg</span>
                </div>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select name="status" class="form-select" required>
                    <option value="" selected>--Status--</option>
                    @foreach ($status as $item)
                        <option value="{{ $item }}">{{ ucfirst($item) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="alasan" class="form-label">Alasan:</label>
                <textarea name="alasan" cols="30" rows="10" class="form-control" required></textarea>
            </div>


            <div class="mb-3">
                <label for="rekomendasi" class="form-label">Rekomendasi:</label>
                <textarea name="rekomendasi" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
