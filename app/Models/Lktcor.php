<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lktcor extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function lkt()
    {
        return $this->belongsTo(Lkt::class, 'lkt_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'nama_inisiator');
    }
}
