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

        th, td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
            word-wrap: break-word;
        }

        th {
            background-color: #f2f2f2;
        }

        .passed {
            background-color: #d4edda; /* Hijau muda */
        }

        .reject {
            background-color: #f8d7da; /* Merah muda */
        }
    </style>
</head>
<body>
        <h4>Pemberitahuan Waktu Pengecekan Bahan Baku</h4>
        <p>Halo, Team!</p>
        <table>
            <thead>
                <tr>
                    <th>Tanggal Datang</th>
                    <th>Nama Bahan Baku</th>
                    <th>Nama Produsen</th>
                    <th>Waktu Mulai Pengecekan</th>
                    <th>Waktu Akhir Pengecekan</th>
                    <th>Total Waktu Sampling</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>{{ $ujirm->tgl_datang }}</td>
                        <td>{{ $ujirm->nama_produk_supplier->nama_produk }}</td>
                        <td>{{ $ujirm->supplier_id }}</td>
                        <td>{{ $ujirm->start_smp }}</td>
                        <td>{{ $ujirm->end_smp }}</td>
                        <td>{{ $ujirm->date_smp }}</td>
                        <td class="{{ $ujirm->status == 'Passed' ? 'passed' : ($ujirm->status == 'Reject' ? 'reject' : '') }}">
                    {{ $ujirm->status }}
                </td>
                    </tr>

            </tbody>
        </table>

        <p>Waktu pengecekan ini, include waktu yang dikeluarkan untuk keluar masuk kearea pengayakan jika produk yang di cek perlu di ayak</p>
        <p>Terima kasih!</p>

</body>
</html>
