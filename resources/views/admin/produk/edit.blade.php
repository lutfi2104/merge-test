@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('produk.update', $produk->id) }}" enctype="multipart/form-data" id="form-edit">
                @csrf
                @method('put')
                <div class="row mb-3">
                    <div class="col-md-2">

                        <label for="template_id">Template CoA</label>
                    </div>
                    <div class="col-md-10">
                        <select id="template_id" class="form-select @error('template_id') is-invalid @enderror"
                            name="template_id">
                            <option value="" selected>Pilih Template</option>
                            @foreach ($templates as $template)
                                <option value="{{ $template->id }}"
                                    {{ old('template_id', $produk->template_id) == $template->id ? 'selected' : '' }}>
                                    {{ $template->name }}</option>
                            @endforeach
                        </select>

                        @error('template_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="name" class="form-label">Nama Produk</label>
                    </div>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="nama" value="{{ old('name', $produk->name) }}" placeholder="masukan nama produk">
                        @error('name')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="jenis" class="form-label">Jenis Produk</label>
                    </div>
                    <div class="col-md-10 ">
                        <select class="form-select  @error('jenis') is-invalid @enderror" name="jenis" id="jenis">
                            <option selected value="">Jenis Produk</option>
                            @foreach ($jenis as $item)
                                <option
                                    value="{{ $item }}"{{ old('jenis', $produk->jenis) == $item ? 'selected' : '' }}>
                                    {{ $item }}</option>
                            @endforeach

                        </select>
                        @error('jenis')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="expired" class="form-label">Expired</label>
                    </div>
                    <div class="col-md-10 ">
                        <div class="input-group">
                            <input type="text" class="form-control @error('expired') is-invalid @enderror" name="expired"
                            id="expired" value="{{ old('expired', $produk->expired) }}"
                            placeholder="masukan expired produk">
                            <span class="input-group-text" id="basic-addon2">Bulan</span>
                        </div>
                        @error('expired')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="color" class="form-label">Color</label>
                    </div>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control @error('color') is-invalid @enderror" name="color"
                            id="color" value="{{ old('color', $produk->color) }}" placeholder="masukan color produk">
                        @error('color')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="texture" class="form-label">Texture</label>
                    </div>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control @error('texture') is-invalid @enderror" name="texture"
                            id="texture" value="{{ old('texture', $produk->texture) }}"
                            placeholder="masukan texture produk">
                        @error('texture')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="flavor" class="form-label">Flavor</label>
                    </div>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control @error('flavor') is-invalid @enderror" name="flavor"
                            id="flavor" value="{{ old('flavor', $produk->flavor) }}"
                            placeholder="masukan flavor produk">
                        @error('flavor')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="granule" class="form-label">Granule</label>
                    </div>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control @error('granule') is-invalid @enderror" name="granule"
                            id="granule" value="{{ old('granule', $produk->granule) }}"
                            placeholder="masukan granule produk">
                        @error('granule')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="appearance" class="form-label">Apperance</label>
                    </div>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control  @error('appearance') is-invalid @enderror"
                            name="appearance" id="appearance" value="{{ old('appearance', $produk->appearance) }}"
                            placeholder="masukan appearance produk">
                        @error('appearance')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="packaging" class="form-label">Packaging</label>
                    </div>
                    <div class="col-md-10 ">
                       <div class="input-group">
                        <input type="text" class="form-control @error('packaging') is-invalid @enderror"
                        name="packaging" id="packaging" value="{{ old('packaging', $produk->packaging) }}"
                        placeholder="masukan berat kemasan">
                        <span class="input-group-text" id="basic-addon2">Kg</span>
                    </div>
                    @error('packaging')
                        <small class="text-danger">{{ $message }} </small>
                    @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="taste" class="form-label">Taste</label>
                    </div>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control @error('taste') is-invalid @enderror" name="taste"
                            id="taste" value="{{ old('taste', $produk->taste) }}"
                            placeholder="masukan taste produk">
                        @error('taste')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="partical_size" class="form-label ">Partical Size</label>
                    </div>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control  @error('partical_size') is-invalid @enderror "
                            name="partical_size" id="partical_size"
                            value="{{ old('partical_size', $produk->partical_size) }}"
                            placeholder="masukan granule produk">
                        @error('partical_size')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="screen_mm" class="form-label">Screen mm</label>
                    </div>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control @error('screen_mm') is-invalid @enderror "
                            name="screen_mm" id="screen_mm" value="{{ old('screen_mm', $produk->screen_mm) }}"
                            placeholder="masukan granule produk">
                        @error('screen_mm')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="filth_insect" class="form-label">Filth insect</label>
                    </div>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control @error('filth_insect') is-invalid @enderror "
                            name="filth_insect" id="filth_insect"
                            value="{{ old('filth_insect', $produk->filth_insect) }}"
                            placeholder="masukan granule produk">
                        @error('filth_insect')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-10"><button type="submit" class="btn btn-primary">Update</button></div>
                </div>
            </form>
        </div>
    </div>
@endsection
