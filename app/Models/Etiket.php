<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Etiket extends Model
{
    use HasFactory, LogsActivity;

    protected $guarded = ['id'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logUnguarded()->logOnlyDirty();
    }

    public function wo_dep()
    {
        return $this->hasMany(Wo::class, 'departement_id');
    }
    public function wo_prio()
    {
        return $this->hasMany(Wo::class, 'prioritas_id');
    }
    public function dept()
    {
        return $this->belongsTo(Departement::class, 'departement_id');
    }
}
