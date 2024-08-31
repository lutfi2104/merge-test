<!-- resources/views/emails/kalibrasi_notification.blade.php -->

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kedatangan Bahan Baku Hari</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
            word-wrap: break-word;
        }

        th {
            background-color: #f2f2f2;
        }

        .passed {
            background-color: #d4edda;
            /* Hijau muda */
        }

        .reject {
            background-color: #f8d7da;
            /* Merah muda */
        }
    </style>
</head>

<body>
    @if(count($data) > 0)
    <h1>Pemberitahuan Kedatangan Bahan Baku Hari ini</h1>

    <p>Halo, Team</p>

    <table>
        <thead>
            <tr>
                <th>Tanggal Datang</th>
                <th>Nama Bahan Baku</th>
                <th>Nama Produsen</th>
                <th>Waktu Mulai Pengecekan</th>
                <th>Waktu Akhir Pengecekan</th>
                <th>Total Waktu Pengecekan</th>
                <th>Status</th>

            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->tgl_datang }}</td>
                <td>{{ $item->nama_produk_supplier->nama_produk }}</td>
                <td>{{ $item->supplier_id }}</td>
                <td>{{ $item->start_smp }}</td>
                <td>{{ $item->end_smp }}</td>
                <td>{{ $item->date_smp }}</td>
                <td class="{{ $item->status == 'Passed' ? 'passed' : ($item->status == 'Reject' ? 'reject' : '') }}">
                    {{ $item->status }}
                </td>


            </tr>
            @endforeach
        </tbody>
    </table>

    <p>Total Waktu Pengecekan Bahan Baku Adalah Waktu Mulai Pengecekan sampai Waktu Akhir Pengecekan Termasuk Keluar masuk area produksi Untuk Pengayakan</p>
    <p>Terima kasih!</p>

    @else
    <p>Tidak ada data untuk ditampilkan.</p>
    @endif

</body>

</html>
