<!-- resources/views/emails/kalibrasi_notification.blade.php -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemberitahuan Kalibrasi</title>
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
    </style>
</head>
<body>

    @if(count($data) > 0)
        <h1>Pemberitahuan Kalibrasi</h1>
        @foreach ($data as $item)
        <p>Halo, {{ $item['namaPenerima'] }}!</p>
        @endforeach
        <table>
            <thead>
                <tr>
                    <th>Nama Alat</th>
                    <th>Tanggal Kalibrasi</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{ $item['namaAlat'] }}</td>
                        <td>{{ $item['tglKalibrasiFormatted'] }}</td>
                        <td>
                            @if ($item['selisihHari'] < 30)
                                Kurang dari 30 hari sertifikat kalibrasi habis.
                            @elseif ($item['selisihHari'] < 90)
                                Kurang dari 90 hari sertifikat kalibrasi habis.
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p>Mohon pastikan untuk segera melakukan proses PO kalibrasi.</p>
        <p>Terima kasih!</p>

    @else
        <p>Tidak ada data untuk ditampilkan.</p>
    @endif

</body>
</html>
