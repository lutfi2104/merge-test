<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class dd_ccpdry extends Model
{
    use HasFactory, LogsActivity;
    protected $fillable = ['tanggal', 'jam', 'dd1', 'dd2', 'dd3', 'dd4', 'catatan', 'foto1', 'foto2', 'foto3', 'foto4'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logUnguarded()->logOnlyDirty();
    }
}
