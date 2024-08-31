@extends('layouts.dashboard')
@section('content')
<div class="container">
    <form method="POST" action="{{ route('bintik_hitam.update', $bintikHitam) }}">

        @csrf
        @method('put')

        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $bintikHitam->tanggal) }}">
            @error('tanggal')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="jam">Jam:</label>
            <input type="time" id="jam" name="jam" class="form-control @error('jam') is-invalid @enderror" value="{{ old('jam', $bintikHitam->jam) }}">
            @error('jam')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        @for ($i = 1; $i <= 4; $i++) <div class="card mb-3">
            <div class="card-header">
                <h3>Data DD{{ $i }}</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="produk_id_{{ $i }}" style="display: block">Produk</label>
                    <select id="produk_id_{{ $i }}" class="selectpicker @error('produk_id_' . $i) is-invalid @enderror" data-live-search="true" data-size="5" name="produk_id_{{ $i }}">
                        <option value="" selected>Pilih Produk</option>
                        @foreach ($produks as $produk)
                        <option value="{{ $produk->id }}" {{ old('produk_id_' . $i, $bintikHitam->{"produk_id_" . $i}) == $produk->id ? 'selected' : '' }}>
                            {{ $produk->nama_prd }}
                        </option>
                        @endforeach
                    </select>
                    @error('produk_id_' . $i)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Bintik Hitam -->
                <div class="form-group" style="margin-top: 20px;">
                    <label>Bintik Hitam DD{{ $i }}:</label>
                    <div class="form-check">
                        <input type="radio" id="bintik_hitam_dd{{ $i }}_ada" name="bintik_hitam_dd{{ $i }}" value="Ada" class="form-check-input" {{ old('bintik_hitam_dd' . $i, $bintikHitam->{"bintik_hitam_dd" . $i}) == 'Ada' ? 'checked' : '' }}>
                        <label class="form-check-label" for="bintik_hitam_dd{{ $i }}_ada">Ada</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="bintik_hitam_dd{{ $i }}_tidak_ada" name="bintik_hitam_dd{{ $i }}" value="Tidak Ada" class="form-check-input" {{ old('bintik_hitam_dd' . $i, $bintikHitam->{"bintik_hitam_dd" . $i}) == 'Tidak Ada' ? 'checked' : '' }}>
                        <label class="form-check-label" for="bintik_hitam_dd{{ $i }}_tidak_ada">Tidak Ada</label>
                    </div>
                    @error('bintik_hitam_dd' . $i)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group mb-3" style="margin-top: 20px;">
                    <label for="dd{{ $i }}">Suhu Burner DD {{ $i }}</label>
                    <input id="dd{{ $i }}" type="number" step="any" class="form-control @error('dd{{ $i }}') is-invalid @enderror" name="dd{{ $i }}" placeholder="Masukkan Jumlah Gumpalan DD {{$i}}" value="{{ old('dd' . $i, $bintikHitam->{"dd" . $i}) }}">

                    @error('dd{{ $i }}')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Partikel Hitam -->
                <div class="form-group" style="margin-top: 20px;">
                    <label>Partikel Hitam DD{{ $i }}:</label>
                    <div class="form-check">
                        <input type="radio" id="partikel_hitam_dd{{ $i }}_ada" name="partikel_hitam_dd{{ $i }}" value="Ada" class="form-check-input" {{ old('partikel_hitam_dd' . $i, $bintikHitam->{"partikel_hitam_dd" . $i}) == 'Ada' ? 'checked' : '' }}>
                        <label class="form-check-label" for="partikel_hitam_dd{{ $i }}_ada">Ada</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="partikel_hitam_dd{{ $i }}_tidak_ada" name="partikel_hitam_dd{{ $i }}" value="Tidak Ada" class="form-check-input" {{ old('partikel_hitam_dd' . $i, $bintikHitam->{"partikel_hitam_dd" . $i}) == 'Tidak Ada' ? 'checked' : '' }}>
                        <label class="form-check-label" for="partikel_hitam_dd{{ $i }}_tidak_ada">Tidak Ada</label>
                    </div>
                    @error('partikel_hitam_dd' . $i)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <!-- Benda Asing -->
                <!-- Benda Asing -->
                <div class="form-group" style="margin-top: 20px;">
                    <label>Benda Asing DD{{ $i }}:</label>
                    <div class="form-check">
                        <input type="radio" id="benda_asing_dd{{ $i }}_ada" name="benda_asing_dd{{ $i }}" value="Ada" class="form-check-input" {{ old('benda_asing_dd' . $i, $bintikHitam->{"benda_asing_dd" . $i}) == 'Ada' ? 'checked' : '' }}>
                        <label class="form-check-label" for="benda_asing_dd{{ $i }}_ada">Ada</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="benda_asing_dd{{ $i }}_tidak_ada" name="benda_asing_dd{{ $i }}" value="Tidak Ada" class="form-check-input" {{ old('benda_asing_dd' . $i, $bintikHitam->{"benda_asing_dd" . $i}) == 'Tidak Ada' ? 'checked' : '' }}>
                        <label class="form-check-label" for="benda_asing_dd{{ $i }}_tidak_ada">Tidak Ada</label>
                    </div>
                    @error('benda_asing_dd' . $i)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group mb-3" style="margin-top: 20px;">
                    <label for="gumpalan_dd{{ $i }}">Jumlah Gumpalan DD {{ $i }}</label>
                    <input id="gumpalan_dd{{ $i }}" type="number" class="form-control @error('gumpalan_dd' . $i) is-invalid @enderror" name="gumpalan_dd{{ $i }}" placeholder="Masukkan Jumlah Gumpalan DD {{ $i }}" value="{{ old('gumpalan_dd' . $i, $bintikHitam->{"gumpalan_dd" . $i}) }}">

                    @error('gumpalan_dd' . $i)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group" style="margin-top: 20px;">
                    <label>Catatan DD {{ $i }}:</label>
                    <textarea id="catatan_dd{{ $i }}" class="form-control @error('catatan_dd' . $i) is-invalid @enderror" name="catatan_dd{{ $i }}" rows="4" placeholder="Masukkan catatan DD {{ $i }}">{{ old('catatan_dd' . $i, $bintikHitam->{"catatan_dd" . $i}) }}</textarea>

                    @error('catatan_dd' . $i)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
</div>
@endfor

<button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>
@endsection
