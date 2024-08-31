@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('baking_eb.update', $bakingEb->id) }}">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $bakingEb->tanggal) }}">
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <label for="nama_produk_id" style="display: block">Produk:</label>
                <select id="nama_produk_id" class="selectpicker @error('nama_produk_id') is-invalid @enderror" data-live-search="true" data-size="5" name="nama_produk_id">
                    <option value="" selected>Pilih Produk</option>
                    <option value="off_produksi" {{ old('nama_produk_id') == 'off_produksi' ? 'selected' : '' }}>Off Produksi</option>
                    @foreach ($namaproduks as $produk)
                        <option value="{{ $produk->id }}" {{ old('nama_produk_id', $bakingEb->nama_produk_id) == $produk->id ? 'selected' : '' }}>
                            {{ $produk->nama_prd }}
                        </option>
                    @endforeach
                </select>
                @error('nama_produk_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <label for="no_batch">Nomor Batch:</label>
                <input type="number" id="no_batch" name="no_batch" class="form-control @error('no_batch') is-invalid @enderror" value="{{ old('no_batch', $bakingEb->no_batch) }}">
                @error('no_batch')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <label for="no_mixer">Nomor Mixer:</label>
                <input type="number" id="no_mixer" name="no_mixer" class="form-control @error('no_mixer') is-invalid @enderror" value="{{ old('no_mixer', $bakingEb->no_mixer) }}">
                @error('no_mixer')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <label for="tambah_air">Tambah Air:</label>
                <input type="number" id="tambah_air" name="tambah_air" class="form-control @error('tambah_air') is-invalid @enderror" value="{{ old('tambah_air', $bakingEb->tambah_air) }}">
                @error('tambah_air')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <label for="mixing_in">Mixing In:</label>
                <input type="time" id="mixing_in" name="mixing_in" class="form-control @error('mixing_in') is-invalid @enderror" value="{{ old('mixing_in', $bakingEb->mixing_in) }}">
                @error('mixing_in')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <label for="mixing_out">Mixing Out:</label>
                <input type="time" id="mixing_out" name="mixing_out" class="form-control @error('mixing_out') is-invalid @enderror" value="{{ old('mixing_out', $bakingEb->mixing_out) }}">
                @error('mixing_out')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <label for="proofing_in">Proofing In:</label>
                <input type="time" id="proofing_in" name="proofing_in" class="form-control @error('proofing_in') is-invalid @enderror" value="{{ old('proofing_in', $bakingEb->proofing_in) }}">
                @error('proofing_in')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <label for="profing_out">Proofing Out:</label>
                <input type="time" id="profing_out" name="profing_out" class="form-control @error('profing_out') is-invalid @enderror" value="{{ old('profing_out', $bakingEb->profing_out) }}">
                @error('profing_out')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <label for="baking_in">Baking In:</label>
                <input type="time" id="baking_in" name="baking_in" class="form-control @error('baking_in') is-invalid @enderror" value="{{ old('baking_in', $bakingEb->baking_in) }}">
                @error('baking_in')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <label for="baking_out">Baking Out:</label>
                <input type="time" id="baking_out" name="baking_out" class="form-control @error('baking_out') is-invalid @enderror" value="{{ old('baking_out', $bakingEb->baking_out) }}">
                @error('baking_out')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <label for="no_eb">Nomor EB:</label>
                <input type="number" id="no_eb" name="no_eb" class="form-control @error('no_eb') is-invalid @enderror" value="{{ old('no_eb', $bakingEb->no_eb) }}">
                @error('no_eb')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <label for="no_gerobak">Nomor Gerobak:</label>
                <input type="number" id="no_gerobak" name="no_gerobak" class="form-control @error('no_gerobak') is-invalid @enderror" value="{{ old('no_gerobak', $bakingEb->no_gerobak) }}">
                @error('no_gerobak')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <label for="suhu_produk">Suhu Produk:</label>
                <input type="number" id="suhu_produk" name="suhu_produk" class="form-control @error('suhu_produk') is-invalid @enderror" value="{{ old('suhu_produk', $bakingEb->suhu_produk) }}">
                @error('suhu_produk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
