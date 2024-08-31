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
                <a href="{{ route('lkt.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
            <div>
                <a href="{{ route('lkt.edit', $lkt) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 ">
                <ul class="list-group">
                    <div class="row">
                        @if(optional(\Carbon\Carbon::parse($lkt->tanggal))->format('j F Y'))
                        <li class="list-group-item d-flex">
                            <div class="col-md-5 ">
                                <span><strong>Tanggal Ketidaksesuaiaan:</strong></span>
                            </div>
                            <div class="col-md-7">
                                <span>:&nbsp;{{ optional(\Carbon\Carbon::parse($lkt->tanggal))->format('j F Y') }}</span>
                            </div>
                        </li>
                        @endif

                        <!-- Ulangi pola di atas untuk baris lain yang ingin ditampilkan/disembunyikan secara kondisional -->

                    </div>

                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Nama Inisiator</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $lkt->nama_inisiator}}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Departemant</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $lkt->departement }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Type Ketidaksesuaiaan</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $lkt->type_lkt }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Jenis Ketidaksesuaian</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $lkt->jenis }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Nama Produk</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $lkt->nama_produk }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Kode Produksi</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $lkt->kode_produk }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Jumlah Produk</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $lkt->jumlah_produk }}</span>
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

                                <span><strong>Subject</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $lkt->subject }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Deskripsi Ketidaksesuaiaan</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $lkt->isi }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Status Produk</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $lkt->status }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Data Pelanggan</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $lkt->pelanggan }}</span>
                            </div>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item d-flex">
                            <div class="col-md-5">

                                <span><strong>Berhubungan dengan Halal?</strong></span>
                            </div>
                            <div class="col-md-7">

                                <span>:&nbsp;{{ $lkt->halal }}</span>
                            </div>
                        </li>
                    </div>
            </div>
            </ul>
        </div>
    </div>
</div>

<div class="card my-4">
    <div class="card-header mt-0 mb-3 d-flex justify-content-between">

        <div>
            <h5 class="card-title mb-0">Jawaban Komplain</h5>
        </div>

        <div>

            <a href="{{ route('lktcor.edit', $lkt) }}" id="editButton" class="btn btn-primary">Edit</a>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            @forelse ($lktcor as $item)
            @if ($item->lkt_id == $lkt->id)
            <div class="col-md-12 mb-3">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-12">
                                <span><strong>Nama PIC</strong></span>
                            </div>
                            <div class="col-md-12 mt-2">
                                <span>{{ $item->nama_pic }}</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-12 mb-3">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-12">
                                <span><strong>Akar Masalah</strong></span>
                            </div>
                            <div class="col-md-12 mt-2">
                                <span>&nbsp;{{ $item->root_cause }}</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-12 mb-3">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-12">
                                <span><strong>Corractive Action</strong></span>
                            </div>
                            <div class="col-md-12 mt-2">
                                <span>{{ $item->corrective_action }}</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-12 mb-3">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-12">
                                <span><strong>Preventive Action</strong></span>
                            </div>
                            <div class="col-md-12 mt-2">
                                <span>{{ $item->preventive_action }}</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-12 mb-3">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-12">
                                <span><strong>Due Date</strong></span>
                            </div>
                            <div class="col-md-12 mt-2">
                                <span>{{ $item->due_date }}</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            @endif
            @empty
            <div class="col-md-12">
                <p class="text-muted">Tidak ada data.</p>
            </div>

            @endforelse
        </div>
    </div>
</div>



<div class="card">
    <div class="card-body">

        @if(!$lktcorExists)
        <form action="{{ route('lktcor.tambah', $lkt->id) }}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="root_cause" class="col-sm-4 col-form-label">Root Cause</label>
                <div class="col-sm-8">
                    <textarea name="root_cause" class="form-control my-3" cols="30" placeholder="isi kritik" rows="7"> {{old('root_cause')}}</textarea>
                </div>
            </div>
            @error('root_cause')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group row">
                <label for="corrective_action" class="col-sm-4 col-form-label">Corrective Action</label>
                <div class="col-sm-8">
                    <textarea name="corrective_action" class="form-control my-3" cols="30" placeholder="isi kritik" rows="7">{{ old('corrective_action')}}</textarea>
                </div>
            </div>
            @error('corrective_action')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group row">
                <label for="preventive_action" class="col-sm-4 col-form-label">Preventive Action</label>
                <div class="col-sm-8">
                    <textarea name="preventive_action" class="form-control my-3" cols="30" placeholder="isi kritik" rows="7">{{ old('preventive_action')}}</textarea>
                </div>
            </div>
            @error('preventive_action')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group row">
                <label for="tanggal_isi" class="col-sm-4 col-form-label">Tanggal Isi</label>
                <div class="col-sm-8">
                    <input type="date" name="tanggal_isi" class="form-control" value="{{ old('tanggal_isi') }}">
                </div>
            </div>
            @error('tanggal_isi')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group row">
                <label for="due_date" class="col-sm-4 col-form-label">Due Date</label>
                <div class="col-sm-8">
                    <input type="date" name="due_date" class="form-control" value="{{ old('due_date') }}">
                </div>
            </div>
            @error('due_date')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="row mt-3">
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary" name="submit">Kirim Jawaban</button>
                </div>
            </div>
        </form>
        @endif
    </div>
</div>
<script>
    document.getElementById('editButton').addEventListener('click', function() {
        document.getElementById('editForm').style.display = 'block';
    });
</script>
@endsection
