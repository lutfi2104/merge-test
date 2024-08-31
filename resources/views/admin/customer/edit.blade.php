@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="gap-2 d-flex justify-content-md-end mb-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#importModalnama_produk">Import</button>
                <button type="button" class="btn btn-secondary">Export</button>
            </div>

            @include('layouts.importExport')

            <form method="POST" action="{{ route('customer.update', $customer->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="nama_customer" class="form-label">Nama Customer</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('nama_customer') is-invalid @enderror" name="nama_customer"
                            id="nama_customer" value="{{ old('nama_customer', $customer->nama_customer) }}" placeholder="masukan kriteria">
                        @error('nama_customer')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="pic" class="form-label">Nama PIC</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('pic') is-invalid @enderror" name="pic"
                            id="pic" value="{{ old('pic', $customer->pic) }}" placeholder="masukan kriteria">
                        @error('pic')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="address" class="form-label">Alamat</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                            id="address" value="{{ old('address', $customer->address) }}" placeholder="masukan kriteria">
                        @error('address')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="province" class="form-label">Province</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('province') is-invalid @enderror" name="province"
                            id="province" value="{{ old('province', $customer->province) }}" placeholder="masukan kriteria">
                        @error('province')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="city" class="form-label">City</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                            id="city" value="{{ old('city', $customer->city) }}" placeholder="masukan kriteria">
                        @error('city')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="email" class="form-label">Email</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="email" value="{{ old('email', $customer->email) }}" placeholder="masukan kriteria">
                        @error('email')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="phone" class="form-label">Phone</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                            id="phone" value="{{ old('phone', $customer->phone) }}" placeholder="masukan kriteria">
                        @error('phone')
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
