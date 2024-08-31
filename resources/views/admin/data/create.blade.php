@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('spec.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="produk_id">Produk</label>
                </div>
                <div class="col-md-10">
                    <select id="produk_id" class="form-select @error('produk_id') is-invalid @enderror"
                        name="produk_id">
                        <option value="" selected>Pilih Produk</option>
                        @foreach ($produks as $produk)
                        <option value="{{ $produk->id }}" {{old('produk_id')==$produk->id ? 'selected' : '' }} >{{
                            $produk->name }}</option>
                        @endforeach
                    </select>

                    @error('produk_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="bulk_density" class="form-label">Bulk Density</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control @error('bulk_density') is-invalid @enderror"
                        name="bulk_density" id="bulk_density" value="{{ old('bulk_density') }}"
                        placeholder="masukan bulk density produk">
                    @error('bulk_density') <small class="text-danger">{{ $message }} </small> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="nilai" class="form-label">Nilai</label>
                </div>
                <div class="col-md-10 ">
                    <input type="text" class="form-control @error('nilai') is-invalid @enderror" name="nilai" id="nilai"
                        value="{{ old('nilai') }}" placeholder="masukan nilai produk">
                    @error('nilai') <small class="text-danger">{{ $message }} </small> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="color" class="form-label">Kadar Air</label>
                </div>
                <div class="col-md-10 ">
                    <input type="text" class="form-control @error('kadar_air') is-invalid @enderror" name="kadar_air"
                        id="kadar_air" value="{{ old('kadar_air') }}" placeholder="masukan kadar_air produk">
                    @error('kadar_air') <small class="text-danger">{{ $message }} </small> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="mesh_20" class="form-label">Mesh 20</label>
                </div>
                <div class="col-md-10 ">
                    <input type="text" class="form-control @error('mesh_20') is-invalid @enderror" name="mesh_20"
                        id="mesh_20" value="{{ old('mesh_20') }}" placeholder="masukan mesh_20 produk">
                    @error('mesh_20') <small class="text-danger">{{ $message }} </small> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="mesh_40" class="form-label">Mesh 40</label>
                </div>
                <div class="col-md-10 ">
                    <input type="text" class="form-control @error('mesh_40') is-invalid @enderror" name="mesh_40"
                        id="mesh_40" value="{{ old('mesh_40') }}" placeholder="masukan mesh_40 produk">
                    @error('mesh_40') <small class="text-danger">{{ $message }} </small> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="salinity" class="form-label">Salinity</label>
                </div>
                <div class="col-md-10 ">
                    <input type="text" class="form-control @error('salinity') is-invalid @enderror" name="salinity"
                        id="salinity" value="{{ old('salinity') }}" placeholder="masukan salinity produk">
                    @error('salinity') <small class="text-danger">{{ $message }} </small> @enderror

                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="salmonella" class="form-label">Salmonella</label>
                </div>
                <div class="col-md-10 ">
                    <input type="text" class="form-control  @error('salmonella') is-invalid @enderror" name="salmonella"
                        id="salmonella" value="{{ old('salmonella') }}" placeholder="masukan nilai salmonella produk">
                    @error('salmonella') <small class="text-danger">{{ $message }} </small> @enderror

                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="tpc" class="form-label">TPC</label>
                </div>
                <div class="col-md-10 ">
                    <input type="text" class="form-control @error('tpc') is-invalid @enderror" name="tpc" id="tpc"
                        value="{{ old('tpc') }}" placeholder="masukan nilai tpc produk">
                    @error('tpc') <small class="text-danger">{{ $message }} </small> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="entero" class="form-label ">Enterobacteria</label>
                </div>
                <div class="col-md-10 ">
                    <input type="text" class="form-control  @error('partical_size') is-invalid @enderror " name="entero"
                        id="partical_size" value="{{ old('entero') }}"
                        placeholder="masukan nilai enterobacteria produk">
                    @error('entero') <small class="text-danger">{{ $message }} </small> @enderror

                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="partical_size" class="form-label ">Yeast & Mold</label>
                </div>
                <div class="col-md-10 ">
                    <input type="text" class="form-control  @error('partical_size') is-invalid @enderror " name="ym"
                        id="ym" value="{{ old('ym') }}" placeholder="masukan nilai Yeast & Mold">
                    @error('ym') <small class="text-danger">{{ $message }} </small> @enderror

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