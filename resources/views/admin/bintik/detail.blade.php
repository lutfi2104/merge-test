@extends('layouts.dashboard')

@section('content')
    {{-- <style>
    * {
        border: 1px solid red
    }
    </style> --}}
    <div class="card">
        <div class="card-body d-flex flex-column">
            <div class="mt-0 mb-3 d-flex ">
                <div>
                    <a href="{{ route('bintik_hitam.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
                <!-- <div>
                    <a href="{{ route('bintik_hitam.edit', $bintiks->id) }}" class="btn btn-primary">Edit</a>
                </div> -->
            </div>

            <div class="row">

                @for ($i = 1; $i <= 4; $i++)
                <div class="col-md-3">

                    <ul class="list-group">
                        <div class="row">
                            @if (optional(\Carbon\Carbon::parse($bintiks->tanggal))->format('j F Y'))
                                <li class="list-group-item d-flex">
                                    <div class="col-md-5">
                                        <span><strong>Tanggal:</strong></span>
                                    </div>
                                    <div class="col-md-7">
                                        <span>:&nbsp;{{ optional(\Carbon\Carbon::parse($bintiks->tanggal))->format('j F Y') }}</span>
                                    </div>
                                </li>
                            @endif
                        </div>

                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">
                                    <span><strong>Jam</strong></span>
                                </div>
                                <div class="col-md-7">
                                    <span>:&nbsp;{{ $bintiks->jam }}</span>
                                </div>
                            </li>
                        </div>


                            <div class="row">
                                <li class="list-group-item d-flex">
                                    <div class="col-md-5">
                                        <span><strong>Nama Produk</strong></span>
                                    </div>
                                    <div class="col-md-7">
                                        <span>:&nbsp;{{  $bintiks->{"produk$i"}->nama_prd }}</span>
                                    </div>
                                </li>
                            </div>

                            <div class="row">
                                <li class="list-group-item d-flex">
                                    <div class="col-md-5">
                                        <span><strong>Suhu DD {{ $i }}</strong></span>
                                    </div>
                                    <div class="col-md-7">
                                        <span>:&nbsp;{{ $bintiks->{"dd$i"} }}</span>
                                    </div>
                                </li>
                            </div>

                            <div class="row">
                                <li class="list-group-item d-flex">
                                    <div class="col-md-5">
                                        <span><strong>Bintik Hitam DD {{ $i }}</strong></span>
                                    </div>
                                    <div class="col-md-7">
                                        <span>:&nbsp;{{ $bintiks->{"bintik_hitam_dd$i"} }}</span>
                                    </div>
                                </li>
                            </div>

                            <div class="row">
                                <li class="list-group-item d-flex">
                                    <div class="col-md-5">
                                        <span><strong>Partikel Hitam DD {{ $i }}</strong></span>
                                    </div>
                                    <div class="col-md-7">
                                        <span>:&nbsp;{{ $bintiks->{"partikel_hitam_dd$i"} }}</span>
                                    </div>
                                </li>
                            </div>

                            <div class="row">
                                <li class="list-group-item d-flex">
                                    <div class="col-md-5">
                                        <span><strong>Benda Asing DD {{ $i }}</strong></span>
                                    </div>
                                    <div class="col-md-7">
                                        <span>:&nbsp;{{ $bintiks->{"benda_asing_dd$i"} }}</span>
                                    </div>
                                </li>
                            </div>
                            <div class="row">
                                <li class="list-group-item d-flex">
                                    <div class="col-md-5">
                                        <span><strong>Catatan DD {{ $i }}</strong></span>
                                    </div>
                                    <div class="col-md-7">
                                        <span>:&nbsp;{{ $bintiks->{"catatan_dd$i"} }}</span>
                                    </div>
                                </li>
                            </div>
                            <div class="row">
                                <li class="list-group-item d-flex">
                                    <div class="col-md-5">
                                        <span><strong>Diinput Oleh </strong></span>
                                    </div>
                                    <div class="col-md-7">
                                        <span>:&nbsp;{{ $bintiks->op}}</span>
                                    </div>
                                </li>
                            </div>
                        </ul>
                    </div>
                    @endfor
            </div>
        </div>
    </div>
@endsection
