<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spec extends Model
{
    use HasFactory, LogsActivity;
    protected $guarded = ['id'];
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    public function bulk_density()
    {
        if ($this->bulk_density) {
            $data = json_decode($this->bulk_density);
            $min =  (float)$data->min;
            $max =  (float)$data->max;
            return (object)[
                'min' => $min,
                'max' => $max
            ];
        }
        return (object)[
            'min' => '',
            'max' => ''
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logUnguarded()->logOnlyDirty();
    }
}
