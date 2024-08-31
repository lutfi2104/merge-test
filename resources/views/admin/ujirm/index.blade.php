@extends('layouts.dashboard')
@section('content')
<style>
    /* * {
        border: 1px solid red
    } */
</style>
<div class="card">
    <div class="card-body">
        @if (auth()->user()->hasRole('Super Admin') ||
        auth()->user()->hasRole('Admin QC') || auth()->user()->hasRole('QC'))
        <div class="d-flex justify-content-md-end mb-4">
            <a class="btn btn-primary" href="{{ route('ujirm.create') }}" role="button">Tambah Uji RMPM</a>
        </div>
        @endif
        <table class="table myTable">
            <thead>
                <tr>
                    <th class="text-center" scope="col">No</th>
                    <th class="text-center" scope="col">Tanggal Datang</th>
                    <th class="text-center" scope="col">Nama Bahan Baku</th>
                    <th class="text-center" scope="col">Nama Produsen</th>
                    <th class="text-center" scope="col">CoA</th>
                    <th class="text-center" scope="col">Status</th>

                    <th class="text-center" scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($ujirms as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($item->tgl_datang)->format('d-m-Y') }}</td>
                    <td class="text-center">{{ $item->nama_produk_supplier->nama_produk }}</td>
                    <td class="text-center">{{ $item->supplier_id }}</td>
                    <td class="text nowrap text-center justify-content-center">
                        <a href="{{ asset('storage/coa/' . $item->coa) }}">
                            <img class="img-fluid" width="60px" src="{{ asset('storage/coa/' . $item->coa) }}">
                        </a>
                    </td>
                    <td>
                        <div class="text-center" style="background-color: {{ $item->status === 'Passed' ? 'green' : 'red' }}; color: {{ $item->status === 'Passed' ? 'white' : 'white' }}; border-radius: 10px; padding: 5px;">
                            {{ $item->status }}
                        </div>
                    </td>
                    <td>
                        <div class="d-flex gap-2 justify-content-center">
                            <a class="btn btn-warning btn-sm text-center" href="{{ route('ujirm.show', $item->id) }}" role="button">Detail</a>
                            @if (auth()->user()->hasRole('Super Admin') ||
                            auth()->user()->hasRole('Admin QC'))
                            <a class="btn btn-warning btn-sm text-center" href="{{ route('ujirm.edit', $item->id) }}" role="button">Edit</a>
                            <form action="{{ route('ujirm.destroy', $item->id) }}" method="post" id="form-delete{{ $item->id }}">
                                @csrf
                                @method('delete')
                                <button type="button" class="btn btn-danger btn-sm" onclick="hapus_data('#form-delete{{ $item->id }}')">Hapus</button>
                            </form>
                            @endif
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Script Swal -->
{{-- <script>
    function hapus_data(form_id) {
        Swal.fire({
            title: 'Yakin?',
            text: "Hapus Data Ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus Data!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $(form_id).submit()
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    }
</script> --}}
@endsection
