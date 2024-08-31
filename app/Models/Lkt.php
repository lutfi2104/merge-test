<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lkt extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'nama_inisiator');
    }
    public function lktcor(){
        return $this->hasone(Lktcor::class, 'lkt_id');
    }
}
