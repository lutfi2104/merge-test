<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;

class Baking_eb extends Model
{
    use HasFactory, LogsActivity;
    protected $guarded = ['id'];
    public function produk()
    {
        return $this->belongsTo(NamaProduk::class, 'nama_produk_id');
    }
    // public function produk()
    // {
    //     return $this->belongsTo(NamaProduk::class, 'produk_id');
    // }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logUnguarded()->logOnlyDirty();
    }
}
