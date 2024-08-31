@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('ujirm.update', $ujirm->id) }}" method="POST" enctype="multipart/form-data" id="form-edit">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="container-fluid">
                    <!-- Isi form edit sesuai kebutuhan Anda -->
                    <!-- Gunakan nilai default dari model $ujirm untuk mengisi formulir -->

                    <div class="mb-3 row">
                        <label for="tgl_datang" class="col-sm-2 col-form-label">Tanggal Kedatangan</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="tgl_datang" name="tgl_datang"
                                value="{{ $ujirm->tgl_datang }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="start_smp" class="col-sm-2 col-form-label">Mulai Sampling</label>
                        <div class="col-sm-9">
                            <input type="time" class="form-control @error('start_smp') is-invalid @enderror"
                                id="start_smp" name="start_smp" value="{{ old('start_smp', $ujirm->start_smp) }}">
                            @error('start_smp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="end_smp" class="col-sm-2 col-form-label">Akhir Sampling</label>
                        <div class="col-sm-9">
                            <input type="time" class="form-control @error('end_smp') is-invalid @enderror" id="end_smp"
                                name="end_smp" value="{{ old('end_smp', $ujirm->end_smp) }}">
                            @error('end_smp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Tambahkan formulir lain sesuai kebutuhan -->
                    <div class="row">
                        <div class="col">
                            <div class="mb-3 row">
                                <label for="nama_produk_supplier_id" class="col-sm-4 col-form-label">Nama Bahan</label>
                                <div class="col-md-6">
                                    <select class="selectpicker @error('nama_produk_supplier_id') is-invalid @enderror"
                                        data-live-search="true" data-size="5" aria-label="Default select example"
                                        name="nama_produk_supplier_id" id="nama_produk_supplier_id">
                                        <option selected>Pilih Bahan Baku</option>
                                        @foreach ($NamaProduks as $item)
                                            <option value="{{ $item->id }}" data-masa-halal="{{ $item->masa_halal }}"
                                                data-nama-produsen="{{ $item->supplier->nama_produsen }}"
                                                {{ old('nama_produk_supplier_id', $ujirm->nama_produk_supplier_id) == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama_produk }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('nama_produk_supplier_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="no_batch" class="col-sm-4 col-form-label">Kode Batch</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('no_batch') is-invalid @enderror"
                                        id="no_batch" name="no_batch" value="{{ old('no_batch', $ujirm->no_batch) }}">
                                    @error('no_batch')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="kondisi" class="col-sm-4 col-form-label">Kondisi Kendaraan</label>
                                <div class="col-md-6">
                                    <select name="kondisi" id="kondisi"
                                        class="form-select form-select-lg @error('kondisi') is-invalid @enderror">
                                        <option value="" selected>Kondisi Kendaraan</option>
                                        @foreach ($kondisis as $kondisi)
                                            <option value="{{ $kondisi }}"
                                                {{ old('kondisi', $ujirm->kondisi) == $kondisi ? 'selected' : '' }}>
                                                {{ $kondisi }}</option>
                                        @endforeach
                                    </select>
                                    @error('kondisi')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="warna" class="col-sm-4 col-form-label">Warna</label>
                                <div class="col-md-6" style="display: flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="warna" id="warnaNormal"
                                            value="Normal" {{ old('warna', $ujirm->warna) == 'Normal' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="warnaNormal">
                                            Normal (Sesuai Speck)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="warna" id="warnaAbnormal"
                                            value="Abnormal"
                                            {{ old('warna', $ujirm->warna) == 'Abnormal' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="warnaAbnormal">
                                            Abnormal
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="mb-3 row">
                                <label for="bentuk" class="col-sm-4 col-form-label">Bentuk</label>
                                <div class="col-md-6" style="display: flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="bentuk" id="bentukNormal"
                                            value="Normal"
                                            {{ old('bentuk', $ujirm->bentuk) == 'Normal' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="bentukNormal">
                                            Normal (Sesuai Speck)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="bentuk"
                                            id="bentukAbnormal" value="Abnormal"
                                            {{ old('bentuk', $ujirm->bentuk) == 'Abnormal' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="bentukAbnormal">
                                            Abnormal
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="asing" class="col-sm-4 col-form-label">Benda Asing</label>
                                <div class="col-md-6" style="display: flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="asing" id="tidak_ada"
                                            value="Tidak Ada"
                                            {{ old('asing', $ujirm->asing) == 'Tidak Ada' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="tidak_ada">
                                            Tidak Ada
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="asing" id="ada"
                                            value="Ada" {{ old('asing', $ujirm->asing) == 'Ada' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="ada">
                                            Ada
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div id="sebutkanTextArea" class="mb-3 row"
                                style="{{ old('asing', $ujirm->asing) == 'Ada' ? '' : 'display:none;' }}">
                                <label for="sebutkan" class="col-sm-4 col-form-label">Temuan Apa</label>
                                <div class="col-md-6">
                                    <textarea id="sebutkan" name="sebutkan">{{ old('sebutkan', $ujirm->sebutkan) }}</textarea>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="note" class="col-sm-4 col-form-label">Catatan</label>
                                <div class="col-md-6">
                                    <textarea id="note" name="note">{{ old('note', $ujirm->note) }}</textarea>
                                </div>
                            </div>


                            <div class="mb-3 row">
                                <label for="rasa" class="col-sm-4 col-form-label">Rasa</label>
                                <div class="col-md-6">
                                    <select name="rasa" id="rasa" class="form-select form-select-lg">
                                        <option selected disabled>Pilih Rasa</option>
                                        <option value="Normal"
                                            {{ old('rasa', $ujirm->rasa) == 'Normal' ? 'selected' : '' }}>Normal (Sesuai
                                            Speck)</option>
                                        <option value="Abnormal"
                                            {{ old('rasa', $ujirm->rasa) == 'Abnormal' ? 'selected' : '' }}>Abnormal
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="comp_doc" class="col-sm-4 col-form-label">Kelengkapan Doc<span
                                        style="color: red;">*</span></label>
                                <div class="col-md-6">
                                    <select class="selectpicker @error('comp_doc') is-invalid @enderror"
                                        data-live-search="true" data-size="5" aria-label="Default select example"
                                        name="comp_doc" id="comp_doc">
                                        <option selected>Pilih</option>
                                        @foreach ($comp_docs as $item)
                                            <option value="{{ $item }}"
                                                {{ old('comp_doc', $ujirm->comp_doc) == $item ? 'selected' : '' }}>
                                                {{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('comp_doc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="ash" class="col-sm-4 col-form-label">Ash Content</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('ash') is-invalid @enderror"
                                            id="ash" name="ash" value="{{ old('ash', $ujirm->ash) }}">
                                        <span class="input-group-text" id="basic-addon1">%as is</span>
                                    </div>
                                    @error('ash')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="wet_gluten" class="col-sm-4 col-form-label">Wet Gluten</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text"
                                            class="form-control @error('wet_gluten') is-invalid @enderror" id="wet_gluten"
                                            name="wet_gluten" value="{{ old('wet_gluten', $ujirm->wet_gluten) }}">
                                        <span class="input-group-text" id="basic-addon1">%</span>
                                    </div>
                                    @error('wet_gluten')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="protein" class="col-sm-4 col-form-label">Protein</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('protein') is-invalid @enderror"
                                            id="protein" name="protein" value="{{ old('protein', $ujirm->protein) }}">
                                        <span class="input-group-text" id="basic-addon1">%</span>
                                    </div>
                                    @error('protein')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="f_number" class="col-sm-4 col-form-label">Falling Number</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('f_number') is-invalid @enderror"
                                            id="f_number" name="f_number"
                                            value="{{ old('f_number', $ujirm->f_number) }}">
                                        <span class="input-group-text" id="basic-addon1">(s)</span>
                                    </div>

                                    @error('f_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="lab" class="col-sm-4 col-form-label">L*A*B</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('lab') is-invalid @enderror"
                                            id="lab" name="lab" value="{{ old('lab', $ujirm->lab) }}">
                                        <span class="input-group-text" id="basic-addon1">l, a, b</span>
                                    </div>

                                    @error('lab')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="ka_beras" class="col-sm-4 col-form-label">Kadar Air Beras CoA</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text"
                                            class="form-control @error('ka_beras') is-invalid @enderror" id="ka_beras"
                                            name="ka_beras" value="{{ old('ka_beras', $ujirm->ka_beras) }}">
                                        <span class="input-group-text" id="basic-addon1">%</span>
                                    </div>

                                    @error('ka_beras')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="ka_beras_qc" class="col-sm-4 col-form-label">Kadar Air Beras QC</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text"
                                            class="form-control @error('ka_beras_qc') is-invalid @enderror"
                                            id="ka_beras_qc" name="ka_beras_qc"
                                            value="{{ old('ka_beras_qc', $ujirm->ka_beras_qc) }}">
                                        <span class="input-group-text" id="basic-addon1">%</span>
                                    </div>

                                    @error('ka_beras_qc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>




                        </div>
                        <div class="col">
                            <div class="mb-3 row">
                                <label for="supplier_id" class="col-sm-3 col-form-label">Produsen</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('supplier_id') is-invalid @enderror"
                                        id="supplier_id" name="supplier_id"
                                        value="{{ old('supplier_id', $ujirm->supplier_id) }}" readonly>
                                    @error('supplier_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="halal" class="col-sm-3 col-form-label">Masa Berlaku Halal<span
                                        style="color: red;">*</span></label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control @error('halal') is-invalid @enderror"
                                        id="halal" name="halal" value="{{ old('halal', $ujirm->halal) }}">
                                    @error('halal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3 row">
                                    <label for="bersih" class="col-sm-3 col-form-label">Kebersihan</label>
                                    <div class="col-md-6">
                                        <select name="bersih" id="bersih" class="form-select form-select-lg">
                                            <option selected disabled>--Pilih Kebersihan--</option>
                                            <option value="Bersih"
                                                {{ old('bersih', $ujirm->bersih) == 'Bersih' ? 'selected' : '' }}> Bersih
                                            </option>
                                            <option value="Kotor"
                                                {{ old('bersih', $ujirm->bersih) == 'Kotor' ? 'selected' : '' }}>Kotor
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="aroma" class="col-sm-3 col-form-label">Aroma</label>
                                    <div class="col-md-6" style="display: flex">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="aroma"
                                                id="aromaNormal" value="Normal"
                                                {{ old('aroma', $ujirm->aroma) == 'Normal' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="aromaNormal">
                                                ciri khas bahan
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="aroma"
                                                id="aromaAbnormal" value="Abnormal"
                                                {{ old('aroma', $ujirm->aroma) == 'Abnormal' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="aromaAbnormal">
                                                Abnormal
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <div class="mb-3 row">
                                    <label for="suhu" class="col-sm-3 col-form-label">Suhu</label>
                                    <div class="col-md-6">
                                        <div class="input-group">

                                            <input type="text" class="form-control" id="suhu" name="suhu"
                                                value="{{ old('suhu', $ujirm->suhu) }}">
                                            <span class="input-group-text" id="basic-addon1">°C</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="sample" class="col-sm-3 col-form-label">Jumlah Sample</label>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" id="sample" name="sample"
                                            value="{{ old('sample', $ujirm->sample) }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="from_area" class="col-sm-3 col-form-label">Start Pengecekan<span
                                            style="color: red;">*</span></label>
                                    <div class="col-md-6">
                                        <select name="from_area" id="from_area"
                                            class="form-select form-select-lg @error('from_area') is-invalid @enderror">
                                            <option value="" selected>Start Pengecekan</option>
                                            @foreach ($from_areas as $from_area)
                                                <option value="{{ $from_area }}"
                                                    {{ old('from_area', $ujirm->from_area) == $from_area ? 'selected' : '' }}>
                                                    {{ $from_area }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('from_area')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="mb-3 row">
                                    <label for="cek_area" class="col-sm-3 col-form-label">Area Pengecekan<span
                                            style="color: red;">*</span></label>
                                    <div class="col-md-6">
                                        <select name="cek_area" id="cek_area"
                                            class="form-select form-select-lg @error('cek_area') is-invalid @enderror">
                                            <option value="" selected>Area Pengecekan</option>
                                            @foreach ($cek_areas as $cek_area)
                                                <option value="{{ $cek_area }}"
                                                    {{ old('cek_area', $ujirm->cek_area) == $cek_area ? 'selected' : '' }}>
                                                    {{ $cek_area }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('cek_area')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>



                                <div class="mb-3 row">
                                    <label for="qty" class="col-sm-3 col-form-label">Jumlah Bahan Diterima</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="qty" name="qty"
                                            value="{{ old('qty', $ujirm->qty) }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="uom" class="col-sm-3 col-form-label">Satuan<span
                                            style="color: red;">*</span></label>
                                    <div class="col-md-6">
                                        <select name="uom" id="uom"
                                            class="form-select form-select-lg @error('uom') is-invalid @enderror">
                                            <option value="" selected>Pilih Satuan</option>
                                            @foreach ($uoms as $uom)
                                                <option value="{{ $uom }}"
                                                    {{ old('uom', $ujirm->uom) == $uom ? 'selected' : '' }}>
                                                    {{ $uom }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('uom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="coa" class="col-sm-3 col-form-label">CoA</label>
                                    <div class="col-md-6">
                                        <input type="file" class="form-control" id="coa" name="coa">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="sj" class="col-sm-3 col-form-label">Surat Jalan<span
                                            style="color: red;">*</span></label>
                                    <div class="col-md-6">
                                        <input type="file" class="form-control @error('sj') is-invalid @enderror"
                                            id="sj" name="sj" value="{{ old('sj') }}">
                                        @error('sj')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="mb-3 row">
                                    <label for="status" class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-md-6">
                                        <select name="status" id="status" class="form-select form-select-lg warna">
                                            <option selected disabled>Pilih Status</option>
                                            <option value="Passed"
                                                {{ old('status', $ujirm->status) == 'Passed' ? 'selected' : '' }}>Passed
                                            </option>
                                            <option value="Hold"
                                                {{ old('status', $ujirm->status) == 'Hold' ? 'selected' : '' }}>Hold
                                            </option>
                                            <option value="Reject"
                                                {{ old('status', $ujirm->status) == 'Reject' ? 'selected' : '' }}>Reject
                                            </option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="gap-3 d-flex">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('ujirm.index') }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </form>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const startInput = document.getElementById('start_smp');
            const endInput = document.getElementById('end_smp');

            function formatTimeToHIS(input) {
                if (input.value && input.value.length === 5) { // HH:MM format
                    input.value += ':00'; // Append :00 to make it HH:MM:SS
                }
            }

            startInput.addEventListener('change', function() {
                formatTimeToHIS(startInput);
            });

            endInput.addEventListener('change', function() {
                formatTimeToHIS(endInput);
            });

            // Format the time when the page loads if a value is present
            formatTimeToHIS(startInput);
            formatTimeToHIS(endInput);
        });
    </script>
@endpush
