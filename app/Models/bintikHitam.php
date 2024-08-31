<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class bintikHitam extends Model
{
    use HasFactory, LogsActivity;
    protected $guarded = ['id'];
    public function produk1()
    {
        // Menggunakan "produk_id_" . $index untuk mengambil produk sesuai indeks
        return $this->belongsTo(NamaProduk::class, 'produk_id_1');
    }
    public function produk2()
    {
        // Menggunakan "produk_id_" . $index untuk mengambil produk sesuai indeks
        return $this->belongsTo(NamaProduk::class, 'produk_id_2');
    }
    public function produk3()
    {
        // Menggunakan "produk_id_" . $index untuk mengambil produk sesuai indeks
        return $this->belongsTo(NamaProduk::class, 'produk_id_3');
    }
    public function produk4()
    {
        // Menggunakan "produk_id_" . $index untuk mengambil produk sesuai indeks
        return $this->belongsTo(NamaProduk::class, 'produk_id_4');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logUnguarded()->logOnlyDirty();
    }
}
