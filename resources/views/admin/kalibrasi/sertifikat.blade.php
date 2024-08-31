@extends('layouts.dashboard')
@section('content')
{{-- <style>
    * {
        border: 1px solid red
    }
</style> --}}
<div class="d-flex justify-content-end" style="margin-top: -50px; margin-bottom: 10px">
    <a href="{{ route('kalibrasi.index') }}" class="btn btn-primary">Kembali</a>
</div>
<div class="card">

        <iframe src="{{ asset('storage/sertifikat_kalibrasi/' . basename($sertifikat)) }}" width="100%" height="600px"></iframe>

</div>
{{-- Tampilkan sertifikat menggunakan tag iframe --}}


{{-- Jika Anda ingin menambahkan tombol kembali atau fitur lainnya, dapat ditambahkan di sini --}}

@endsection
