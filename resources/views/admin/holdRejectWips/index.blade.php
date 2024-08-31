@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-md-between mb-4">

                <a class="btn btn-primary" href="{{ route('hold_reject_wip.create') }}" role="button">Create NC </a>
            </div>
            <table class="table myTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th class="text-center" scope="col">Tanggal Produksi</th>
                        <th class="text-center" scope="col">Tanggal Expired</th>
                        <th class="text-center" scope="col">Nama Produk</th>
                        <th class="text-center" scope="col">Kode Batch</th>
                        <th class="text-center" scope="col">Jumlah</th>
                        <th class="text-center" scope="col">Alasan</th>
                        <th class="text-center" scope="col">Status</th>
                        <th class="text-center" scope="col">Rekomendasi</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hold_reject_wip as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ date('d-m-Y', strtotime($item->tanggal_produksi)) }}</td>
                            <td class="text-center">{{ date('d-m-Y', strtotime($item->tanggal_expired)) }}</td>
                            <td class="text-center">{{ $item->produk->name }}</td>
                            <td class="text-center">{{ $item->kode_batch }}</td>
                            <td class="text-center">{{ $item->jumlah }}</td>
                            <td class="text-center">{{ $item->status }}</td>
                            <td class="text-center">{{ $item->alasan }}</td>
                            <td class="text-center">{{ $item->rekomendasi }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a class="btn btn-primary text-center" href="#" role="button">Detail</a>
                                    <a class="btn btn-warning text-center" href="{{ route('hold_reject_wip.edit', $item->id) }}"
                                        role="button">Edit</a>
                                    <form action="{{ route('hold_reject_wip.destroy', $item->id) }}" method="post" id="delete-form{{ $item->id }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" onclick="hapus_data('#delete-form{{ $item->id }}')">Hapus</button>
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
