@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('lkt.update', $lkt->id) }}" method="POST" enctype="multipart/form-data" id="form-create">
        @method('PUT')
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="conteiner-fluid">
                    <div class="row">
                        <div class="mb-3 row">
                            <label for="tanggal" class="col-sm-4 col-form-label">Tanggal</label>
                            <div class="col-md-3">
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                    id="tanggal" name="tanggal" value="{{ old('tanggal', $lkt->tanggal) }}" readonly>
                                @error('tanggal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama_inisiator" class="col-sm-4 col-form-label">Nama Inisitor</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control @error('nama_inisiator') is-invalid @enderror"
                                    id="nama_inisiator" name="nama_inisiator" value="{{ old('nama_inisiator', $lkt->nama_inisiator) }}" readonly>
                                @error('nama_inisiator')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="departement" class="col-sm-4 col-form-label">Departement</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control @error('departement') is-invalid @enderror"
                                    id="departement" name="departement" value="{{ old('departement', $lkt->departement) }}" readonly>
                                @error('departement')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="type_lkt" class="col-sm-4 col-form-label">Type Ketidaksesuaian</label>
                            <div class="col-md-3">
                                <select class="form-select form-select-lg @error('type_lkt') is-invalid @enderror"
                                    aria-label="Default select example" name="type_lkt" id="type_lkt">
                                    <option selected>--Type Ketidaksesuaiaan--</option>
                                    @foreach ($type as $item)
                                        <option value="{{ $item }}"
                                            {{ old('type_lkt', $lkt->type_lkt) == $item ? 'selected' : '' }}>
                                            {{ $item }}

                                        </option>
                                    @endforeach
                                </select>
                                @error('type_lkt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jenis" class="col-sm-4 col-form-label">jenis</label>
                            <div class="col-md-3">
                                <select class="form-select form-select-lg @error('jenis') is-invalid @enderror"
                                    aria-label="Default select example" name="jenis" id="jenis">
                                    <option selected>--Jenis Ketidaksesuaian--</option>
                                    @foreach ($jenis as $item)
                                        <option value="{{ $item }}"
                                            {{ old('jenis', $lkt->jenis) == $item ? 'selected' : '' }}>
                                            {{ $item }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('jenis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama_produk" class="col-sm-4 col-form-label">Nama Produk</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control @error('nama_produk') is-invalid @enderror"
                                    id="nama_produk" name="nama_produk" value="{{ old('nama_produk', $lkt->nama_produk) }}">
                                @error('nama_produk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="kode_produk" class="col-sm-4 col-form-label">Kode Produksi</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control @error('kode_produk') is-invalid @enderror"
                                    id="kode_produk" name="kode_produk" value="{{ old('kode_produk', $lkt->kode_produk) }}">
                                @error('kode_produk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jumlah_produk" class="col-sm-4 col-form-label">Jumlah Produk</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control @error('jumlah_produk') is-invalid @enderror"
                                    id="jumlah_produk" name="jumlah_produk" value="{{ old('jumlah_produk', $lkt->jumlah_produk) }}">
                                @error('jumlah_produk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="status" class="col-sm-4 col-form-label">Status Produk</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control @error('status') is-invalid @enderror"
                                    id="status" name="status" value="{{ old('status', $lkt->status) }}">
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label">Apakah temuan mengubah status halal</label>
                            <div class="col-md-8">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="halal" id="halal-ya" value="ya" {{ old('halal', $lkt->halal) == 'ya' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="halal-ya">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="halal" id="halal-tidak" value="tidak" {{ old('halal', $lkt->halal) == 'tidak' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="halal-tidak">Tidak</label>
                                </div>
                                @error('halal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="data_pelanggan" class="col-sm-4 col-form-label">Data Pelanggan</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control @error('data_pelanggan') is-invalid @enderror"
                                    id="data_pelanggan" name="data_pelanggan" value="{{ old('data_pelanggan', $lkt->data_pelanggan) }}">
                                @error('data_pelanggan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="subject" class="col-sm-4 col-form-label">Subject Ketidaksesuaan</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                    id="subject" name="subject" value="{{ old('subject', $lkt->subject) }}">
                                @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="isi" class="col-sm-4 col-form-label">Deskripsi Ketidaksesuaan</label>
                            <div class="col-md-8">
                                <textarea class="form-control @error('isi') is-invalid @enderror" id="isi" name="isi" rows="5">{{ old('isi', $lkt->isi) }} </textarea>
                                @error('isi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
    </form>
@endsection
