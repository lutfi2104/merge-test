<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ujirm extends Model
{
    use HasFactory, LogsActivity;
    protected $guarded = ['id'];


    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'nama_produk_supplier_id');
    }
    public function produsen_supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    public function nama_produk_supplier()
    {
        return $this->belongsTo(namaProduk_supplier::class, 'nama_produk_supplier_id');
    }
    public function jenis()
    {
        return $this->belongsTo(produkSupplier::class, 'nama_produk_supplier_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logUnguarded()->logOnlyDirty();
    }
}
