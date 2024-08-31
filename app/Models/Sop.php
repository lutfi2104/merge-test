<?php

namespace App\Models;


use App\Models\Usersop;
use App\Models\SopRevision;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sop extends Model
{
    use HasFactory, LogsActivity;
    protected $guarded = ['id'];

    public function revisions()
    {
        return $this->hasMany(SopRevision::class, 'sop_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logUnguarded()->logOnlyDirty();
    }

    public function dokumen()
{
    return $this->hasMany(Usersop::class, 'departement_id');
}
public function dep()
{
    return $this->belongsTo(Departement::class, 'dept');
}
public function pics()
{
    return $this->belongsTo(User::class, 'pic');
}

}
