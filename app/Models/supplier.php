<?php

namespace App\Models;

use App\Models\Ujirm;
use Spatie\Activitylog\LogOptions;
use App\Models\namaProduk_supplier;
use Database\Factories\ProdusenFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;

class supplier extends Model
{
    use HasFactory, LogsActivity;
    protected $guarded = ['id'];

    public function namaProduk_supplier(){
        return $this->hasMany(namaProduk_supplier::class, 'supplier_id');
    }
    public function ujirm(){
        return $this->hasMany(Ujirm::class, 'nama_produk_id');
    }
    public function ujirm_supplier(){
        return $this->hasMany(Ujirm::class, 'supplier_id');
    }
    protected static function newFactory()
    {
        return ProdusenFactory::new();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logUnguarded()->logOnlyDirty();
    }

}
