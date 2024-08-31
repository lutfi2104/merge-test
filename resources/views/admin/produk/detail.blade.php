@extends('layouts.dashboard')

@section('content')
{{-- <style>
    * {
        border: 1px solid red
    }
</style> --}}
<div class="card">
    <div class="card-body d-flex flex-column">
        <div class="mt-0 mb-3 d-flex justify-content-between">
            <div>
                <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
            <div>
                <a href="{{ route('produk.edit', $produks->id) }}" class="btn btn-primary">Edit Spec</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 ">
                <ul class="list-group">
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5 ">
                                <span><strong>Nama Produk</strong></span>
                            </div>
                            <div class="col-md-7">
                                <span>:&nbsp;{{ $produks->name }}</span>
                            </div>
                        </li>

                    </div>

                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Kode Produk</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $produks->kode_produk  }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Jenis Produk</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $produks->jenis }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Warna Produk</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $produks->color }}</span>
                            </div>
                        </li>
                    </div>

                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">
                                <span><strong>Texture</strong></span>
                            </div>
                            <div class="col-md-7">
                                <span>:&nbsp;{{ $produks->texture }}</span>
                            </div>
                        </li>
                    </div>



                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Flavor</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $produks->flavor }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Granule</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $produks->granule }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Screen mm</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $produks->screen_mm }}</span>
                            </div>
                        </li>
                    </div>

                    <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="list-group">
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Template CoA</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $produks->template->name }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Expired</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $produks->expired }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Packaging</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $produks->packaging }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Appearance</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $produks->appearance }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">
                                <span><strong>Taste</strong></span>
                            </div>
                            <div class="col-md-7">
                                <span>:&nbsp;{{ $produks->taste }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">
                                <span><strong>Partical Size</strong></span>
                            </div>
                            <div class="col-md-7">
                                <span>:&nbsp;{{ $produks->partical_size }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">
                                <span><strong>Filth_Insect</strong></span>
                            </div>
                            <div class="col-md-7">
                                <span>:&nbsp;{{ $produks->filth_insect }}</span>
                            </div>
                        </li>
                    </div>
                </ul>
            </div>
        </div>

    </div>
</div>
@endsection
