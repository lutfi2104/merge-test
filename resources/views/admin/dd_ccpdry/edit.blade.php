@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('dd_ccpdry.update', $produk->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row row-cols-1 row-cols-lg-2">
                    <div class="col">

                        <div class="form-group mb-3">
                            <label for="dd1">DD 1</label>
                            <input id="dd1" type="float" class="form-control @error('dd1') is-invalid @enderror"
                                name="dd1" placeholder="Masukkan dd1" value="{{ old('dd1', $produk->dd1) }}">

                            @error('dd1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class=" mb-3">
                            <label for="foto1">Foto Disply DD 1</label>
                            <input id="foto1" type="file" class="form-control @error('foto1') is-invalid @enderror"
                                name="foto1" placeholder="Masukkan foto1">
                            @error('foto1')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            {{-- @error('foto1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror --}}
                        </div>
                        <div class="form-group mb-3">
                            <label for="dd2">DD 2</label>
                            <input id="dd2" type="float" class="form-control @error('dd2') is-invalid @enderror"
                                name="dd2" placeholder="Masukkan dd2" value="{{ old('dd2', $produk->dd2) }}">

                            @error('dd2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class=" mb-3">
                            <label for="foto2">Foto Disply DD 2</label>
                            <input id="foto2" type="file" class="form-control @error('foto2') is-invalid @enderror"
                                name="foto2" placeholder="Masukkan foto2">
                            @error('foto2')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            {{-- @error('foto2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror --}}

                            <div class="form-group mb-3">
                                <label for="dd3">DD 3</label>
                                <input id="dd3" type="float" class="form-control @error('dd3') is-invalid @enderror"
                                    name="dd3" placeholder="Masukkan dd3" value="{{ old('dd3', $produk->dd3) }}">

                                @error('dd3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class=" mb-3">
                                <label for="foto3">Foto Disply DD 3</label>
                                <input id="foto3" type="file"
                                    class="form-control @error('foto3') is-invalid @enderror" name="foto3"
                                    placeholder="Masukkan foto3">
                                @error('foto3')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                {{-- @error('foto3')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror --}}
                                <div class="form-group mb-3">
                                    <label for="dd4">DD 4</label>
                                    <input id="dd4" type="float"
                                        class="form-control @error('dd4') is-invalid @enderror" name="dd4"
                                        placeholder="Masukkan dd4" value="{{ old('dd4', $produk->dd4) }}">

                                    @error('dd4')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class=" mb-3">
                                    <label for="foto4">Foto Disply DD 4</label>
                                    <input id="foto4" type="file"
                                        class="form-control @error('foto4') is-invalid @enderror" name="foto4"
                                        placeholder="Masukkan foto4">
                                    @error('foto4')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                    {{-- @error('foto4')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror --}}
                                </div>




                                <div class="col">
                                    <div class="form-group mb-3">
                                        <label for="deskripsi">catatan</label>
                                        <textarea id="catatan" class="form-control @error('catatan') is-invalid @enderror" name="catatan" rows="11"
                                            placeholder="Masukkan catatan">{{ old('catatan',$produk->catatan) }}</textarea>

                                        @error('catatan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>

                            </div>

                            <div class="d-flex justify-content-lg-end">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
            </form>
        </div>
    </div>
@endsection
