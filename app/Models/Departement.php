<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departement extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->hasOne(User::class, 'departement_id');
    }
    public function etiket()
    {
        return $this->hasOne(Etiket::class, 'departement_id');
    }
    public function wo()
    {
        return $this->hasOne(Wo::class, 'departement_id');
    }
    public function kpi()
    {
        return $this->hasOne(Usersop::class, 'departement_id');
    }
    public function departement()
    {
        return $this->hasOne(Sop::class, 'dept');
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logUnguarded()->logOnlyDirty();
    }
}
