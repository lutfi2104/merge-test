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
                    <a href="{{ route('revisi.show') }}" class="btn btn-secondary">Kembali</a>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6 ">
                    <ul class="list-group">
                        <div class="row">
                            @if (optional(\Carbon\Carbon::parse($revisi->tgl_efektif))->format('j F Y'))
                                <li class="list-group-item d-flex">
                                    <div class="col-md-5 ">
                                        <span><strong>Tanggal Efektif:</strong></span>
                                    </div>
                                    <div class="col-md-7">
                                        <span>:&nbsp;{{ optional(\Carbon\Carbon::parse($revisi->tgl_efektif))->format('j F Y') }}</span>
                                    </div>
                                </li>
                            @endif

                            <!-- Ulangi pola di atas untuk baris lain yang ingin ditampilkan/disembunyikan secara kondisional -->

                        </div>

                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>judul</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $revisi->judul }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Revisi</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $revisi->revisi }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>PIC</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $revisi->pic }}</span>
                                </div>
                            </li>
                        </div>

                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">
                                    <span><strong>Dokumen</strong></span>
                                </div>
                                <div class="col-md-7">
                                    <span>:&nbsp;{{ $revisi->jenis }}</span>
                                </div>
                            </li>
                        </div>



                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Status</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $revisi->status }}</span>
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

                                    <span><strong>Departemen</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $revisi->dept }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Rincian Revisi</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $revisi->rincian_revisi }}</span>
                                </div>
                            </li>
                        </div>


                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">
                                    <span><strong>File Dok</strong></span>
                                </div>
                                <div class="col-md-7">
                                    <span>
                                        @if ($revisi->file)
                                            <a href="{{ asset('storage/files/' . $revisi->file) }}"
                                                class="btn btn-primary btn-sm" target="_blank">View</a>
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
