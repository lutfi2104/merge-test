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
                    <a href="{{ route('pengujian.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
                <!-- <div>
                    <a href="{{ route('pengujian.edit', $pengujian) }}" class="btn btn-primary">Edit</a>
                </div> -->
            </div>

            <div class="row">
                <div class="col-md-4 ">
                    <ul class="list-group">
                        <div class="row">
                            @if (optional(\Carbon\Carbon::parse($pengujian->tanggal_produksi))->format('j F Y'))
                                <li class="list-group-item d-flex">
                                    <div class="col-md-5 ">
                                        <span><strong>Tanggal Produksi:</strong></span>
                                    </div>
                                    <div class="col-md-7">
                                        <span>:&nbsp;{{ optional(\Carbon\Carbon::parse($pengujian->tanggal_produksi))->format('j F Y') }}</span>
                                    </div>
                                </li>
                            @endif

                            <!-- Ulangi pola di atas untuk baris lain yang ingin ditampilkan/disembunyikan secara kondisional -->

                        </div>
                        <div class="row">
                            @if (optional(\Carbon\Carbon::parse($pengujian->tanggal_expired))->format('j F Y'))
                                <li class="list-group-item d-flex">
                                    <div class="col-md-5 ">
                                        <span><strong>Tanggal Expired:</strong></span>
                                    </div>
                                    <div class="col-md-7">
                                        <span>:&nbsp;{{ optional(\Carbon\Carbon::parse($pengujian->tanggal_expired))->format('j F Y') }}</span>
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

                                    <span>:&nbsp;{{ $pengujian->produk->name }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Mesin</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $pengujian->mesin->nama_mesin }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Method Production</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $pengujian->method_prd }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Shift</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $pengujian->shift->shift }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>No Sak Awal</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $pengujian->sak_awal }}</span>


                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">
                                    <span><strong>No. Sak Akhir</strong></span>
                                </div>
                                <div class="col-md-7">
                                    <span>:&nbsp;{{ $pengujian->sak_akhir }}</span>
                                </div>
                            </li>
                        </div>

                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Jumlah Sak</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $pengujian->jumlah_sak }}</span>


                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>No Batch</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $pengujian->no_batch }}</span>


                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>No Batch CoA</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $pengujian->no_batch_coa }}</span>


                                </div>
                            </li>
                        </div>



                        <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-group">
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Organolaptik</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $pengujian->visual }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Kadar Air</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $pengujian->kadar_air }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Bulk Density</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $pengujian->bulk_density }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Salinity</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $pengujian->salinity }}</span>
                                </div>
                            </li>
                        </div>
                        @if ($pengujian->mesh_20 != null)
                            <div class="row">
                                <li class="list-group-item d-flex">
                                    <div class="col-md-5">
                                        <span><strong>Mesh 20</strong></span>
                                    </div>
                                    <div class="col-md-7">
                                        <span>:&nbsp;{{ $pengujian->mesh_20 }}</span>
                                    </div>
                                </li>
                            </div>
                        @endif
                        @if ($pengujian->mesh_40 != null)
                            <div class="row">
                                <li class="list-group-item d-flex">
                                    <div class="col-md-5">

                                        <span><strong>Mesh 40</strong></span>
                                    </div>
                                    <div class="col-md-7">

                                        <span>:&nbsp;{{ $pengujian->mesh_40 }}</span>
                                    </div>
                                </li>
                            </div>
                        @endif
                        @if ($pengujian->mesh_5_6 != null)
                            <div class="row">
                                <li class="list-group-item d-flex">
                                    <div class="col-md-5">
                                        <span><strong>Mesh 5 - 6</strong></span>
                                    </div>
                                    <div class="col-md-7">
                                        <span>:&nbsp;{{ $pengujian->mesh_5_6 }}</span>
                                    </div>
                                </li>
                            </div>
                        @endif
                        @if ($pengujian->mesh_40_max != null)
                            <div class="row">
                                <li class="list-group-item d-flex">
                                    <div class="col-md-5">
                                        <span><strong>Mesh 40 (OBC 300 MFD)</strong></span>
                                    </div>
                                    <div class="col-md-7">
                                        <span>:&nbsp;{{ $pengujian->mesh_40_max }}</span>
                                    </div>
                                </li>
                            </div>
                        @endif
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Mesh 4</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $pengujian->mesh_4 }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Mesh 4-6</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $pengujian->mesh_4_6 }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Mesh 3</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $pengujian->mesh_3 }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Mesh 3-5</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $pengujian->mesh_3_5 }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Catatan</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $pengujian->catatan }}</span>


                                </div>
                            </li>
                        </div>


                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-group">
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Mesh 1/4</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $pengujian->mesh_1_4 }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Mesh 1/4 - 5 </strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $pengujian->mesh_1_4_5 }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Mesh 6</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $pengujian->mesh_6 }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Mesh 6-10</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $pengujian->mesh_6_10 }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Salmonella</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $pengujian->salmonella }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>TPC</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $pengujian->tpc }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Yeast & Mold</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $pengujian->ym }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Enterobacteria</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $pengujian->entero }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Jenis Produk</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $pengujian->produk->jenis }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>QC</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $pengujian->qc }}</span>
                                </div>
                            </li>
                        </div>

                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
