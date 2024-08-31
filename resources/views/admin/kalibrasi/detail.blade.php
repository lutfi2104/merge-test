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
                    <a href="{{ route('kalibrasi.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
                <div>
                    <a href="{{ route('kalibrasi.edit', $kalibrasi->id) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 ">
                    <ul class="list-group">
                        <div class="row">
                            @if(optional(\Carbon\Carbon::parse($kalibrasi->tgl_kalibrasi))->format('j F Y'))
                                <li class="list-group-item d-flex">
                                    <div class="col-md-5 ">
                                        <span><strong>Kalibrasi Selanjutnya:</strong></span>
                                    </div>
                                    <div class="col-md-7">
                                        <span>:&nbsp;{{ optional(\Carbon\Carbon::parse($kalibrasi->tgl_kalibrasi))->format('j F Y') }}</span>
                                    </div>
                                </li>
                            @endif

                            <!-- Ulangi pola di atas untuk baris lain yang ingin ditampilkan/disembunyikan secara kondisional -->

                        </div>

                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Nama Alat</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $kalibrasi->nama_alat}}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Merk Alat</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $kalibrasi->merk }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Type/Model</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $kalibrasi->type }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>No Seri</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $kalibrasi->no_seri }}</span>


                                </div>
                            </li>
                        </div>
                        <div class="row">
                                <li class="list-group-item d-flex">
                                    <div class="col-md-5">
                                        <span><strong>Rentang Ukur</strong></span>
                                    </div>
                                    <div class="col-md-7">
                                        <span>:&nbsp;{{ $kalibrasi->rentang_ukur }}</span>
                                    </div>
                                </li>
                        </div>

                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Kalibrasi</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $kalibrasi->kalibrasi }}</span>


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

                                <span><strong>Kalibrator</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $kalibrasi->kalibrator }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Verifikasi</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $kalibrasi->verifikasi }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Resolusi</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $kalibrasi->resolusi }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Penempatan</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $kalibrasi->tempat }}</span>
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
                                @if($kalibrasi->sertifikat)
                                    <a href="{{ asset("storage/coa/{$kalibrasi->sertifikat}") }}" target="_blank">:&nbsp;{{ $kalibrasi->sertifikat }}</a>
                                    <a href="{{ route('kalibrasi.download', $kalibrasi->id) }}" class="btn btn-primary mt-2"><i class="menu-icon tf-icons bx bx-download"></i>Unduh Sertifikat</a>
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
