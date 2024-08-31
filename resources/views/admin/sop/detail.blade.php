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
                    <a href="{{ route('sop.index') }}" class="btn btn-secondary">Kembali</a>
                </div>

                @if (auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Admin QC'))
                    <div>
                        <a href="{{ route('sop.edit', $sop->id) }}" class="btn btn-primary">Edit Dokumen</a>
                    </div>
                @endif
            </div>

            <div class="row">
                <div class="col-md-6 ">
                    <ul class="list-group">
                        <div class="row">
                            @if (optional(\Carbon\Carbon::parse($sop->tgl_efektif))->format('j F Y'))
                                <li class="list-group-item d-flex">
                                    <div class="col-md-5 ">
                                        <span><strong>Tanggal Efektif:</strong></span>
                                    </div>
                                    <div class="col-md-7">
                                        <span>:&nbsp;{{ optional(\Carbon\Carbon::parse($sop->tgl_efektif))->format('j F Y') }}</span>
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

                                    <span>:&nbsp;{{ $sop->judul }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Revisi</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $sop->revisi }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>PIC</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $sop->pics->name }}</span>
                                </div>
                            </li>
                        </div>

                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">
                                    <span><strong>Dokumen</strong></span>
                                </div>
                                <div class="col-md-7">
                                    <span>:&nbsp;{{ $sop->jenis }}</span>
                                </div>
                            </li>
                        </div>



                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Status</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $sop->status }}</span>
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

                                    <span>:&nbsp;{{ $sop->dep->departement }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Copy Document</strong></span>
                                </div>
                                <div class="col-md-7">
                                    @if ($usersops->isNotEmpty())
                                        <span>:&nbsp;
                                            @foreach ($usersops->unique('departement_id') as $usersop)
                                                {{ $usersop->departement->departement }}{{ !$loop->last ? ', ' : '' }}
                                            @endforeach
                                        </span>
                                    @else
                                        <span>:&nbsp;Tidak ada data</span>
                                    @endif
                                </div>
                            </li>
                        </div>



                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Rincian Revisi</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $sop->rincian_revisi }}</span>
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
                                        @if ($sop->file)
                                            <a href="{{ asset('storage/files/' . $sop->file) }}"
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
