@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-4">
                <div class="gap-2 d-flex justify-content-md-end mb-4">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModalsupplier" id="form-create">
                        Import
                    </button>
                    <a href="{{ route('supplier.index') }}" class="btn btn-secondary">List Supplier</a>
                </div>

            </div>



            @include('layouts.importExport')

            <form method="POST" action="{{ route('supplier.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="nama_produsen" class="form-label">Nama Produsen</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('nama_produsen') is-invalid @enderror" name="nama_produsen"
                            id="nama_produsen" value="{{ old('nama_produsen') }}" placeholder="Masukkan nama produsen">
                        @error('nama_produsen')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="asal_produsen" class="form-label">Asal Produsen</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('asal_produsen') is-invalid @enderror" name="asal_produsen"
                            id="asal_produsen" value="{{ old('asal_produsen') }}" placeholder="Masukkan asal produsen">
                        @error('asal_produsen')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="alamat1" class="form-label">Alamat Produsen</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('alamat1') is-invalid @enderror" name="alamat1" id="alamat1"
                            value="{{ old('alamat1') }}" placeholder="Masukkan alamat 1">
                        @error('alamat1')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="nama_supplier" class="form-label">Nama Supplier</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('nama_supplier') is-invalid @enderror" name="nama_supplier"
                            id="nama_supplier" value="{{ old('nama_supplier') }}" placeholder="Masukkan nama supplier">
                        @error('nama_supplier')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="asal_supplier" class="form-label">Asal Supplier</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('asal_supplier') is-invalid @enderror" name="asal_supplier"
                            id="asal_supplier" value="{{ old('asal_supplier') }}" placeholder="Masukkan asal supplier">
                        @error('asal_supplier')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="alamat2" class="form-label">Alamat Supplier</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('alamat2') is-invalid @enderror" name="alamat2" id="alamat2"
                            value="{{ old('alamat2') }}" placeholder="Masukkan alamat 2">
                        @error('alamat2')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="no_tlp" class="form-label">Nomor Telepon</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('no_tlp') is-invalid @enderror" name="no_tlp" id="no_tlp"
                            value="{{ old('no_tlp') }}" placeholder="Masukkan nomor telepon">
                        @error('no_tlp')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="nama_pic" class="form-label">Nama PIC</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('nama_pic') is-invalid @enderror" name="nama_pic" id="nama_pic"
                            value="{{ old('nama_pic') }}" placeholder="Masukkan nama PIC">
                        @error('nama_pic')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="jabatan" class="form-label">Jabatan</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" id="jabatan"
                            value="{{ old('jabatan') }}" placeholder="Masukkan jabatan">
                        @error('jabatan')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="email" class="form-label">Email</label>
                    </div>
                    <div class="col-md-10">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                            value="{{ old('email') }}" placeholder="Masukkan alamat email">
                        @error('email')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="no_hp" class="form-label">Nomor HP</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp"
                            value="{{ old('no_hp') }}" placeholder="Masukkan nomor HP">
                        @error('no_hp')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-10"><button type="submit" class="btn btn-primary">Create</button></div>
                </div>
            </form>
        </div>
    </div>
@endsection
