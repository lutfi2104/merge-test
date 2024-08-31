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
                    <a href="{{ route('etiket.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
                <div>
                    <a href="{{ route('etiket.edit', $etiket->id) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 ">
                    <ul class="list-group">
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-3">

                                    <span><strong>Nama Lengkap</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $etiket->nama }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-3">

                                    <span><strong>Departement</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $etiket->dept->departement }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-3">

                                    <span><strong>Jenis Support</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $etiket->jenis_bantuan }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-3">

                                    <span><strong>Prioritas</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $etiket->prioritas }}</span>


                                </div>
                            </li>
                        </div>

                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-3">

                                    <span><strong>Status</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $etiket->status }}</span>
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
                                <div class="col-md-2">

                                    <span><strong>Subject</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $etiket->subject }}</span>


                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-2">

                                    <span><strong>Content</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $etiket->content }}</span>
                                </div>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
