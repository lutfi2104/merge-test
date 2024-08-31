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

        <form action="{{ route('hold_reject_wip.update', $hold_reject_wip->id) }}" method="post">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="produk_id" class="form-label">Produk:</label>
                <select name="produk_id" class="form-select" required>
                    <option value="" selected>--Pilih Produk--</option>
                    @foreach ($produks as $produk)
                        <option value="{{ $produk->id }}"
                            {{ old('produk_id', $hold_reject_wip->produk_id) == $produk->id ? 'selected' : '' }}>
                            {{ $produk->name }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label for="mesin_id" class="form-label">Mesin:</label>
                <select name="mesin_id" class="form-select" required>
                    <option value="" selected>--Pilih Mesin--</option>
                    @foreach ($mesins as $mesin)
                        <option value="{{ $mesin->id }}"
                            {{ old('mesin_id', $hold_reject_wip->mesin_id) == $mesin->id ? 'selected' : '' }}>
                            {{ $mesin->nama_mesin }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="shift_id" class="form-label">Shift:</label>
                <select name="shift_id" class="form-select" required>
                    <option value="" selected>--Pilih Shift--</option>
                    @foreach ($shifts as $item)
                        <option value="{{ $item->id }}"
                            {{ old('shift_id', $hold_reject_wip->shift_id) == $item->id ? 'selected' : '' }}>
                            {{ $item->shift }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal_produksi" class="form-label">Tanggal Produksi:</label>
                <input type="date" name="tanggal_produksi" class="form-control"
                    value="{{ old('tanggal_produksi', $hold_reject_wip->tanggal_produksi) }}" required>
            </div>


            <!-- Tambahkan input fields lainnya sesuai kebutuhan -->

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah:</label>
                <div class="input-group">
                    <input type="float" name="jumlah" class="form-control"
                        value="{{ old('jumlah', $hold_reject_wip->jumlah) }}" required>
                    <span class="input-group-text" id="basic-addon2">Kg</span>
                </div>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select name="status" class="form-select" required>
                    <option value="" selected>--Status--</option>
                    @foreach ($status as $item)
                        <option value="{{ $item }}"
                            {{ old('status', $hold_reject_wip->status) == $item ? 'selected' : '' }}>{{ ucfirst($item) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="alasan" class="form-label">Alasan:</label>
                <textarea name="alasan" cols="30" rows="10" class="form-control" required>{{ old('alasan', $hold_reject_wip->alasan) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="rekomendasi" class="form-label">Rekomendasi:</label>
                <textarea name="rekomendasi" cols="30" rows="10" class="form-control">{{ old('rekomendasi', $hold_reject_wip->rekomendasi) }}</textarea>
            </div>


            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
