<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengujian extends Model
{
    use HasFactory, LogsActivity;
    protected $guarded = ['id'];
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    public function mesin()
    {
        return $this->belongsTo(Mesin::class, 'mesin_id');
    }

    public function shift()
    {
        return $this->belongsTo(shift::class, 'shift_id');
    }

    public static function pangkat($angka, $spec = false)
    {
        if ($angka < 10) {
            return '< 10';
        }

        // Cari nilai pangkat 'n' dengan cara menghitung logaritma basis 10 dari angka
        $pangkat = log10($angka);

        // Bulatkan nilai pangkat ke bawah (misalnya jika hasilnya 4.75, maka akan menjadi 4)
        $pangkatBulat = floor($pangkat);

        // Hitung nilai basis dengan membagi angka dengan 10 dipangkatkan pangkatBulat
        $basis = $angka / (10 ** $pangkatBulat);

        // Cetak hasilnya
        if ($spec) {
            return "10<sup>" . $pangkatBulat . "</sup>";
        }
        return $basis . " x 10<sup>" . $pangkatBulat . "</sup>";
    }

    public static function firstOrNull($value, $key)
    {
        $first = $value->where($key, '>', 0)->first();
        if (!$first) {
            return null;
        }
        return Pengujian::pangkat($first->$key);
    }
    public static function salmonella($value)
    {
        $first = $value->where('salmonella', '!=', null)->first();
        if (!$first) {
            return null;
        }
        return $first->salmonella == 0 ? 'Negative' : $first->salmonella;
    }
    public static function createCoa($pengujianGroup)
    {
        $averageGroup = [];
        foreach ($pengujianGroup as $no_batch_coa => $pengujians) {
            // dd($pengujianGroup);
            $id = $pengujians->first()->produk->id;
            $produk_name = $pengujians->first()->produk->name;
            $jml_data = $pengujians->count();
            $coa = [
                'produk_name' => $pengujians->first()->produk->name,
                'bulk_density' => $pengujians->sum('bulk_density') / $jml_data,
                'kadar_air' =>  $pengujians->sum('kadar_air') / $jml_data,
                'salinity' => $pengujians->sum('salinity') / $jml_data,
                'mesh_20' => $pengujians->sum('mesh_20') / $jml_data,
                'mesh_40' => $pengujians->sum('mesh_40') / $jml_data,
                'mesh_4' => $pengujians->sum('mesh_4') / $jml_data,
                'mesh_4_6' => $pengujians->sum('mesh_4_6') / $jml_data,
                'mesh_5_6' => $pengujians->sum('mesh_5_6') / $jml_data,
                'mesh_20_max' => $pengujians->sum('mesh_20_max') / $jml_data,
                'mesh_1_4' => $pengujians->sum('mesh_1_4') / $jml_data,
                'mesh_1_4_5' => $pengujians->sum('mesh_1_4_5') / $jml_data,
                'mesh_6' => $pengujians->sum('mesh_6') / $jml_data,
                'mesh_30' => $pengujians->sum('mesh_30') / $jml_data,
                'mesh_40_kurang' => $pengujians->sum('mesh_40_kurang') / $jml_data,
                'mesh_6_10' => $pengujians->sum('mesh_6_10') / $jml_data,
                'salmonella' => Pengujian::salmonella($pengujians),
                'tpc' => Pengujian::firstOrNull($pengujians, 'tpc'),
                'entero' => Pengujian::firstOrNull($pengujians, 'entero'),
                'ym' => Pengujian::firstOrNull($pengujians, 'ym')
            ];
            $average = [
                'id' => $pengujians->first()->produk->id,
                'tanggal_produksi' => $pengujians->first()->tanggal_produksi,
                'tanggal_expired' => $pengujians->first()->tanggal_expired,
                'tanggal_expired_coa' => $pengujians->first()->tanggal_expired_coa,
                'produk' => $coa
            ];
            $averageGroup[$no_batch_coa] = $average;
            Coa::updateOrCreate(['no_batch_coa' => $no_batch_coa], $coa);
        }
        return $averageGroup;
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logUnguarded()->logOnlyDirty();
    }
}
