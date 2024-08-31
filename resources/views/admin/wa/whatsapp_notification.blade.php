Halo, Team

Berikut adalah pemberitahuan untuk kalibrasi alat:

@foreach($kalibrasis as $kalibrasi)
- Nama Alat: {{ $kalibrasi->nama_alat }}
- Nomor Seri: {{ $kalibrasi->nomor_seri }}

- Tempat: {{ $kalibrasi->tempat }}
@if (!$loop->last)
----------------------------------------
@endif
@endforeach

Mohon pastikan untuk segera melakukan proses PO kalibrasi.

Terima kasih!
