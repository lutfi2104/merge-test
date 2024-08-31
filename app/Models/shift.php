<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class shift extends Model
{
    use HasFactory, LogsActivity;
    protected $guarded = ['id'];

    public function pengujian()
    {
        return $this->hasMany(Shift::class, 'shift_id');
    }
    public function perintah()
    {
        return $this->hasMany(Perintah::class, 'shift_id');
    }
    public function hold()
    {
        return $this->hasMany(Hold_reject_wip::class, 'shift_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logUnguarded()->logOnlyDirty();
    }
}
