<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Database\Factories\NamaProdukSupplierFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class namaProduk_supplier extends Model
{
    use HasFactory, LogsActivity;
    protected $guarded = ['id'];


    public function supplier()
    {
        return $this->belongsTo(supplier::class, 'supplier_id');
    }
    public function produk_supplier()
    {
        return $this->belongsTo(produkSupplier::class, 'produk_supplier_id');
    }

    public function rm()
    {
        return $this->hasOne(Ujirm::class, 'nama_produk_supplier_id');
    }
    protected static function newFactory()
    {
        return NamaProdukSupplierFactory::new();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logUnguarded()->logOnlyDirty();
    }


}
