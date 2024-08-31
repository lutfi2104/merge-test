@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-4">
                <div class="gap-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModalkalibrasi">Import</button>
                    <a href="{{ route('export.data') }}" class="btn btn-secondary">Export</a>
                </div>
                <a href="{{ route('kalibrasi.index') }}" class="btn btn-secondary">List Data Bahan Baku</a>
            </div>
            @include('layouts.importExport')
            <form method="POST" action="{{ route('kalibrasi.store') }}" enctype="multipart/form-data" id="form-create">
                @csrf
                <div class="row row-cols-1 row-cols-lg-2">
                    <div class="col">

                        <div class="form-group mb-3">
                            <label for="nama_alat">Nama Alat</label>
                            <input id="nama_alat" type="text"
                                class="form-control @error('nama_alat') is-invalid @enderror" name="nama_alat"
                                placeholder="Masukkan nama_alat" value="{{ old('nama_alat') }}">

                            @error('nama_alat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class=" mb-3">
                            <label for="merk">Merk Alat</label>
                            <input id="merk" type="text" class="form-control @error('merk') is-invalid @enderror"
                                name="merk" placeholder="Masukkan merk" value="{{ old('merk') }}">
                            @error('merk')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="type">Type/Model</label>
                            <input id="type" type="text" class="form-control @error('type') is-invalid @enderror"
                                name="type" placeholder="Masukkan type" value="{{ old('type') }}">

                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class=" mb-3">
                            <label for="nomor_seri">Nomor Seri</label>
                            <input id="nomor_seri" type="text"
                                class="form-control @error('nomor_seri') is-invalid @enderror" name="nomor_seri"
                                placeholder="Masukkan Nomor Seri">
                            @error('nomor_seri')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="rentang_ukur">Rentang Ukur</label>
                            <input id="rentang_ukur" type="text"
                                class="form-control @error('rentang_ukur') is-invalid @enderror" name="rentang_ukur"
                                placeholder="Masukkan rentang_ukur" value="{{ old('rentang_ukur') }}">

                            @error('rentang_ukur')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>



                        <div class=" mb-3">
                            <label for="tgl_kalibrasi">Kalibrasi Berikutnya</label>
                            <input id="tgl_kalibrasi" type="date"
                                class="form-control @error('tgl_kalibrasi') is-invalid @enderror" name="tgl_kalibrasi"
                                placeholder="Masukkan tgl_kalibrasi">
                            @error('tgl_kalibrasi')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1">Kalibrasi</label>
                            <div class="form-check border rounded p-2 d-flex ">
                                <div class="form-check">
                                    <input class="form-check-input" name="kalibrasi" type="checkbox" value="kalibrasi" id="flexCheckkalibrasi">
                                    <label class="form-check-label" for="flexCheckkalibrasi">
                                        Kalibrasi
                                    </label>
                                </div>
                                <div class="form-check mx-5">
                                    <input class="form-check-input" name="verifikasi" type="checkbox" value="verifikasi" id="flexCheckverifikasi">
                                    <label class="form-check-label" for="flexCheckkalibrasi">
                                      Verifikasi
                                    </label>
                                  </div>

                            </div>
                        </div>
                        <div class=" mb-3">
                            <label for="resolusi">Resolusi</label>
                            <input id="resolusi" type="text"
                                class="form-control @error('resolusi') is-invalid @enderror" name="resolusi"
                                placeholder="Masukkan resolusi">
                            @error('resolusi')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="tempat">Tempat</label>
                            <input id="tempat" type="text" class="form-control @error('tempat') is-invalid @enderror"
                                name="tempat" placeholder="Masukkan tempat" value="{{ old('tempat') }}">

                            @error('tempat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="kalibrator">Kalibrator</label>
                            <input id="kalibrator" type="text" class="form-control @error('kalibrator') is-invalid @enderror"
                                name="kalibrator" placeholder="Masukkan kalibrator" value="{{ old('kalibrator') }}">

                            @error('kalibrator')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="sertifikat">Sertifikat</label>
                            <input id="sertifikat" type="file" class="form-control @error('sertifikat') is-invalid @enderror"
                                name="sertifikat" placeholder="Masukkan sertifikat" value="{{ old('sertifikat') }}">

                            @error('sertifikat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-lg-end">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
            </form>
        </div>
    </div>
@endsection
