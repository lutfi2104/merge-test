@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="gap-2 mb-4 d-flex justify-content-md-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#importModalsop">Import</button>
                <button type="button" class="btn btn-secondary">Export</button>
            </div>

            @include('layouts.importExport')
            <form action="{{ route('sop.store') }}" method="POST" enctype="multipart/form-data" id="form-create">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jenis" class="form-label">Doc:</label>
                            <select name="jenis" class="form-control @error('jenis') is-invalid @enderror">
                                <option selected value="">Pilih Jenis</option>
                                @foreach ($jenis as $item)
                                    <option value="{{ $item }}" {{ old('jenis') == $item ? 'selected' : '' }}>
                                        {{ $item }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jenis')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="dept" class="form-label">Departemen:</label>
                            <select name="dept" class="form-control @error('dept') is-invalid @enderror" id="dept">
                                <option selected value="">Pilih Departemen</option>
                                @foreach ($usersops as $usersop)
                                    <option value="{{ $usersop->departement_id }}"
                                        {{ old('dept', Auth::user()->departement_id) == $usersop->departement_id ? 'selected' : '' }}>
                                        {{ $usersop->departement->departement }}
                                    </option>
                                @endforeach
                            </select>
                            @error('dept')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pic" class="form-label">PIC:</label>
                            <select name="pic" class="form-control @error('pic') is-invalid @enderror">
                                <option selected value="">Pilih PIC</option>
                                @foreach ($usersopss as $usersop)
                                    <option value="{{ $usersop->user_id }}"
                                        {{ old('pic', Auth::user()->id) == $usersop->user_id ? 'selected' : '' }}>
                                        {{ $usersop->usersop->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('pic')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul:</label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                                required value="{{ old('judul') }}">
                            @error('judul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="kode_dokumen" class="form-label">Kode Dokumen:</label>
                            <input type="text" name="kode_dokumen"
                                class="form-control @error('kode_dokumen') is-invalid @enderror" required
                                value="{{ old('kode_dokumen') }}">
                            <small class="text-muted">*Jika tidak tahu kode dokumen, silahkan input kode random</small>
                            @error('kode_dokumen')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="revisi" class="form-label">Revisi:</label>
                            <input type="number" name="revisi" class="form-control @error('revisi') is-invalid @enderror"
                                required value="{{ old('revisi') }}">
                            <small class="text-muted">*Jika tidak tahu no revisinya, silahkan input no random</small>
                            @error('revisi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tgl_efektif" class="form-label">Tanggal Efektif:</label>
                            <input type="date" name="tgl_efektif"
                                class="form-control @error('tgl_efektif') is-invalid @enderror" required
                                value="{{ old('tgl_efektif') }}">
                            <small class="text-muted">*Jika tidak tahu tanggal efektifnya, silahkan input no random</small>
                            @error('tgl_efektif')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="copy_doc" class="form-label">Copy Document:</label>
                            <select name="copy_doc[]"
                                class="form-control selectpicker @error('copy_doc') is-invalid @enderror" multiple
                                id="copy_doc">
                                <option value="">Pilih Departemen</option>
                                @foreach ($usersops->unique('departement_id') as $usersop)
                                    <option value="{{ $usersop->departement_id }}"
                                        {{ collect(old('copy_doc'))->contains($usersop->departement_id) ? 'selected' : '' }}>
                                        {{ $usersop->departement->departement }}
                                    </option>
                                @endforeach
                            </select>
                            @error('copy_doc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="file" class="form-label">File (PDF, EXCEL, WORD):</label>
                            <input type="file" name="file" class="form-control @error('file') is-invalid @enderror"
                                required value="{{ old('file') }}">
                            @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @if (auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Admin QC'))
                            <div class="mb-3">
                                <label for="status" class="form-label">Status:</label>
                                <select name="status"
                                    class="form-control @error('status
                            ') is-invalid @enderror">
                                    <option selected value="">Pilih Status</option>
                                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="final" {{ old('status') == 'final' ? 'selected' : '' }}>Final</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        @else
                            <!-- Jika bukan super admin atau admin QC, secara otomatis pilih draft -->
                            <input type="hidden" name="status" value="draft">
                        @endif
                        <button type="submit" class="btn btn-primary">Buat Dokumen</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
@endsection
