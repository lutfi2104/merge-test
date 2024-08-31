@php
    $routes = [
        'kriteria' => route('kriteria.import'),
        'produk' => route('produk.import'),
        'spec' => route('spec.import'),
        'template' => route('template.import'),
        'supplier' => route('supplier.import'),
        'namaproduksupplier' => route('namaproduksupplier.import'),
        'sop' => route('sop.import'),
        'kalibrasi' => route('kalibrasi.import'),
        'nama_produk' => route('nama_produk.import'),
        // 'jenis_bahan' => route('jenis.import'),
        // 'coa' => route('coa.import'),
    ];
@endphp

@foreach ($routes as $key => $route)
    <div class="modal fade" id="importModal{{ $key }}" tabindex="-1" data-bs-backdrop="static"
        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModal{{ $key }}">Import</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Pilih File</label>
                            <input type="file" class="form-control" name="file">
                        </div>
                        <button class="btn btn-success" type="submit">Import</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
