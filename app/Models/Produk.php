<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory, LogsActivity;
    protected $guarded = ['id'];
    public function spec()
    {
        return $this->hasOne(Spec::class, 'produk_id');
    }
    public function hold()
    {
        return $this->hasOne(Hold_reject_wip::class, 'produk_id');
    }
    public function template()
    {
        return $this->belongsTo(Template::class, 'template_id');
    }
    public function kriterias()
    {
        $kriteria = $this->template->kriteria_id;
        $kriteria = json_decode($kriteria);
        $model = [];
        foreach ($kriteria as $id) {
            $model_kriteria = Kriteria::find($id);
            array_push($model, $model_kriteria);
        }
        return $model;
    }
    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id');
    }


    public function pengujians()
    {
        return $this->hasMany(Pengujian::class, 'produk_id');
    }
    public function perintah()
    {
        return $this->hasMany(Perintah::class, 'produk_id');
    }


    protected $with = ['spec'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logUnguarded()->logOnlyDirty();
    }
}
