@extends('layouts.dashboard')
@section('content')
    <style>
        /* * {
                        border: 1px solid red
                    } */
    </style>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-md-end mb-4">
                <a class="btn btn-primary" href="{{ route('etiket.create') }}" role="button">Tambah</a>
            </div>
            <table class="table myTable">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">No</th>
                        <th class="text-center" scope="col">Nama</th>
                        <th class="text-center" scope="col">Subject</th>
                        <th class="text-center" scope="col">Departement</th>
                        <th class="text-center" scope="col">Support</th>
                        <th class="text-center" scope="col">Prioritas</th>
                        <th class="text-center" scope="col">Status</th>
                        <th class="text-center" scope="col">Waktu</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($etiket as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->nama }}</td>
                            <td class="text-center">{{ $item->subject }}</td>
                            <td class="text-center">{{ $item->dept->departement }}</td>
                            <td class="text-center">{{ $item->jenis_bantuan }}</td>
                            <td class="text-center">{{ $item->prioritas }}</td>
                            <td class="text-center">{{ $item->status }}</td>
                            <td class="text-center">{{ $item->created_at->format('d-m-Y H:i:s') }}</td>
                            <td class="text-center">
                                <div class="d-flex gap-2 justify-content-center">
                                    <a class="btn btn-warning btn-sm text-center"
                                        href="{{ route('etiket.edit', $item->id) }}" role="button">Edit</a>
                                    <a class="btn btn-warning btn-sm text-center"
                                        href="{{ route('etiket.show', $item->id) }}" role="button">Detail</a>
                                    <form action="{{ route('etiket.destroy', $item->id) }}" method="post"
                                        id="form-delete{{ $item->id }}">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="hapus_data('#form-delete{{ $item->id }}')">Hapus</button>
                                    </form>
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
