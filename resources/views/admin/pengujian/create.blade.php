@extends('layouts.dashboard')
@section('content')
    <style>
        .selectpicker.form-control {
            border-color: #ced4da !important;
            /* Warna abu-abu standar */
        }
    </style>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('pengujian.store') }}" enctype="multipart/form-data" id="form-create">
                @csrf
                <div class="mb-3 row">
                    <div class="col-md-2">

                        <label for="produk_id">Produk</label>
                    </div>
                    <div class="col-md-10">
                        <select onchange="cekspec(this.value)" id="produk_id"
                            class="selectpicker @error('produk_id') is-invalid @enderror" data-live-search="true"
                            data-size="5" name="produk_id">
                            <option value="" selected>---Pilih Produk---</option>
                            @foreach ($produks as $produk)
                                @if ($produk->spec)
                                    <option value="{{ $produk->id }}"
                                        {{ old('produk_id') == $produk->id ? 'selected' : '' }}>
                                        {{ $produk->name }}
                                    </option>
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
                <!-- Tanggal Produksi CoA -->
                <div class="mb-3 row" id="tanggal_produksi_coa_container" style="display: none;">
                    <div class="col-md-2">
                        <label for="tanggal_produksi_coa" class="form-label">Tanggal Produksi CoA</label>
                    </div>
                    <div class="col-md-10">
                        <input type="date"
                            class="form-control rounded @error('tanggal_produksi_coa') is-invalid @enderror"
                            style="width: 220px; height: 40px;" name="tanggal_produksi_coa" id="tanggal_produksi_coa"
                            value="{{ old('tanggal_produksi_coa') }}" placeholder="masukan bulk density produk">
                        @error('tanggal_produksi_coa')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="tanggal_produksi" class="form-label">Tanggal Produksi</label>
                    </div>
                    <div class="col-md-10">
                        <input type="date" class="form-control rounded @error('tanggal_produksi') is-invalid @enderror"
                            style="width: 220px; height: 40px;" name="tanggal_produksi" id="tanggal_produksi"
                            value="{{ old('tanggal_produksi') }}" placeholder="masukan bulk density produk">
                        @error('tanggal_produksi')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">

                        <label for="shift_id">Shift</label>
                    </div>
                    <div class="col-md-10">
                        <select id="shift_id" class="selectpicker @error('shift_id') is-invalid @enderror"
                            data-live-search="true" data-size="5" name="shift_id">
                            <option value="" selected>Pilih Shift</option>
                            @foreach ($shifts as $shift)
                                <option value="{{ $shift->id }}" {{ old('shift_id') == $shift->id ? 'selected' : '' }}>
                                    {{ $shift->shift }}
                                </option>
                            @endforeach
                        </select>

                        @error('shift_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-2">

                        <label for="mesin_id">Nama Mesin</label>
                    </div>
                    <div class="col-md-10">
                        <select id="mesin_id" class="selectpicker @error('mesin_id') is-invalid @enderror"
                            data-live-search="true" data-size="5" name="mesin_id">
                            <option value="" selected>Pilih Nama Mesin</option>
                            @foreach ($mesins as $mesin)
                                <option value="{{ $mesin->id }}" {{ old('mesin_id') == $mesin->id ? 'selected' : '' }}>
                                    {{ $mesin->nama_mesin }}
                                </option>
                            @endforeach
                        </select>

                        @error('mesin_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">

                        <label for="method_prd">Method Production</label>
                    </div>
                    <div class="col-md-10">
                        <select id="method_prd" class="selectpicker @error('method_prd') is-invalid @enderror"
                            data-live-search="true" data-size="5" name="method_prd">
                            <option value="" selected>Pilih Method</option>
                            @foreach ($method_prds as $method)
                                <option value="{{ $method }}" {{ old('method_prd') == $method ? 'selected' : '' }}>
                                    {{ $method }}
                                </option>
                            @endforeach
                        </select>

                        @error('method_prd')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>



                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="awal_sak" class="form-label">No Sak Awal</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('awal_sak') is-invalid @enderror" name="sak_awal"
                            id="sak_awal" value="{{ old('sak_awal') }}">
                        @error('sak_awal')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="sak_akhir" class="form-label">No Sak akhir</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('sak_akhir') is-invalid @enderror"
                            name="sak_akhir" id="sak_akhir" value="{{ old('sak_akhir') }}">
                        @error('sak_akhir')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>


                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="kadar_air" class="form-label">Kadar Air</label>
                    </div>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control @error('kadar_air') is-invalid @enderror"
                            name="kadar_air" id="kadar_air" value="{{ old('kadar_air') }}">
                        @error('kadar_air')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="bulk_density" class="form-label">Bulk Density</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('bulk_density') is-invalid @enderror"
                            name="bulk_density" id="bulk_density" value="{{ old('bulk_density') }}">
                        @error('bulk_density')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="salinity" class="form-label">Salinity</label>
                    </div>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control @error('salinity') is-invalid @enderror"
                            name="salinity" id="salinity" value="{{ old('salinity') }}">
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
                        <input type="text" class="form-control @error('mesh_20') is-invalid @enderror" name="mesh_20"
                            id="mesh_20" value="{{ old('mesh_20') }}">
                        @error('mesh_20')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="mesh_40" class="form-label">Mesh 40</label>
                    </div>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control @error('mesh_40') is-invalid @enderror" name="mesh_40"
                            id="mesh_40" value="{{ old('mesh_40') }}">
                        @error('mesh_40')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="mesh_5_6" class="form-label">Mesh 5-6</label>
                    </div>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control @error('mesh_5_6') is-invalid @enderror" name="mesh_5_6"
                            id="mesh_5_6" value="{{ old('mesh_5_6') }}">
                        @error('mesh_5_6')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="mesh_4" class="form-label">Mesh 4</label>
                    </div>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control @error('mesh_4') is-invalid @enderror" name="mesh_4"
                            id="mesh_4" value="{{ old('mesh_4') }}">
                        @error('mesh_4')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="mesh_4_6" class="form-label">Mesh 4 - 6</label>
                    </div>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control @error('mesh_4_6') is-invalid @enderror"
                            name="mesh_4_6" id="mesh_4_6" value="{{ old('mesh_4_6') }}">
                        @error('mesh_4_6')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="mesh_1_4" class="form-label">Mesh 1/4</label>
                    </div>
                    <div class="col-md-10">

                        <input type="text" class="form-control @error('mesh_1_4') is-invalid @enderror"
                            name="mesh_1_4" id="mesh_1_4" value="{{ old('mesh_1_4') }}">

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
                        <input type="text" class="form-control @error('mesh_1_4_5') is-invalid @enderror"
                            name="mesh_1_4_5" id="mesh_1_4_5" value="{{ old('mesh_1_4_5') }}">
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
                        <input type="text" class="form-control @error('mesh_6') is-invalid @enderror" name="mesh_6"
                            id="mesh_6" value="{{ old('mesh_6') }}">
                        @error('mesh_6')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="mesh_6_10" class="form-label">Mesh 6 - 10</label>
                    </div>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control @error('mesh_6_10') is-invalid @enderror"
                            name="mesh_6_10" id="mesh_6_10" value="{{ old('mesh_6_10') }}">
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
                        <input type="text" class="form-control @error('mesh_30') is-invalid @enderror"
                            name="mesh_30" id="mesh_30" value="{{ old('mesh_30') }}">
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
                        <input type="text" class="form-control @error('mesh_40_kurang') is-invalid @enderror"
                            name="mesh_40_kurang" id="mesh_40_kurang" value="{{ old('mesh_40_kurang') }}">
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
                        <input type="text" class="form-control  @error('salmonella') is-invalid @enderror"
                            name="salmonella" id="salmonella" value="{{ old('salmonella') }}">
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
                        <input type="text" class="form-control @error('tpc') is-invalid @enderror" name="tpc"
                            id="tpc" value="{{ old('tpc') }}">
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
                        <input type="text" class="form-control  @error('entero') is-invalid @enderror "
                            name="entero" id="entero" value="{{ old('entero') }}">
                        @error('entero')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror

                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="ym" class="form-label">Yeast & Mold</label>
                    </div>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control  @error('ym') is-invalid @enderror " name="ym"
                            id="ym" value="{{ old('ym') }}">
                        @error('ym')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror

                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="visual" class="form-label">
                            Organoleptik *PRABU
                        </label>
                    </div>
                    <div class="col-md-10 d-flex flex-nowrap">
                        <div class="form-check" style="margin-right: 80px; margin-left: 3px">
                            <input class="form-check-input @error('visual') is-invalid @enderror" type="radio"
                                name="visual" id="visualNormal" value="Sesuai Speck"
                                {{ old('visual') == 'Sesuai Speck' ? 'checked' : '' }}>

                            <label class="form-check-label" for="visualNormal" style="white-space: nowrap;">
                                Sesuai Speck
                            </label>


                            @error('visual')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror



                        </div>
                        <div class="form-check">
                            <input class="form-check-input @error('visual') is-invalid @enderror" type="radio"
                                name="visual" id="visualAbnormal" value="Abnormal"
                                {{ old('visual') == 'Abnormal' ? 'checked' : '' }}>
                            <label class="form-check-label" for="visualAbnormal">
                                Abnormal
                            </label>
                        </div>

                        @error('visual')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-2">
                        <label for="catatan" class="form-label">Catatan</label>
                    </div>
                    <div class="col-md-10">
                        <textarea id="catatan" name="catatan" class="@error('catatan') is-invalid @enderror" rows="3"
                            placeholder="Catatan" style="resize: none; width: 100%;">{{ old('catatan') }}</textarea>
                        @error('catatan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2">

                    </div>
                    <span class="col-md-10">

                        <strong> * P= Penampakan, R= Rasa, A=Aroma, B=Bentuk, U=Ukuran</strong>

                    </span>

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
        <div class="modal fade" id="importModalSpec" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
            role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="importModalSpec">Import Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('spec.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 form-group">
                                <label for="">Pilih File</label>
                                <input type="file" class="form-control" name="file">
                            </div>
                            <button class="btn btn-success" type="submit">Import</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the current date and format it as YYYY-MM-DD
        var currentDate = new Date().toISOString().split('T')[0];
        document.getElementById('tanggal_produksi').value = currentDate;
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get today's date
        var today = new Date();

        // Get the current year and month
        var year = today.getFullYear();
        var month = today.getMonth(); // 0-based (0 = January, 1 = February, etc.)

        // Set the default date to the 1st day of the current month
        var defaultDate = new Date(year, month, 2);

        // Format the date to YYYY-MM-DD
        var formattedDate = defaultDate.toISOString().split('T')[0];

        // Set the default value of the input field
        document.getElementById('tanggal_produksi_coa').value = formattedDate;
    });
</script>


<style>
    .selectpicker {
        max-height: 200px;
        overflow-y: auto;
    }
</style>
