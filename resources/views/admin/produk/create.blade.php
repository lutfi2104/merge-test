@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="gap-2 d-flex justify-content-md-end mb-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#importModalproduk">Import</button>
                <a href="{{ route('produk.export') }}" class="btn btn-secondary">Export</a>
            </div>
            @include('layouts.importExport')

            <form method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data" id="form-create">
                @csrf
                <div class="row mb-3">

                    <div class="col-md-2">

                        <label for="template_id">Template CoA</label>
                    </div>
                    <div class="col-md-10">
                        <select onchange="get_kriteria(this.value)" id="template_id"
                            class="form-select @error('template_id') is-invalid @enderror" name="template_id">
                            <option value="" selected>Pilih Template</option>
                            @foreach ($templates as $template)
                                <option value="{{ $template->id }}"
                                    {{ old('template_id') == $template->id ? 'selected' : '' }}>{{ $template->name }}
                                </option>
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
                            id="kode" value="{{ old('name') }}" placeholder="masukan nama produk">
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
                                <option value="{{ $item }}"{{ old('jenis') == $item ? 'selected' : '' }}>
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
                        <label for="kode_produk" class="form-label">Kode Produk</label>
                    </div>
                    <div class="col-md-10 ">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="kode_produk"
                            id="kode" value="{{ old('kode_produk') }}" placeholder="masukan kode produk ">
                        @error('kode_produk')
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
                                id="expired" value="{{ old('expired') }}" placeholder="masukan expired produk">
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
                            id="3491" value="{{ old('color') }}" placeholder="masukan color produk">
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
                            id="6840" value="{{ old('texture') }}" placeholder="masukan texture produk">
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
                            id="7398" value="{{ old('flavor') }}" placeholder="masukan flavor produk">
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
                            id="2909" value="{{ old('granule') }}" placeholder="masukan granule produk">
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
                            name="appearance" id="1883" value="{{ old('appearance') }}"
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
                                name="packaging" id="packaging" value="{{ old('packaging') }}"
                                placeholder="masukan berat kemasan">
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
                            id="4528" value="{{ old('taste') }}" placeholder="masukan taste produk">
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
                            name="partical_size" id="6336" value="{{ old('partical_size') }}"
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
                            name="screen_mm" id="4556" value="{{ old('screen_mm') }}"
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
                            name="filth_insect" id="8228" value="{{ old('filth_insect') }}"
                            placeholder="masukan granule produk">
                        @error('filth_insect')
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
            {{-- <div class="modal fade" id="importModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
                role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="importModal Title">Import
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('produk.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="">Pilih File</label>
                                    <input type="file" class="form-control" name="file">
                                </div>
                                <button class="btn btn-success" type="submit">Import</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    @push('js')
        <script>
            function get_kriteria(id) {
                $('.form-control').prop('disabled', false).attr('placeholder', '')
                $.ajax({
                    url: "{{ route('get-kriteria') }}",
                    data: {
                        template_id: id
                    },
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function(kriterias) {
                        $.each(kriterias, function(index, kriteria) {
                            console.log(kriterias);
                            var id = kriteria.kode;
                            var $inputField = $('#' + id);

                            if (!$inputField.val()) {
                                $inputField.closest('.row').hide();
                            }
                        });
                    },
                    error: function(result) {
                        console.log(result)
                    }

                })
            }
        </script>
    @endpush
@endsection
