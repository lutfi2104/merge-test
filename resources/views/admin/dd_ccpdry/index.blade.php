@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-md-end mb-4 gap-2">
                <a class="btn btn-primary" href="{{ route('dd_ccpdry.create') }}" role="button">Create Uji DD</a>
                <a href="{{ route('ccpdry.export') }}" class="btn btn-secondary">Export</a>
            </div>
            <table class="table myTable">
                <thead>
                    <tr>
                        <th class="text-nowrap" style="width: 20px">No</th>
                        <th class="text-nowrap">Tanggal</th>
                        <th class="text-nowrap">Jam</th>
                        <th class="text-nowrap">DD 1</th>
                        <th class="text-nowrap">Foto DD1</th>
                        <th class="text-nowrap">DD 2</th>
                        <th class="text-nowrap">Foto DD2</th>
                        <th class="text-nowrap">DD 3</th>
                        <th class="text-nowrap">Foto DD3</th>
                        <th class="text-nowrap">DD 4</th>
                        <th class="text-nowrap">Foto DD4</th>
                        <th class="text-nowrap">Catatan</th>
                        @if (auth()->user()->hasRole('Admin PRD') ||
                                auth()->user()->hasRole('Admin') ||
                                auth()->user()->hasRole('Spv PRD') ||
                                auth()->user()->hasRole('Super Admin'))
                            <th class="text-nowrap">Action</th>
                        @endif

                    </tr>
                </thead>
                <tbody>
                    @foreach ($produks as $item)
                        <tr>
                            <td class="text nowrap"> {{ $loop->iteration }} </td>
                            <td class="text nowrap"> {{ date('d M Y', strtotime($item->tanggal)) }} </td>
                            <td class="text nowrap"> {{ \Carbon\Carbon::parse($item->jam)->format('H:i') }} </td>
                            <td class="text nowrap"> {{ $item->dd1 }} </td>
                            <td class="text nowrap">
                                <a href="{{ asset('storage/dd1/' . $item->foto1) }}">
                                    <img class="img-fluid" width="60px" src="{{ asset('storage/dd1/' . $item->foto1) }}">

                                </a>
                            </td>
                            <td class="text nowrap"> {{ $item->dd2 }} </td>
                            <td class="text nowrap">
                                <a href="{{ asset('storage/dd2/' . $item->foto2) }}">
                                    <img class="img-fluid" width="60px" src="{{ asset('storage/dd2/' . $item->foto2) }}">

                                </a>
                            </td>
                            <td class="text nowrap"> {{ $item->dd3 }} </td>
                            <td class="text nowrap">
                                <a href="{{ asset('storage/dd3/' . $item->foto3) }}">
                                    <img class="img-fluid" width="60px" src="{{ asset('storage/dd3/' . $item->foto3) }}">

                                </a>
                            </td>
                            <td class="text nowrap"> {{ $item->dd4 }} </td>
                            <td class="text nowrap">
                                <a href="{{ asset('storage/dd4/' . $item->foto4) }}">
                                    <img class="img-fluid" width="60px" src="{{ asset('storage/dd4/' . $item->foto4) }}">

                                </a>
                            </td>
                            <td class="text nowrap"> {{ $item->catatan }} </td>
                            @if (auth()->user()->hasRole('Admin PRD') ||
                                    auth()->user()->hasRole('Admin') ||
                                    auth()->user()->hasRole('Spv PRD') ||
                                    auth()->user()->hasRole('Super Admin'))
                                <td>
                                    <div class="d-flex gap-2">
                                        <a class="btn btn-primary text-center" href="#" role="button">Detail</a>
                                        <a class="btn btn-warning text-center"
                                            href="{{ route('dd_ccpdry.edit', $item->id) }}" role="button">Edit</a>
                                        <form action="{{ route('dd_ccpdry.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>

                                </td>
                            @endif

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
