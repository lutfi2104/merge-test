@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-md-end mb-4">
                <a class="btn btn-primary" href="{{ route('template.create') }}" role="button">Tambah Template</a>
            </div>
            <table class="table myTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th class="text-center" scope="col">Nama Template CoA</th>
                        <th class="text-center" scope="col">Parameter</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($templates as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->name }}</td>
                            <td class="text-center">
                                <ul class="p-0" style="list-style: none">
                                    @foreach ($item->kriterias() as $kriteria)
                                        <li>
                                            {{ $kriteria->name }}
                                        </li>
                                    @endforeach
                                </ul>
                            </td>

                            <td>
                                <div class="d-flex gap-2">
                                    <a class="btn btn-warning text-center" href="{{ route('template.edit', $item->id) }}"
                                        role="button">Edit</a>
                                    <form action="{{ route('template.destroy', $item->id) }}" method="post" id="form-delete{{ $item->id }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" onclick="hapus_data('#form-delete{{ $item->id }}')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
