@extends('layouts.dashboard')
@section('content')
<div class="container">
{{--
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <form action="{{ route('jenis_inspeksi.store') }}" method="POST" enctype="multipart/form-data" id="form-create">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Jenis Inspeksi</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
