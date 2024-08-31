<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Template extends Model
{
    use HasFactory, LogsActivity;
    protected $guarded = ['id'];
    public function kriterias()
    {
        $kriterias = [];
        $kriteria_id = json_decode($this->kriteria_id);
        $newkriteria_id = [];
        foreach ($kriteria_id as $id) {

            if ($find = Kriteria::find($id)) {
                array_push($kriterias, $find);
                array_push($newkriteria_id, $id);
            }
        }

        $this->kriteria_id = json_encode($newkriteria_id);
        $this->save();
        return $kriterias;
    }
    public function produk()
    {
        return $this->hasMany(Template::class, 'template_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logUnguarded()->logOnlyDirty();
    }
}
