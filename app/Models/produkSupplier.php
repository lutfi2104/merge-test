<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Database\Factories\ProdukSupplierFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class produkSupplier extends Model
{
    use HasFactory, LogsActivity;

    protected $guarded = ['id'];
    protected $fillable = ['kode_jenis', 'jenis_produk'];

    public function namaProduk_supplier()
    {
        return $this->hasOne(namaProduk_supplier::class, 'produk_supplier_id');
    }
    public function supplier()
    {
        return $this->hasMany(Ujirm::class, 'nama_produk_id');
    }

    protected static function newFactory()
    {
        return ProdukSupplierFactory::new();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logUnguarded()->logOnlyDirty();
    }
}
