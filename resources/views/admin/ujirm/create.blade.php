@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('ujirm.store') }}" method="POST" enctype="multipart/form-data" id="form-create">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="conteiner-fluid">
                    <div class="mb-3 row">
                        <label for="tgl_datang" class="col-sm-2 col-form-label"><span style="color: red;">*</span> Tanggal
                            Kedatangan </label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control @error('tgl_datang') is-invalid @enderror"
                                id="tgl_datang" name="tgl_datang" {{ old('tgl_datang', date('Y-m-d')) }}>
                            @error('tgl_datang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="start_smp" class="col-sm-2 col-form-label">Mulai Sampling <span
                                style="color: red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="time" class="form-control @error('start_smp') is-invalid @enderror"
                                id="start_smp" name="start_smp" value="{{ old('start_smp') }}">
                            @error('start_smp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="end_smp" class="col-sm-2 col-form-label">Akhir Sampling <span
                                style="color: red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="time" class="form-control @error('end_smp') is-invalid @enderror" id="end_smp"
                                name="end_smp" value="{{ old('end_smp') }}">
                            @error('end_smp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3 row">
                                <label for="nama_produk_supplier_id" class="col-sm-4 col-form-label">Nama Bahan<span
                                        style="color: red;">*</span></label>
                                <div class="col-md-6">
                                    <select class="selectpicker @error('nama_produk_supplier_id') is-invalid @enderror"
                                        data-live-search="true" data-size="5" aria-label="Default select example"
                                        name="nama_produk_supplier_id" id="nama_produk_supplier_id">
                                        <option selected>Pilih Bahan Baku</option>
                                        @foreach ($NamaProduks as $item)
                                            <option value="{{ $item->id }}" data-masa-halal="{{ $item->masa_halal }}"
                                                data-nama-produsen="{{ $item->supplier->nama_produsen }}"
                                                {{ old('nama_produk_supplier_id') == $item->id ? 'selected' : '' }}>
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
                                <label for="no_batch" class="col-sm-4 col-form-label">Kode Batch<span
                                        style="color: red;">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('no_batch') is-invalid @enderror"
                                        id="no_batch" name="no_batch" value="{{ old('no_batch') }}">
                                    @error('no_batch')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="kondisi" class="col-sm-4 col-form-label">Kondisi<span
                                        style="color: red;">*</span></label>
                                <div class="col-md-6">
                                    <select name="kondisi" id="kondisi"
                                        class="form-select form-select-lg @error('kondisi') is-invalid @enderror">
                                        <option value="" selected>Kondisi Kendaraan</option>
                                        @foreach ($kondisis as $kondisi)
                                            <option value="{{ $kondisi }}"
                                                {{ old('kondisi') == $kondisi ? 'selected' : '' }}>{{ $kondisi }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kondisi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="mb-3 row">
                                <label for="warna" class="col-sm-4 col-form-label">
                                    Warna<span style="color: red;">*</span>
                                </label>
                                <div class="col-md-6" style="display: flex">
                                    <div class="form-check">
                                        <input class="form-check-input @error('warna') is-invalid @enderror" type="radio"
                                            name="warna" id="warnaNormal" value="Normal"
                                            {{ old('warna') == 'Normal' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="warnaNormal">
                                            Normal (Sesuai Speck)
                                        </label>
                                        @error('warna')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input @error('warna') is-invalid @enderror"
                                            type="radio" name="warna" id="warnaAbnormal" value="Abnormal"
                                            {{ old('warna') == 'Abnormal' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="warnaAbnormal">
                                            Abnormal
                                        </label>
                                    </div>
                                    @error('warna')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="bentuk" class="col-sm-4 col-form-label">Bentuk<span
                                        style="color: red;">*</span></label>
                                <div class="col-md-6" style="display: flex">
                                    <div class="form-check">
                                        <input class="form-check-input @error('bentuk') is-invalid @enderror "
                                            type="radio" name="bentuk" id="bentukNormal" value="Normal"
                                            {{ old('bentuk') == 'Normal' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="bentukNormal">
                                            Normal (Sesuai Speck)
                                        </label>
                                        @error('bentuk')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input @error('bentuk') is-invalid @enderror"
                                            type="radio" name="bentuk" id="bentukAbnormal" value="Abnormal"
                                            {{ old('bentuk') == 'Abnormal' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="bentukAbnormal">
                                            Abnormal
                                        </label>
                                    </div>
                                    @error('bentuk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="label" class="col-sm-4 col-form-label">Benda Asing<span
                                        style="color: red;">*</span></label>
                                <div class="col-md-6" style="display: flex">
                                    <div class="form-check">
                                        <input class="form-check-input @error('asing') is-invalid @enderror"
                                            type="radio" name="asing" id="tidak_ada" value="Tidak Ada"
                                            {{ old('asing') == 'Tidak Ada' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="asingAda">
                                            Tidak Ada
                                        </label>
                                        @error('asing')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input @error('asing') is-invalid @enderror"
                                            type="radio" name="asing" id="ada" value="Ada"
                                            {{ old('asing') == 'Ada' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="asingTidak">
                                            Ada
                                        </label>
                                        @error('asing')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div id="sebutkanTextArea" style="display:none;" class="mb-3 row">
                                <label for="sebutkan" class="col-sm-4 col-form-label">Temuan Apa</label>
                                <div class="col-md-6">
                                    <textarea id="sebutkan" name="sebutkan" class="@error('sebutkan') is-invalid @enderror" rows="3"
                                        placeholder="Temuan Apa" style="resize: none;"> </textarea>
                                    @error('sebutkan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="note" class="col-sm-4 col-form-label">Catatan</label>
                                <div class="col-md-6">
                                    <textarea id="note" name="note" class="@error('note') is-invalid @enderror" rows="3"
                                        placeholder="Catatan" style="resize: none;" value="{{ old('note') }}"></textarea>
                                    @error('note')
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
                                            id="ash" name="ash" value="{{ old('ash') }}">
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
                                            class="form-control @error('wet_gluten') is-invalid @enderror"
                                            id="wet_gluten" name="wet_gluten" value="{{ old('wet_gluten') }}">
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
                                            id="protein" name="protein" value="{{ old('protein') }}">
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
                                        <input type="text"
                                            class="form-control @error('f_number') is-invalid @enderror" id="f_number"
                                            name="f_number" value="{{ old('f_number') }}">
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
                                            id="lab" name="lab" value="{{ old('lab') }}">
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
                                            name="ka_beras" value="{{ old('ka_beras') }}">
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
                                            id="ka_beras_qc" name="ka_beras_qc" value="{{ old('ka_beras_qc') }}">
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
                                <label for="supplier_id" class="col-sm-3 col-form-label">Produsen<span
                                        style="color: red;">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('supplier_id') is-invalid @enderror"
                                        id="supplier_id" name="supplier_id" value="{{ old('supplier_id') }}" readonly>
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
                                        id="halal" name="halal" value="{{ old('halal') }}" readonly>
                                    @error('halal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="bersih" class="col-sm-3 col-form-label">Kebersihaan<span
                                        style="color: red;">*</span></label>
                                <div class="col-md-6">
                                    <select name="bersih" id="bersih"
                                        class="form-select form-select-lg @error('bersih') is-invalid @enderror">
                                        <option value="" selected>Pilih Kebersihaan Kendaraan</option>
                                        <option value="Bersih" {{ old('bersih') == 'Bersih' ? 'selected' : '' }}>Bersih
                                        </option>
                                        <option value="Kotor" {{ old('bersih') == 'Kotor' ? 'selected' : '' }}>Kotor
                                        </option>
                                    </select>
                                    @error('bersih')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="aroma" class="col-sm-3 col-form-label">Aroma<span
                                        style="color: red;">*</span></label>
                                <div class="col-md-6" style="display: flex">
                                    <div class="form-check" style="margin-right: 30px; margin-left: 3px">
                                        <input class="form-check-input @error('aroma') is-invalid @enderror "
                                            type="radio" name="aroma" id="aromaNormal" value="Normal"
                                            {{ old('aroma') == 'Normal' ? 'checked' : '' }}>
                                        @error('aroma')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label class="form-check-label" for="aromaNormal">
                                            ciri khas bahan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input @error('aroma') is-invalid @enderror"
                                            type="radio" name="aroma" id="aromaAbnormal" value="Abnormal"
                                            {{ old('aroma') == 'Abnormal' ? 'checked' : '' }}>
                                        @error('aroma')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label class="form-check-label" for="aromaAbnormal">
                                            Abnormal
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">

                                <label for="suhu" class="col-sm-3 col-form-label">Suhu</label>
                                <div class="col-md-6">

                                    <div class="mb-3 input-group">
                                        <input type="float" class="form-control @error('suhu') is-invalid @enderror"
                                            id="suhu" name="suhu" value="{{ old('suhu') }}">
                                        <span class="input-group-text" id="basic-addon1">°C</span>
                                        @error('suhu')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
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
                                                {{ old('from_area') == $from_area ? 'selected' : '' }}>{{ $from_area }}
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
                                                {{ old('cek_area') == $cek_area ? 'selected' : '' }}>{{ $cek_area }}
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
                                <label for="sample" class="col-sm-3 col-form-label">Jumlah Sample<span
                                        style="color: red;">*</span></label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control @error('sample') is-invalid @enderror"
                                        id="sample" name="sample" value="{{ old('sample') }}">
                                    @error('sample')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="mb-3 row">
                                <label for="qty" class="col-sm-3 col-form-label">Jumlah Bahan Diterima<span
                                        style="color: red;">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('qty') is-invalid @enderror "
                                        id="qty" name="qty" value="{{ old('qty') }}">
                                    @error('qty')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
                                                {{ old('uom') == $uom ? 'selected' : '' }}>{{ $uom }}
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
                                <label for="comp_doc" class="col-sm-3 col-form-label">Kelengkapan Doc<span
                                        style="color: red;">*</span></label>
                                <div class="col-md-6">
                                    <select class="selectpicker @error('comp_doc') is-invalid @enderror"
                                        data-live-search="true" data-size="5" aria-label="Default select example"
                                        name="comp_doc" id="comp_doc">
                                        <option selected>Pilih</option>
                                        @foreach ($comp_docs as $item)
                                            <option value="{{ $item }}"
                                                {{ old('comp_doc') == $item ? 'selected' : '' }}>
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
                                <label for="coa" class="col-sm-3 col-form-label">CoA<span
                                        style="color: red;">*</span></label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control @error('coa') is-invalid @enderror"
                                        id="coa" name="coa" value="{{ old('coa') }}">
                                    @error('coa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
                                <label for="status" class="col-sm-3 col-form-label">status<span
                                        style="color: red;">*</span></label>
                                <div class="col-md-6">
                                    <style>
                                        #status:hover {
                                            background-color: white;
                                        }

                                        #status.passed {
                                            background-color: green;
                                            color: black;
                                        }

                                        #status.reject {
                                            background-color: red;
                                            color: black;
                                        }

                                        #status.hold {
                                            background-color: yellow;
                                            color: black;
                                        }
                                    </style>
                                    <select name="status" id="status"
                                        class="form-select form-select-lg warna @error('status') is-invalid @enderror">
                                        <option selected>Pilih Status</option>
                                        <option value="Passed" {{ old('status') == 'Passed' ? 'selected' : '' }}>
                                            Passed
                                        </option>
                                        <option value="Hold" {{ old('status') == 'Hold' ? 'selected' : '' }}>Hold
                                        </option>
                                        <option value="Reject" {{ old('status') == 'Reject' ? 'selected' : '' }}>
                                            Reject
                                        </option>


                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
    </form>

    {{-- // $(document).ready(function() {
        //     $('input[name="asing"]').change(function() {
        //         if ($(this).attr('id') === 'ada') {
        //             $('#sebutkanTextArea').show();
        //         } else {
        //             $('#sebutkanTextArea').hide();
        //             $('#sebutkan').val(''); // Reset nilai textarea saat disembunyikan
        //         }
        //     });
        // });

        // $('#form-create').submit(function(event) {
        //     var radioAda = $('#ada').prop('checked');
        //     var nilaiSebutkan = $('#sebutkan').val();

        //     if (radioAda && nilaiSebutkan === '') {
        //         alert('Mohon isi textarea karena Anda memilih "Ada".');
        //         event.preventDefault(); // Menghentikan pengiriman formulir
        //     } else {
        //         // Lanjutkan pengiriman formulir atau lakukan tindakan lain sesuai kebutuhan
        //         alert('Form berhasil disubmit.');
        //     }
        // }); --}}
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tglDatangInput = document.getElementById('tgl_datang');
            var today = new Date().toISOString().split('T')[0];
            tglDatangInput.value = today;

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
