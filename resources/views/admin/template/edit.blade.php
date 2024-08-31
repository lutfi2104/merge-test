@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('template.update', $template->id) }}" enctype="multipart/form-data" id="form-edit">
                @csrf
                @method('put')


                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="name" class="form-label">Nama</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" value="{{ old('name', $template->name) }}" placeholder="masukan template">
                        @error('name')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="kriteria_id" class="form-label">Kriteria</label>
                    </div>
                    <div class="col-md-10">
                        @foreach ($kriterias as $item)
                            <div class="form-check">
                                <input name="kriteria_id[]" class="form-check-input" type="checkbox"
                                    value="{{ $item->id }}"
                                    {{ in_array($item->id, json_decode($template->kriteria_id)) ? 'checked' : '' }}>
                                <label class="form-check-label" for="">
                                    {{ $item->name }}
                                </label>
                            </div>
                        @endforeach
                        {{-- @dd($template->kriteria_id); --}}


                        @error('kriteria_id')
                            <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-10"><button type="submit" class="btn btn-primary">Update</button></div>
                </div>
            </form>
            <!-- Modal Body -->
            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->


        </div>
    </div>
@endsection
