<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Activitylog\Models\Activity;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logUnguarded()->logOnlyDirty();
    }

    public function causer()
    {
        return $this->hasOne(Activity::class, 'causer_id', 'id');
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'departement_id');
    }
    public function lkt()
    {
        return $this->belongsTo(Lkt::class, 'nama_inisiator');
    }
    public function usersop()
    {
        return $this->belongsTo(Usersop::class, 'user_id');

    }
    public function usersopp()
    {
        return $this->belongsTo(Usersop::class, 'pic');

    }
    public function picss()
    {
        return $this->hasOne(Sop::class, 'pic');
    }
}
