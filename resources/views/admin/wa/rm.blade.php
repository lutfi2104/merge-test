Halo, Team

Berikut adalah informasi kedatangan bahan baku hari ini:

=========*{{ \Carbon\Carbon::parse($data->first()->tgl_datang)->format('d-m-Y') }}* ============== 

@foreach($data as $item)
Nama Bahan Baku: *{{ $item->nama_produk_supplier->nama_produk ?? 'N/A' }}*  
Nama Produsen: *{{ $item->supplier_id }}*  
Waktu Mulai: *{{ $item->start_smp }}*  
Waktu Akhir: *{{ $item->end_smp }}*  
Total Waktu: *{{ $item->date_smp }}*  
Status: *{{ $item->status }}* 

@if (!$loop->last)
----------------------------------------
@endif
@endforeach

Selengkapnya.

Terima kasih!
