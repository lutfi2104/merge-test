<?php

namespace App\Models;


use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usersop extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'departement_id');
    }


    public function dokumen()
    {
        return $this->belongsTo(Sop::class, 'departement_id');
    }
    public function usersop()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function usersopp()
    {
        return $this->belongsTo(User::class, 'pic');
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logUnguarded()->logOnlyDirty();
    }
}
