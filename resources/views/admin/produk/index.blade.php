@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-md-end mb-4">
            <a class="btn btn-primary" href="{{route('produk.create')}}" role="button">Tambah Produk</a>
        </div>
        <table class="table myTable">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th class="text-center" scope="col">Nama</th>
                    <th class="text-center" scope="col">Template CoA</th>
                    <th class="text-center" scope="col">Expired</th>
                    <th class="text-center" scope="col">Packaging</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produks as $item)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center">{{$item->name}}</td>
                    <td class="text-center">{{$item->template->name}}</td>
                    <td class="text-center">{{$item->expired}} Bulan</td>
                    <td class="text-center">{{$item->packaging}}</td>
                    <td class="d-flex gap-2">
                        <a class="btn btn-primary text-center" href="{{ route('produk.show', $item->id) }}" role="button">Detail</a>
                        <a class="btn btn-warning text-center" href="{{ route('produk.edit',$item->id) }}"
                            role="button">Edit</a>
                        <form action="{{ route('produk.destroy', $item->id) }}" method="post" id="delete-form{{ $item->id }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" onclick="hapus_data('#delete-form{{ $item->id }}')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection
