@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('etiket.store') }}" method="POST" enctype="multipart/form-data" id="form-create">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="conteiner-fluid">
                    <div class="row">
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" value="{{ old('nama', Auth::user()->name) }}" readonly>
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="departement_id" class="col-sm-4 col-form-label">Departement</label>
                            <div class="col-md-3">
                                <select class="form-select form-select-lg @error('departement_id') is-invalid @enderror"
                                    aria-label="Default select example" name="departement_id" id="departement_id">
                                    <option selected>--Pilih Departement--</option>
                                    @foreach ($dept as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('departement_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->departement }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('departement_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jenis_bantuan" class="col-sm-4 col-form-label">Jenis Support</label>
                            <div class="col-md-3">
                                <select class="form-select form-select-lg @error('jenis_bantuan') is-invalid @enderror"
                                    aria-label="Default select example" name="jenis_bantuan" id="jenis_bantuan">
                                    <option selected>--Jenis Support--</option>
                                    @foreach ($jenis as $item)
                                        <option value="{{ $item }}"
                                            {{ old('jenis_bantuan') == $item ? 'selected' : '' }}>
                                            {{ $item }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('jenis_bantuan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="prioritas" class="col-sm-4 col-form-label">Prioritas</label>
                            <div class="col-md-3">
                                <select class="form-select form-select-lg @error('prioritas') is-invalid @enderror"
                                    aria-label="Default select example" name="prioritas" id="prioritas">
                                    <option selected>--Prioritas--</option>
                                    @foreach ($prioritas as $item)
                                        <option value="{{ $item }}"
                                            {{ old('prioritas') == $item ? 'selected' : '' }}>
                                            {{ $item }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('prioritas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="subject" class="col-sm-4 col-form-label">Subject</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                    id="subject" name="subject" value="{{ old('subject') }}">
                                @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="content" class="col-sm-4 col-form-label">Content</label>
                            <div class="col-md-8">
                                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5">{{ old('content') }} </textarea>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @if (auth()->user()->hasRole('Admin') ||
                                auth()->user()->hasRole('Spv PRD') ||
                                auth()->user()->hasRole('Super Admin') ||
                                auth()->user()->hasRole('Admin PRD') ||
                                auth()->user()->hasRole('Admin QC'))
                            <div class="mb-3 row">
                                <label for="status" class="col-sm-4 col-form-label">Status</label>
                                <div class="col-md-3">
                                    <select class="form-select form-select-lg @error('status') is-invalid @enderror"
                                        aria-label="Default select example" name="status" id="status">
                                        <option selected>--Status--</option>
                                        @foreach ($status as $item)
                                            <option value="{{ $item }}"
                                                {{ old('status') == $item ? 'selected' : '' }}>
                                                {{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        @endif

                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </div>
            </div>
    </form>
@endsection
