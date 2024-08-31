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
                <a href="{{ route('spec.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
            <div>
                <a href="{{ route('spec.edit', $specs->id) }}" class="btn btn-primary">Edit Spec</a>
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
                                <span>:&nbsp;{{ $specs->produk->name }}</span>
                            </div>
                        </li>

                    </div>

                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Bulk Density</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $specs->bulk_density()->min || $specs->bulk_density()->max ? $specs->bulk_density()->min . ' - ' . $specs->bulk_density()->max : '-' }}</span>
                            </div>
                        </li>
                    </div>
                    @if ($specs->mesh_20 != null)
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Mesh 20</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $specs->mesh_20 }}</span>
                            </div>
                        </li>
                    </div>
                    @endif
                    @if ($specs->mesh_40 != null)
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Mesh 40</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $specs->mesh_40 }}</span>
                            </div>
                        </li>
                    </div>
                    @endif
                    @if ($specs->mesh_5_6 != null)
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">
                                <span><strong>Mesh 5-6</strong></span>
                            </div>
                            <div class="col-md-7">
                                <span>:&nbsp;{{ $specs->mesh_5_6 }}</span>
                            </div>
                        </li>
                    </div>
                    @endif
                    @if ($specs->mesh_40_max != null)
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">
                                <span><strong>Mesh 20 (OBC 300 MFD) Max</strong></span>
                            </div>
                            <div class="col-md-7">
                                <span>:&nbsp;{{ $specs->mesh_20_max }}</span>
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
                                <span>:&nbsp;{{ $specs->mesh_4 }}</span>
                            </div>
                        </li>
                    </div>



                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Mesh 4-6</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $specs->mesh_4_6 }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Mesh 3</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $specs->mesh_3 }}</span>
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

                                <span><strong>Salinity</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $specs->salinity }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Mesh 3-5</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $specs->mesh_3_5 }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Salmonella</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $specs->salmonella }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Aerobic Plate Count</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $specs->tpc }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">
                                <span><strong>Enterobacteria</strong></span>
                            </div>
                            <div class="col-md-7">
                                <span>:&nbsp;{{ $specs->entero }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">
                                <span><strong>Yeast & Mold</strong></span>
                            </div>
                            <div class="col-md-7">
                                <span>:&nbsp;{{ $specs->ym }}</span>
                            </div>
                        </li>
                    </div>

                </ul>
            </div>
        </div>

    </div>
</div>
@endsection
