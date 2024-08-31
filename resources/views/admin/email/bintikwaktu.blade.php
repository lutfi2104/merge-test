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

        .red-bg {
            background-color: #ffcccc; /* Light red */
        }

    </style>
</head>

<body>
    <h4>Pemberitahuan Adanya Data Suhu Drum Drier < 80 C atau Perbedaan Waktu Data hingga 90 menit</h4>

    <p>Halo, Team</p>

    <table>
        <thead>
            <tr>
                <th>Data Terakhir</th>
                <th>Data Baru</th>
                <th>Suhu DD 1</th>
                <th>Suhu DD 2</th>
                <th>Suhu DD 3</th>
                <th>Suhu DD 4</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td @if($timeDiff > 90) class="red-bg" @endif>{{ $latestTime }}</td>
                <td @if($timeDiff > 90) class="red-bg" @endif>{{ $newTime }}</td>
                <td @if($dd1 < 80) class="red-bg" @endif>{{ $dd1 }}</td>
                <td @if($dd2 < 80) class="red-bg" @endif>{{ $dd2 }}</td>
                <td @if($dd3 < 80) class="red-bg" @endif>{{ $dd3 }}</td>
                <td @if($dd4 < 80) class="red-bg" @endif>{{ $dd4 }}</td>
            </tr>
        </tbody>
    </table>

    <p>Mohon pastikan untuk segera melakukan tindakan dan mengkonfirmasi kebenarannya</p>
    <p>Terima kasih!</p>

</body>

</html>
