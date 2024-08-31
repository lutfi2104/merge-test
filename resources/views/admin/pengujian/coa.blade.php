@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('cetak.coa') }}" method="post">
                @csrf
                <table class="table myTable" id="DataTables_Table_0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th class="text-center" scope="col">Tanggal Produksi</th>
                            <th class="text-center" scope="col">Tanggal Expired</th>
                            <th class="text-center" scope="col">Kode Batch</th>
                            <th class="text-center text-nowrap" scope="col">Nama Produk</th>
                            <th class="text-center" scope="col">Kadar Air</th>
                            <th class="text-center" scope="col">Bulk Density</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($average as $no_batch_coa => $item)
                            @php
                                $hideRow = false;
                                if (
                                    $item['produk']['produk_name'] === 'WS 308' ||
                                    $item['produk']['produk_name'] === 'WS 301 FR (Sc 5-5)' ||
                                    $item['produk']['produk_name'] === 'OS 300 FR (Code:SC 5-5-5-5)'
                                ) {
                                    $hideRow =
                                        is_null($item['produk']['salmonella']) ||
                                        is_null($item['produk']['tpc']) ||
                                        is_null($item['produk']['ym']) ||
                                        is_null($item['produk']['entero']);
                                }
                            @endphp
                            @if (!$hideRow)
                                <tr>
                                    <td class="text-center" style="white-space: nowrap;">
                                        <span>{{ $loop->iteration }}</span>
                                        @if ($item['tanggal_expired'] <= Carbon\Carbon::today())
                                            <input class="form-check-input" type="checkbox" disabled>
                                        @else
                                            <input
                                                onchange="switchCheckbox('.checkbox{{ str_replace(' ', '', $item['produk']['produk_name']) }}')"
                                                name="cetak[]" style="border: 1px solid gray; display: inline-block;"
                                                class="form-check-input data_checkbox checkbox{{ str_replace(' ', '', $item['produk']['produk_name']) }}"
                                                type="checkbox" value="{{ $no_batch_coa }}">
                                        @endif
                                    </td>
                                    <td> {{ date('j F Y', strtotime($item['tanggal_produksi'])) }} </td>
                                    <td>
                                        @if (
                                            $item['produk']['produk_name'] === 'WS 700 FR (Code : UNI 12-17)' ||
                                                $item['produk']['produk_name'] === 'Lotuz White Classic')
                                            {{ \Carbon\Carbon::parse($item['tanggal_expired_coa'] ?? $item['tanggal_expired'])->format('d F Y') }}
                                        @else
                                            {{ \Carbon\Carbon::parse($item['tanggal_expired'])->format('d F Y') }}
                                        @endif
                                    </td>
                                    <td> {{ $no_batch_coa }} </td>
                                    <td>{{ $item['produk']['produk_name'] }}</td>
                                    <td>{{ number_format($item['produk']['kadar_air'], 2) }}</td>
                                    <td>{{ number_format($item['produk']['bulk_density'], 2) }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <button class="btn btn-primary">
                                    Cetak CoA <i class="fas fa-print"></i>
                                </button>
                                <button type="reset" onclick="resetCheckbox()" class="btn btn-danger">Reset</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div>
    </div>
    @push('js')
        <script>
            function switchCheckbox(selected_class) {
                // $('.data_checkbox').prop('disabled', true)
                $(selected_class).prop('disabled', false)
            }

            function resetCheckbox() {
                $('.data_checkbox').prop('disabled', false)
            }
        </script>
    @endpush
@endsection
