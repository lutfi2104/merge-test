@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="gap-2 d-flex justify-content-md-end mb-4">
                @if (auth()->user()->hasRole('Adminprd') ||
                        auth()->user()->hasRole('Admin') ||
                        auth()->user()->hasRole('prdup'))
                    <a href="{{ route('baking_eb.export') }}" class="btn btn-secondary">Export</a>
                @endif
            </div>
            <div class="d-flex justify-content-md-end mb-4">
                <a class="btn btn-primary" href="{{ route('baking_eb.create') }}" role="button">Create Uji Baking G2</a>
            </div>
            <table class="table myTable">
                <thead>
                    <tr>
                        <th class="text-nowrap" style="width: 20px">No</th>
                        <th class="text-nowrap">Tanggal</th>
                        <th class="text-nowrap">Produk</th>
                        <th class="text-nowrap">No Batch</th>
                        <th class="text-nowrap">No Mixer</th>
                        <th class="text-nowrap">Air</th>
                        <th class="text-nowrap">Mixing In</th>
                        <th class="text-nowrap">Mixing Out</th>
                        <th class="text-nowrap">Profing In</th>
                        <th class="text-nowrap">Proofing Out</th>
                        <th class="text-nowrap">Baking In</th>
                        <th class="text-nowrap">Baking Out</th>
                        <th class="text-nowrap">No EB</th>
                        <th class="text-nowrap">No Gerobak</th>
                        <th class="text-nowrap">Suhu Produk</th>
                        @if (auth()->user()->hasRole('Admin PRD') ||
                                            auth()->user()->hasRole('Admin QC') ||
                                            auth()->user()->hasRole('Spv PRD') ||
                                            auth()->user()->hasRole('Super Admin'))
                        <th class="text-nowrap">Created At</th>
                        @endif
                        <th class="text-nowrap">Action</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($bakingEbs as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ date('d M Y', strtotime($item->tanggal)) }}</td>
                            <td class="text-center">{{ $item->produk->nama_prd }}</td>
                            <td class="text-center">{{ $item->no_batch }}</td>
                            <td class="text-center">{{ $item->no_mixer }}</td>
                            <td class="text-center">{{ $item->tambah_air }} ml</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($item->mixing_in)->format('H:i') }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($item->mixing_out)->format('H:i') }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($item->proofing_in)->format('H:i') }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($item->profing_out)->format('H:i') }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($item->baking_in)->format('H:i') }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($item->baking_out)->format('H:i') }}</td>
                            <td class="text-center">{{ $item->no_eb }}</td>
                            <td class="text-center">{{ $item->no_gerobak }}</td>
                            <td class="text-center">{{ $item->suhu_produk }}</td>
                            @if (auth()->user()->hasRole('Admin PRD') ||
                                            auth()->user()->hasRole('Admin QC') ||
                                            auth()->user()->hasRole('Spv PRD') ||
                                            auth()->user()->hasRole('Super Admin'))
                            <td class="text-center">{{ $item->created_at }}</td>
                            @endif
                            <td>
                                <div class="d-flex gap-2">


                                    <a class="btn btn-primary text-center" href="{{ route('baking_eb.show', $item->id) }}" role="button">Detail</a>
                                    @if (auth()->user()->hasRole('Admin PRD') ||
                                            auth()->user()->hasRole('Admin QC') ||
                                            auth()->user()->hasRole('Spv PRD') ||
                                            auth()->user()->hasRole('Super Admin'))
                                        <a class="btn btn-warning text-center"
                                            href="{{ route('baking_eb.edit', $item->id) }}" role="button">Edit</a>
                                        <form action="{{ route('baking_eb.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                        @endif

                                </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
