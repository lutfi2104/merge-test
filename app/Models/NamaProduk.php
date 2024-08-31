<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NamaProduk extends Model
{
    use HasFactory, LogsActivity;
    protected $guarded = ['id'];
    public function bintik_1()
    {
        return $this->hasOne(bintikHitam::class, 'produk_id_1');
    }
    public function bintik_2()
    {
        return $this->hasMany(bintikHitam::class, 'produk_id_2');
    }
    public function bintik_3()
    {
        return $this->hasMany(bintikHitam::class, 'produk_id_3');
    }
    public function bintik_4()
    {
        return $this->hasMany(bintikHitam::class, 'produk_id_4');
    }
    public function ccpdry1()
    {
        return $this->hasOne(dd_ccpdry::class, 'nama_prd1');
    }
    public function ccpdry2()
    {
        return $this->hasOne(dd_ccpdry::class, 'nama_prd2');
    }
    public function ccpdry3()
    {
        return $this->hasOne(dd_ccpdry::class, 'nama_prd3');
    }
    public function ccpdry4()
    {
        return $this->hasOne(dd_ccpdry::class, 'nama_prd4');
    }
    public function eb()
    {
        return $this->hasMany(Baking_eb::class, 'nama_produk_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logUnguarded()->logOnlyDirty();
    }
}
