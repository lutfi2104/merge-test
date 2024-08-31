@extends('layouts.dashboard')

@section('content')
<div class="card">
    <div class="card-body">

        <p>Judul: {{ $sop->judul }}</p>
        <p>Kode Dokumen: {{ $sop->kode_dokumen }}</p>
        <!-- tambahkan elemen lain sesuai kebutuhan -->

        <!-- Tampilkan isi dokumen -->
        <embed src="{{ asset('storage/files/' . $sop->file) }}" width="100%" height="500px" oncontextmenu="return false;"></embed>
    </div>
</div>
@endsection
