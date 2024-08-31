@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('baking_eb.store') }}">
            @csrf

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control">
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <label for="nama_produk_id" style="display: block">Produk:</label>
                <select id="nama_produk_id" class="selectpicker" data-live-search="true" data-size="5" name="nama_produk_id">
                    <option value="" selected>Pilih Produk</option>
                                @foreach ($namaproduks as $produk)
                                    <option value="{{ $produk->id }}" {{ old('nama_produk_id') == $produk->id ? 'selected' : '' }}>
                                        {{ $produk->nama_prd }}
                                    </option>
                                @endforeach
                </select>
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <label for="no_batch">Nomor Batch:</label>
                <input type="number" id="no_batch" name="no_batch" class="form-control " value="{{ old('no_batch') }}">
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <label for="no_mixer">Nomor Mixer:</label>
                <input type="number" id="no_mixer" name="no_mixer" class="form-control" value="{{ old('no_mixer') }}">
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <label for="tambah_air">Tambah Air (mL):</label>
                <input type="number" id="tambah_air" name="tambah_air" class="form-control" value="{{ old('tambah_air') }}">
            </div>

           <!-- ... Kode sebelumnya ... -->

<div class="form-group" style="margin-top: 20px;">
    <label for="mixing_in">Mixing In:</label>
    <input type="time" id="mixing_in" name="mixing_in" class="form-control" value="{{ old('mixing_in') }}">
</div>

<div class="form-group" style="margin-top: 20px;">
    <label for="mixing_out">Mixing Out:</label>
    <input type="time" id="mixing_out" name="mixing_out" class="form-control" value="{{ old('mixing_out') }}">
</div>

<div class="form-group" style="margin-top: 20px;">
    <label for="proofing_in">Proofing In:</label>
    <input type="time" id="proofing_in" name="proofing_in" class="form-control" value="{{ old('proofing_in') }}">
</div>

<div class="form-group" style="margin-top: 20px;">
    <label for="profing_out">Proofing Out:</label>
    <input type="time" id="profing_out" name="profing_out" class="form-control" value="{{ old('profing_out') }}">
</div>

<div class="form-group" style="margin-top: 20px;">
    <label for="baking_in">Baking In:</label>
    <input type="time" id="baking_in" name="baking_in" class="form-control" value="{{ old('baking_in') }}">
</div>

<div class="form-group" style="margin-top: 20px;">
    <label for="baking_out">Baking Out:</label>
    <input type="time" id="baking_out" name="baking_out" class="form-control" value="{{ old('baking_out') }}">
</div>

<div class="form-group" style="margin-top: 20px;">
    <label for="no_eb">Nomor EB:</label>
    <input type="number" id="no_eb" name="no_eb" class="form-control" value="{{ old('no_eb') }}">
</div>

<div class="form-group" style="margin-top: 20px;">
    <label for="no_gerobak">Nomor Gerobak:</label>
    <input type="number" id="no_gerobak" name="no_gerobak" class="form-control" value="{{ old('no_gerobak') }}">
</div>

<div class="form-group" style="margin-top: 20px;">
    <label for="suhu_produk">Suhu Produk:</label>
    <input type="number" id="suhu_produk" name="suhu_produk" class="form-control" value="{{ old('suhu_produk') }}">
</div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the current date and format it as YYYY-MM-DD
        var currentDate = new Date().toISOString().split('T')[0];
        document.getElementById('tanggal').value = currentDate;
    });
</script>
