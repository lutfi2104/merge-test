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
            <form method="POST" action="{{ route('perintah.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                    <div class="col-md-2">

                        <label for="produk_id">Produk</label>
                    </div>
                    <div class="col-md-10">
                        <select id="produk_id" class="selectpicker @error('produk_id') is-invalid @enderror"
                            data-live-search="true" data-size="5" name="produk_id" onchange="handleProdukChange()">
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

                    </div>


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
<script>
    function handleProdukChange() {
        // Get the selected product ID
        var produkId = document.getElementById('produk_id').value;

        // Get the container element for Tanggal Produksi CoA
        var container = document.getElementById('tanggal_produksi_coa_container');

        // Define the list of product IDs that should display the input
        var targetProductIds = ['68', '3']; // Add more IDs as needed

        // Show or hide the container based on the selected product ID
        if (targetProductIds.includes(produkId)) {
            container.style.display = 'flex';
        } else {
            container.style.display = 'none';
        }
    }

    // Initialize the display state based on the current selection
    document.addEventListener('DOMContentLoaded', function() {
        handleProdukChange();
    });
</script>

<style>
    .selectpicker {
        max-height: 200px;
        /* Adjust the height as needed */
        overflow-y: auto;
    }
</style>
