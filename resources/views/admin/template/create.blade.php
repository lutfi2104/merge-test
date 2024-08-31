@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="gap-2 d-flex justify-content-md-end mb-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#importModaltemplate">Import</button>
                    {{-- <a href="{{ route('data.destroyFromExcel') }}" class="btn btn-secondary">Export</a> --}}
            </div>

            @include('layouts.importExport')
            <form method="POST" action="{{ route('template.store') }}" enctype="multipart/form-data" id="form-create">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="name" class="form-label">Nama Template CoA</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" value="{{ old('name') }}" placeholder="masukan template">
                        @error('name')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="kriteria_id" class="form-label">Parameter</label>
                    </div>
                    <div class="col-md-10">
                        @php
                            $rowCount = ceil(count($kriterias) / 3);
                            $currentRow = 0;
                        @endphp

                        @foreach ($kriterias as $item)
                            @if ($currentRow == 0)
                                <div class="row">
                            @endif
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input name="kriteria_id[]" class="form-check-input" type="checkbox"
                                        value="{{ $item->id }}" id="kriteria_{{ $item->id }}">
                                    <label class="form-check-label" for="kriteria_{{ $item->id }}">
                                        {{ $item->name }}
                                    </label>
                                </div>
                            </div>
                            @php
                                $currentRow++;
                                // dd($currentRow);
                                if ($currentRow == $rowCount || $loop->last) {
                                    echo '</div>';
                                    $currentRow = 0;
                                }
                            @endphp
                        @endforeach
                        @error('kriteria_id')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-10"><button type="submit" class="btn btn-primary">Create</button></div>
                </div>
            </form>

        </div>
    </div>
@endsection
