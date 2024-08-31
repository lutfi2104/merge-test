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
                    <a href="{{ route('ujirm.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
                <div>
                    <a href="{{ route('ujirm.edit', $ujirm->id) }}" class="btn btn-primary">Edit Ujirm</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 ">
                    <ul class="list-group">
                        <div class="row">
                            @if (optional(\Carbon\Carbon::parse($ujirm->tgl_datang))->format('j F Y'))
                                <li class="list-group-item d-flex">
                                    <div class="col-md-5 ">
                                        <span><strong>Tanggal Kedatangan:</strong></span>
                                    </div>
                                    <div class="col-md-7">
                                        <span>:&nbsp;{{ optional(\Carbon\Carbon::parse($ujirm->tgl_datang))->format('j F Y') }}</span>
                                    </div>
                                </li>
                            @endif

                            <!-- Ulangi pola di atas untuk baris lain yang ingin ditampilkan/disembunyikan secara kondisional -->

                        </div>

                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Nama Bahan</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $ujirm->nama_produk_supplier->nama_produk }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Nama Produsen</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $ujirm->supplier_id }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Kode Batch</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $ujirm->no_batch }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Start Pengecekan</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $ujirm->from_area }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Area Pengecekan</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $ujirm->cek_area }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Kadaluarsa Sertifikat Halal</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ optional(\Carbon\Carbon::parse($ujirm->halal))->format('j F Y') }}</span>


                                </div>
                            </li>
                        </div>
                        <div class="row">
                            @if ($ujirm->kondisi)
                                <li class="list-group-item d-flex">
                                    <div class="col-md-5">
                                        <span><strong>Kondisi Mobil</strong></span>
                                    </div>
                                    <div class="col-md-7">
                                        <span>:&nbsp;{{ $ujirm->kondisi }}</span>
                                    </div>
                                </li>
                            @endif
                        </div>

                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Kebersihaan Mobil</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $ujirm->bersih }}</span>


                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Temuan Benda Asing</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $ujirm->asing }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Catatan Temuan Benda Asing</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $ujirm->sebutkan }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Kelengkapan Dokumen</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $ujirm->comp_doc }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Kadar Air Beras CoA</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $ujirm->ka_beras }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Kadar Air Beras QC</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $ujirm->ka_beras_qc }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Status</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $ujirm->status }}</span>
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

                                    <span><strong>Kebersihaan Mobil</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $ujirm->bersih }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Warna Bahan Baku</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $ujirm->warna }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Bentuk Bahan Baku</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $ujirm->bentuk }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>jumlah Sample</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>: {{ $ujirm->sample }}&nbsp;{{ $ujirm->uom ?? '' }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Jumlah Bahan Baku Diterima</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $ujirm->qty }}&nbsp;{{ $ujirm->uom ?? '' }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Catatan</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $ujirm->note }}</span>
                                </div>
                            </li>
                        </div>

                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Ash</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $ujirm->ash }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Protein</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $ujirm->protein }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Falling Number</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $ujirm->f_number }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Wet_gluten</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $ujirm->wet_gluten }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>L*A*B</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $ujirm->lab }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Suhu</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $ujirm->suhu }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Waktu Awal Pengecekan</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ optional(\Carbon\Carbon::parse($ujirm->start_smp))->format('H:i') }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Waktu Akhir Pengecekan</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ optional(\Carbon\Carbon::parse($ujirm->end_smp))->format('H:i') }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Total Waktu Pengecekan</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $ujirm->date_smp }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">
                                    <span><strong>File Surat Jalan</strong></span>
                                </div>
                                <div class="col-md-7">
                                    <span>
                                        @if ($ujirm->coa)
                                            <a href="{{ asset("storage/sj/{$ujirm->sj}") }}"
                                                target="_blank">:&nbsp;{{ $ujirm->sj ?? '' }}</a>
                                        @else
                                            Tidak ada file COA terkait
                                        @endif
                                    </span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">
                                    <span><strong>File COA</strong></span>
                                </div>
                                <div class="col-md-7">
                                    <span>
                                        @if ($ujirm->coa)
                                            <a href="{{ asset("storage/coa/{$ujirm->coa}") }}"
                                                target="_blank">:&nbsp;{{ $ujirm->coa }}</a>
                                            <br>
                                            <a href="{{ route('ujirm.download', $ujirm->id) }}"
                                                class="mt-2 btn btn-primary"><i
                                                    class="menu-icon tf-icons bx bx-download"></i>Unduh CoA</a>
                                        @else
                                            Tidak ada file COA terkait
                                        @endif
                                    </span>
                                </div>
                            </li>
                        </div>

                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
