<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wo extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function dept()
    {
        return $this->belongsTo(Departement::class, 'departement_id');
    }
}
