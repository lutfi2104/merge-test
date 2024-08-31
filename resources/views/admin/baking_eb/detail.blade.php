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
                <a href="{{ route('baking_eb.index') }}" class="btn btn-secondary">Kembali</a>
            </div>

        </div>

        <div class="row">
            <div class="col-md-4 ">
                <ul class="list-group">
                    <div class="row">
                        @if(optional(\Carbon\Carbon::parse($baking_eb->tanggal))->format('j F Y'))
                        <li class="list-group-item d-flex">
                            <div class="col-md-5 ">
                                <span><strong>Tanggal Produksi:</strong></span>
                            </div>
                            <div class="col-md-7">
                                <span>:&nbsp;{{ optional(\Carbon\Carbon::parse($baking_eb->tanggal))->format('j F Y') }}</span>
                            </div>
                        </li>
                        @endif

                        <!-- Ulangi pola di atas untuk baris lain yang ingin ditampilkan/disembunyikan secara kondisional -->

                    </div>

                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Nama produk</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $baking_eb->produk->nama_prd }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>No Batch</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $baking_eb->no_batch }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Nomer Mixer</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $baking_eb->no_mixer }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Penambahan Air</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $baking_eb->tambah_air }}</span>


                            </div>
                        </li>
                    </div>


                    <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-group">
                    <div class="row">
                        @if(optional(\Carbon\Carbon::parse($baking_eb->mixing_in))->format('H:i'))
                        <li class="list-group-item d-flex">
                            <div class="col-md-5 ">
                                <span><strong>Mixing In:</strong></span>
                            </div>
                            <div class="col-md-7">
                                <span>:&nbsp;{{ optional(\Carbon\Carbon::parse($baking_eb->mixing_in))->format('H:i') }}</span>
                            </div>
                        </li>
                        @endif
                        <!-- Ulangi pola di atas untuk baris lain yang ingin ditampilkan/disembunyikan secara kondisional -->
                    </div>
                    <div class="row">
                        @if(optional(\Carbon\Carbon::parse($baking_eb->mixing_out))->format('H:i'))
                        <li class="list-group-item d-flex">
                            <div class="col-md-5 ">
                                <span><strong>Mixing Out:</strong></span>
                            </div>
                            <div class="col-md-7">
                                <span>:&nbsp;{{ optional(\Carbon\Carbon::parse($baking_eb->mixing_out))->format('H:i') }}</span>
                            </div>
                        </li>
                        @endif
                        <!-- Ulangi pola di atas untuk baris lain yang ingin ditampilkan/disembunyikan secara kondisional -->
                    </div>
                    <div class="row">
                        @if(optional(\Carbon\Carbon::parse($baking_eb->proofing_in))->format('H:i'))
                        <li class="list-group-item d-flex">
                            <div class="col-md-5 ">
                                <span><strong>Proofing In:</strong></span>
                            </div>
                            <div class="col-md-7">
                                <span>:&nbsp;{{ optional(\Carbon\Carbon::parse($baking_eb->proofing_in))->format('H:i') }}</span>
                            </div>
                        </li>
                        @endif
                        <!-- Ulangi pola di atas untuk baris lain yang ingin ditampilkan/disembunyikan secara kondisional -->
                    </div>
                    <div class="row">
                        @if(optional(\Carbon\Carbon::parse($baking_eb->proofing_out))->format('H:i'))
                        <li class="list-group-item d-flex">
                            <div class="col-md-5 ">
                                <span><strong>Proofing Out:</strong></span>
                            </div>
                            <div class="col-md-7">
                                <span>:&nbsp;{{ optional(\Carbon\Carbon::parse($baking_eb->proofing_out))->format('H:i') }}</span>
                            </div>
                        </li>
                        @endif
                        <!-- Ulangi pola di atas untuk baris lain yang ingin ditampilkan/disembunyikan secara kondisional -->
                    </div>
                    <div class="row">
                        @if(optional(\Carbon\Carbon::parse($baking_eb->baking_in))->format('H:i'))
                        <li class="list-group-item d-flex">
                            <div class="col-md-5 ">
                                <span><strong>Baking In:</strong></span>
                            </div>
                            <div class="col-md-7">
                                <span>:&nbsp;{{ optional(\Carbon\Carbon::parse($baking_eb->baking_in))->format('H:i') }}</span>
                            </div>
                        </li>
                        @endif
                        <!-- Ulangi pola di atas untuk baris lain yang ingin ditampilkan/disembunyikan secara kondisional -->
                    </div>

                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-group">
                    <div class="row">
                        @if(optional(\Carbon\Carbon::parse($baking_eb->baking_out))->format('H:i'))
                        <li class="list-group-item d-flex">
                            <div class="col-md-5 ">
                                <span><strong>Baking Out:</strong></span>
                            </div>
                            <div class="col-md-7">
                                <span>:&nbsp;{{ optional(\Carbon\Carbon::parse($baking_eb->baking_out))->format('H:i') }}</span>
                            </div>
                        </li>
                        @endif
                        <!-- Ulangi pola di atas untuk baris lain yang ingin ditampilkan/disembunyikan secara kondisional -->
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>No EB</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $baking_eb->no_eb }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>No Gerobak</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $baking_eb->no_gerobak }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Suhu Produk</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $baking_eb->suhu_produk }}</span>
                            </div>
                        </li>
                    </div>

                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Diinput Oleh:</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $baking_eb->op }}</span>
                            </div>
                        </li>
                    </div>

                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
