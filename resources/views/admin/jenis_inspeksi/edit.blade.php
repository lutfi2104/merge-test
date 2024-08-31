@extends('layouts.dashboard')
@section('content')
<div class="container">
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <form action="{{ route('jenis_inspeksi.update', $jenis_inspeksi->id) }}" method="POST">  <!-- Huruf "I" besar -->
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Jenis Inspeksi</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $jenis_inspeksi->name }}" required>  <!-- Huruf "I" besar -->
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

</div>
@endsection
