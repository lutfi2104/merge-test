<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mesin extends Model
{
    use HasFactory, LogsActivity;

    public function pengujian()
    {
        return $this->hasMany(Mesin::class, 'mesin_id');
    }
    public function perintah()
    {
        return $this->hasMany(Perintah::class, 'mesin_id');
    }
    public function hold()
    {
        return $this->hasMany(Hold_reject_wip::class, 'mesin_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logUnguarded()->logOnlyDirty();
    }
}
