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
                    <a href="{{ route('customer.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
                <div>
                    <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 ">
                    <ul class="list-group">
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Nama Customer</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $customer->nama_customer}}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>PIC</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $customer->pic }}</span>
                                </div>
                            </li>
                        </div>
                        <div class="row">
                            <li class="list-group-item d-flex">
                                <div class="col-md-5">

                                    <span><strong>Phone</strong></span>
                                </div>
                                <div class="col-md-7">

                                    <span>:&nbsp;{{ $customer->phone }}</span>
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

                                <span><strong>Alamat</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $customer->address }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Provinsi</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $customer->province }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Kota</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $customer->city }}</span>
                            </div>
                        </li>
                    </div>



                    </div>
                   </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
