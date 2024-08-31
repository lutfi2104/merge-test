@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="gap-2 mb-4 d-flex justify-content-md-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#importModalspec">Import</button>
                <button type="button" class="btn btn-secondary">Export</button>
            </div>

            @include('layouts.importExport')
            <form method="POST" action="{{ route('spec.store') }}" enctype="multipart/form-data" id="form-create">
                @csrf
                <div class="mb-3 row">
                    <div class="col-md-2">

                        <label for="produk_id">Produk</label>
                    </div>
                    <div class="col-md-10">
                        <select id="produk_id" class="form-select @error('produk_id') is-invalid @enderror"
                            name="produk_id">
                            <option value="" selected>Pilih Produk</option>
                            @foreach ($produks as $produk)
                                @if (!$produk->spec)
                                    <option value="{{ $produk->id }}"
                                        {{ old('produk_id') == $produk->id ? 'selected' : '' }}>{{ $produk->name }}</option>
                                @endif
                            @endforeach
                        </select>

                        @error('produk_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="bulk_density" class="form-label">Bulk Density</label>
                    </div>
                    <div class="col-md-10">
                        <div class="d-flex w-100">
                            <div class="col-6">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">Min</span>
                                    <input type="text" class="form-control @error('bulk_density.min') is-invalid @enderror"
                                        name="bulk_density[min]" id="bulk_density.min" value="{{ old('bulk_density.min') }}"
                                        placeholder="masukan minimal bulk density produk">

                                    </div>
                                    @error('bulk_density.min')
                                        <small class="text-danger">{{ $message }} </small>
                                    @enderror
                            </div>

                            <div class="col-6">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">Max</span>
                                    <input type="text" class="form-control @error('bulk_density.max') is-invalid @enderror"
                                        name="bulk_density[max]" id="bulk_density.max" value="{{ old('bulk_density.max') }}"
                                        placeholder="masukan max bulk density produk">
                                    </div>
                                    @error('bulk_density.max')
                                        <small class="text-danger">{{ $message }} </small>
                                    @enderror
                            </div>

                        </div>


                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="color" class="form-label">Kadar Air</label>
                    </div>
                    <div class="col-md-10 ">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">Max</span>
                            <input type="text" class="form-control @error('kadar_air') is-invalid @enderror" name="kadar_air"
                                id="kadar_air" value="{{ old('kadar_air') }}" placeholder="masukan kadar_air produk">
                            </div>
                            @error('kadar_air')
                                <small class="text-danger">{{ $message }} </small>
                            @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="salinity" class="form-label">Salinity</label>
                    </div>
                    <div class="col-md-10 ">
                        <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Max</span>
                        <input type="text" class="form-control @error('salinity') is-invalid @enderror"
                            name="salinity" id="salinity" value="{{ old('salinity') }}"
                            placeholder="masukan salinity produk">
                        </div>
                        @error('salinity')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror

                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="mesh_20" class="form-label">Mesh 20</label>
                    </div>
                    <div class="col-md-10 ">
                        <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Min</span>
                        <input type="text" class="form-control @error('mesh_20') is-invalid @enderror" name="mesh_20"
                            id="mesh_20" value="{{ old('mesh_20') }}" placeholder="masukan mesh_20 produk">
                        </div>
                        @error('mesh_20')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="mesh_40" class="form-label">Mesh 40</label>
                    </div>
                    <div class="col-md-10 ">
                        <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Max</span>
                        <input type="text" class="form-control @error('mesh_40') is-invalid @enderror" name="mesh_40"
                            id="mesh_40" value="{{ old('mesh_40') }}" placeholder="masukan mesh_40 produk">
                        </div>
                        @error('mesh_40')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="mesh_4" class="form-label">Mesh 4</label>
                    </div>
                    <div class="col-md-10 ">
                        <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Max</span>
                        <input type="text" class="form-control @error('mesh_4') is-invalid @enderror" name="mesh_4"
                            id="mesh_4" value="{{ old('mesh_4') }}" placeholder="masukan mesh_4 produk">
                        </div>
                        @error('mesh_4')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="mesh_4_6" class="form-label">Mesh 4-6</label>
                    </div>
                    <div class="col-md-10 ">
                        <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Min</span>
                        <input type="text" class="form-control @error('mesh_4_6') is-invalid @enderror" name="mesh_4_6"
                            id="mesh_4_6" value="{{ old('mesh_4_6') }}" placeholder="masukan mesh_4_6 produk">
                        </div>
                        @error('mesh_4_6')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="mesh_5_6" class="form-label">Mesh 5-6</label>
                    </div>
                    <div class="col-md-10 ">
                        <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Min</span>
                        <input type="text" class="form-control @error('mesh_5_6') is-invalid @enderror"
                            name="mesh_5_6" id="mesh_5_6" value="{{ old('mesh_5_6') }}"
                            placeholder="masukan mesh_5_6 produk">
                        </div>
                        @error('mesh_5_6')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="mesh_20_max" class="form-label">Mesh 20 (OBC 300 MFD) Max</label>
                    </div>
                    <div class="col-md-10 ">
                        <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Max</span>
                        <input type="text" class="form-control @error('mesh_20_max') is-invalid @enderror"
                            name="mesh_20_max" id="mesh_20_max" value="{{ old('mesh_20_max') }}"
                            placeholder="masukan mesh_20_max produk">
                        </div>
                        @error('mesh_20_max')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="mesh_1_4" class="form-label">Mesh 1/4</label>
                    </div>
                    <div class="col-md-10 ">
                        <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Max</span>
                        <input type="text" class="form-control @error('mesh_1_4') is-invalid @enderror"
                            name="mesh_1_4" id="mesh_1_4" value="{{ old('mesh_1_4') }}"
                            placeholder="masukan mesh_1_4 produk">
                        </div>
                        @error('mesh_1_4')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="mesh_1_4_5" class="form-label">Mesh 1/4 - 5</label>
                    </div>
                    <div class="col-md-10 ">
                        <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Min</span>
                        <input type="text" class="form-control @error('mesh_1_4_5') is-invalid @enderror"
                            name="mesh_1_4_5" id="mesh_1_4_5" value="{{ old('mesh_1_4_5') }}"
                            placeholder="masukan mesh_1_4_5 produk">
                        </div>
                        @error('mesh_1_4_5')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="mesh_6" class="form-label">Mesh 6</label>
                    </div>
                    <div class="col-md-10 ">
                        <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Max</span>
                        <input type="text" class="form-control @error('mesh_6') is-invalid @enderror"
                            name="mesh_6" id="mesh_6" value="{{ old('mesh_6') }}"
                            placeholder="masukan mesh_6 produk">
                        </div>
                        @error('mesh_6')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="mesh_6_10" class="form-label">Mesh 6 -10</label>
                    </div>
                    <div class="col-md-10 ">
                        <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Min</span>
                        <input type="text" class="form-control @error('mesh_6_10') is-invalid @enderror"
                            name="mesh_6_10" id="mesh_6_10" value="{{ old('mesh_6_10') }}"
                            placeholder="masukan mesh_6_10 produk">
                        </div>
                        @error('mesh_6_10')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="mesh_30" class="form-label">Mesh 30</label>
                    </div>
                    <div class="col-md-10 ">
                        <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Min</span>
                        <input type="text" class="form-control @error('mesh_30') is-invalid @enderror"
                            name="mesh_30" id="mesh_30" value="{{ old('mesh_30') }}"
                            placeholder="masukan mesh_30 produk">
                        </div>
                        @error('mesh_30')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="mesh_40_kurang" class="form-label"> > Mesh 40</label>
                    </div>
                    <div class="col-md-10 ">
                        <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Min</span>
                        <input type="text" class="form-control @error('mesh_40_kurang') is-invalid @enderror"
                            name="mesh_40_kurang" id="mesh_40_kurang" value="{{ old('mesh_40_kurang') }}"
                            placeholder="masukan mesh_40_kurang produk">
                        </div>
                        @error('mesh_40_kurang')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="salmonella" class="form-label">Salmonella</label>
                    </div>
                    <div class="col-md-10 ">
                        <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Max</span>
                        <input type="text" class="form-control  @error('salmonella') is-invalid @enderror"
                            name="salmonella" id="salmonella" value="{{ old('salmonella') }}"
                            placeholder="masukan nilai salmonella produk">
                        </div>
                        @error('salmonella')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror

                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="tpc" class="form-label">Aerobic Plate Count</label>
                    </div>
                    <div class="col-md-10 ">
                        <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Max</span>
                        <input type="text" class="form-control @error('tpc') is-invalid @enderror" name="tpc"
                            id="tpc" value="{{ old('tpc') }}" placeholder="masukan nilai tpc produk">
                        </div>
                        @error('tpc')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="entero" class="form-label ">Enterobacteria</label>
                    </div>
                    <div class="col-md-10 ">
                        <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Max</span>
                        <input type="text" class="form-control  @error('partical_size') is-invalid @enderror "
                            name="entero" id="partical_size" value="{{ old('entero') }}"
                            placeholder="masukan nilai enterobacteria produk">

                            @error('entero')
                                <small class="text-danger">{{ $message }} </small>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="partical_size" class="form-label ">Yeast & Mold</label>
                    </div>
                    <div class="col-md-10 ">
                        <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Max</span>
                        <input type="text" class="form-control  @error('partical_size') is-invalid @enderror "
                            name="ym" id="ym" value="{{ old('ym') }}"
                            placeholder="masukan nilai Yeast & Mold">

                        </div>
                        @error('ym')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror

                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-10"><button type="submit" class="btn btn-primary">Create</button></div>
                </div>
            </form>
            <!-- Modal Body -->
            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
        </div>
    </div>
    @push('js')

    @endpush
@endsection
