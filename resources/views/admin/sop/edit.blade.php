@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('sop.update', ['sop' => $sop]) }}" method="POST" enctype="multipart/form-data"
                id="form-edit">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jenis" class="form-label">Doc:</label>
                            <select name="jenis" class="form-control @error('jenis') is-invalid @enderror">
                                <option selected value="">Pilih Jenis</option>
                                @foreach ($jeniss as $item)
                                    <option value="{{ $item }}"
                                        {{ old('jenis', $sop->jenis) == $item ? 'selected' : '' }}>
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
                                @foreach ($usersops as $item)
                                    <option value="{{ $item->departement_id }}"
                                        {{ old('dept', $sop->dept) == $item->departement_id ? 'selected' : '' }}>
                                        {{ $item->departement->departement }}
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
                            <label for="copy_doc" class="form-label">Copy Dokument:</label>
                            <select name="copy_doc[]"
                                class="form-control selectpicker  @error('copy_doc') is-invalid @enderror" multiple>
                                @foreach ($usersops as $item)
                                    <option value="{{ $item->departement_id }}"
                                        {{ in_array($item->departement_id, $copyDocIds ?? []) ? 'selected' : '' }}>
                                        {{ $item->departement->departement }}
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
                            <label for="pic" class="form-label">PIC:</label>
                            <select name="pic" class="form-control @error('pic') is-invalid @enderror">
                                <option selected value="">Pilih PIC</option>
                                @foreach ($usersopss as $item)
                                    <option value="{{ $item->user_id }}"
                                        {{ old('pic', $sop->pic) == $item->user_id ? 'selected' : '' }}>
                                        {{ $item->usersop->name }}
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
                                value="{{ old('judul', $sop->judul) }}" required>
                            @error('judul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="rincian_revisi" class="form-label">Rincian Revisi:</label>
                            <textarea name="rincian_revisi" class="form-control @error('rincian_revisi') is-invalid @enderror" rows="4"></textarea>
                            @error('rincian_revisi')
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
                                class="form-control @error('kode_dokumen') is-invalid @enderror"
                                value="{{ old('kode_dokumen', $sop->kode_dokumen) }}" required>
                            @error('kode_dokumen')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="revisi" class="form-label">Revisi:</label>
                            <input type="number" name="revisi" class="form-control @error('revisi') is-invalid @enderror"
                                value="{{ old('revisi', $sop->revisi) }}" required>
                            @error('revisi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tgl_efektif" class="form-label">Tanggal Efektif:</label>
                            <input type="date" name="tgl_efektif"
                                class="form-control @error('tgl_efektif') is-invalid @enderror"
                                value="{{ old('tgl_efektif', $sop->tgl_efektif) }}" required>
                            @error('tgl_efektif')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">File (PDF, DOC, DOCX):</label>
                            <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
                            @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status:</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="draft" {{ old('status', $sop->status) == 'draft' ? 'selected' : '' }}>
                                    Draft
                                </option>
                                <option value="final" {{ old('status', $sop->status) == 'final' ? 'selected' : '' }}>
                                    Final
                                </option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update SOP</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
