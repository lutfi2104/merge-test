@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="mt-0 mb-3 d-flex justify-content-between">
                <div>
                    @if (auth()->user()->hasRole('Admin PRD') ||
                            auth()->user()->hasRole('Admin') ||
                            auth()->user()->hasRole('Spv PRD') ||
                            auth()->user()->hasRole('Super Admin'))
                        <a href="{{ route('bintikhitam.export') }}" class="btn btn-secondary">Export</a>
                    @endif

                </div>
                <div class="d-flex justify-content-md-end mb-4">
                    <a class="btn btn-primary" href="{{ route('bintik_hitam.create') }}" role="button">Create</a>
                </div>
            </div>

            <table class="table myTable">
                <thead>
                    <tr>
                        <th class="text-nowrap" style="width: 20px">No</th>
                        <th class="text-nowrap">Tanggal</th>
                        <th class="text-nowrap">Jam</th>

                        <th class="text-nowrap">Suhu DD1</th>
                        <th class="text-nowrap">Bintik Hitam DD1</th>

                        <th class="text-nowrap">Suhu DD2</th>
                        <th class="text-nowrap">Bintik Hitam DD2</th>

                        <th class="text-nowrap">Suhu DD3</th>
                        <th class="text-nowrap">Bintik Hitam DD3</th>

                        <th class="text-nowrap">Suhu DD4</th>
                        <th class="text-nowrap">Bintik Hitam DD4</th>
                        <th class="text-nowrap">Created By</th>
                        <th class="text-nowrap">Created At</th>


                        <th class="text-nowrap">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($bintiks as $item)

                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ date('d M Y', strtotime($item->tanggal)) }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($item->jam)->format('H:i') }}</td>
                            <td class="text-center">{{ $item->dd1 }}</td>
                            <td class="text-center">{{ $item->bintik_hitam_dd1 }}</td>
                            <td class="text-center">{{ $item->dd2 }}</td>
                            <td class="text-center">{{ $item->bintik_hitam_dd2 }}</td>
                            <td class="text-center">{{ $item->dd3 }}</td>
                            <td class="text-center">{{ $item->bintik_hitam_dd3 }}</td>
                            <td class="text-center">{{ $item->dd4 }}</td>
                            <td class="text-center">{{ $item->bintik_hitam_dd4 }}</td>
                            <td class="text-center">{{ $item->op }}</td>
                            <td class="text-center">{{ $item->created_at }}</td>

                            <td>
                                <div class="d-flex gap-2">

                                    <a class="btn btn-primary text-center" href="{{ route('bintik_hitam.show', $item->id) }}" role="button">Detail</a>
                                    @if (auth()->user()->hasRole('Admin PRD') ||
                                            auth()->user()->hasRole('Admin QC') ||
                                            auth()->user()->hasRole('Leader PRD') ||
                                            auth()->user()->hasRole('Super Admin'))
                                        <a class="btn btn-warning text-center"
                                            href="{{ route('bintik_hitam.edit', $item->id) }}" role="button">Edit</a>
                                        <form action="{{ route('bintik_hitam.destroy', $item->id) }}" method="post">
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
