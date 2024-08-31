<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PengujianRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public $spec = null;
    public function __construct($spec)
    {
        $this->spec = $spec;
    }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        switch ($attribute) {
            case 'bulk_density':

                $rule =  $this->bulk_density($value);
                if (!$rule) {
                    $fail('Nilai ' . $attribute . ' Tidak Sesuai');
                }
                break;
            case 'kadar_air':

                $rule =  $this->kadar_air($value);
                if (!$rule) {
                    $fail('Nilai ' . $attribute . ' Tidak Sesuai');
                }
                break;
            case 'mesh_20':

                $rule =  $this->mesh_20($value);
                if (!$rule) {
                    $fail('Nilai ' . $attribute . ' Tidak Sesuai');
                }
                break;
            case 'mesh_40':

                $rule =  $this->mesh_40($value);
                if (!$rule) {
                    $fail('Nilai ' . $attribute . ' Tidak Sesuai');
                }
                break;
            case 'mesh_20_max':

                $rule =  $this->mesh_20_max($value);
                if (!$rule) {
                    $fail('Nilai ' . $attribute . ' Tidak Sesuai');
                }
                break;
            case 'mesh_5_6':

                $rule =  $this->mesh_5_6($value);
                if (!$rule) {
                    $fail('Nilai ' . $attribute . ' Tidak Sesuai');
                }
                break;
            case 'mesh_4':

                $rule =  $this->mesh_4($value);
                if (!$rule) {
                    $fail('Nilai ' . $attribute . ' Tidak Sesuai');
                }
                break;
            case 'mesh_4_6':

                $rule =  $this->mesh_4_6($value);
                if (!$rule) {
                    $fail('Nilai ' . $attribute . ' Tidak Sesuai');
                }
                break;

            case 'tpc':

                $rule =  $this->tpc($value);
                if (!$rule) {
                    $fail('Nilai ' . $attribute . ' Tidak Sesuai');
                }
                break;
            case 'salmonella':

                $rule =  $this->tpc($value);
                if (!$rule) {
                    $fail('Nilai ' . $attribute . ' Tidak Sesuai');
                }
                break;
            case 'ym':

                $rule =  $this->tpc($value);
                if (!$rule) {
                    $fail('Nilai ' . $attribute . ' Tidak Sesuai');
                }
                break;
            case 'entero':

                $rule =  $this->tpc($value);
                if (!$rule) {
                    $fail('Nilai ' . $attribute . ' Tidak Sesuai');
                }
                break;
            case 'salinity':

                $rule =  $this->salinity($value);
                if (!$rule) {
                    $fail('Nilai ' . $attribute . ' Tidak Sesuai');
                }
                break;
            case 'mesh_1_4':

                $rule =  $this->mesh_1_4($value);
                if (!$rule) {
                    $fail('Nilai ' . $attribute . ' Tidak Sesuai');
                }
                break;
            case 'mesh_1_4_5':

                $rule =  $this->mesh_1_4_5($value);
                if (!$rule) {
                    $fail('Nilai ' . $attribute . ' Tidak Sesuai');
                }
                break;
            case 'mesh_6':

                $rule =  $this->mesh_6($value);
                if (!$rule) {
                    $fail('Nilai ' . $attribute . ' Tidak Sesuai');
                }
                break;
            case 'mesh_6_10':

                $rule =  $this->mesh_6_10($value);
                if (!$rule) {
                    $fail('Nilai ' . $attribute . ' Tidak Sesuai');
                }
                break;
            case 'mesh_30':

                $rule =  $this->mesh_30($value);
                if (!$rule) {
                    $fail('Nilai ' . $attribute . ' Tidak Sesuai');
                }
                break;
            case 'mesh_40_kurang':

                $rule =  $this->mesh_40_kurang($value);
                if (!$rule) {
                    $fail('Nilai ' . $attribute . ' Tidak Sesuai');
                }
                break;


            default:
                $fail('input tidak valid');
                break;
        }
    }
    public function bulk_density($uji)
    {

        $uji = (float)$uji;
        $min = $this->spec->min;
        $max = $this->spec->max;
        if ($uji < $min || $uji > $max) {
            return false;
        }
        return true;
    }
    public function kadar_air($uji)
    {

        $uji = (float)$uji;
        $max = (float)$this->spec;
        if ($uji > $max) {
            return false;
        }
        return true;
    }
    public function mesh_20($uji)
    {

        $uji = (int)$uji;
        $min = (int)$this->spec;
        if ($uji < $min) {
            return false;
        }
        return true;
    }
    public function mesh_40($uji)
    {

        $uji = (int)$uji;
        $max = (int)$this->spec;
        if ($uji > $max) {
            return false;
        }
        return true;
    }
    public function mesh_20_max($uji)
    {

        $uji = (int)$uji;
        $max = (int)$this->spec;
        if ($uji > $max) {
            return false;
        }
        return true;
    }
    public function mesh_5_6($uji)
    {

        $uji = (int)$uji;
        $min = (int)$this->spec;
        if ($uji < $min) {
            return false;
        }
        return true;
    }
    public function mesh_4($uji)
    {

        $uji = (int)$uji;
        $max = (int)$this->spec;
        if ($uji > $max) {
            return false;
        }
        return true;
    }
    public function mesh_4_6($uji)
    {

        $uji = (int)$uji;
        $min = (int)$this->spec;
        if ($uji < $min) {
            return false;
        }
        return true;
    }


    public function tpc($uji)
    {
        $uji = strtoupper((string)$uji);
        $val = strtoupper((string)$this->spec);

        // Periksa apakah nilai $uji sama dengan nilai $val atau sama dengan string "NEGATIF"
        if ($uji > $val && $uji !== 'NEGATIVE') {
            return false;
        }

        return true;
    }

    public function salmonella($uji)
    {
        $uji = strtoupper((string)$uji);
        $isi = strtoupper((string)$this->spec);

        // Periksa apakah nilai $uji sama dengan nilai $val atau sama dengan string "NEGATIF"
        if ($uji > $isi && $uji !== 'NEGATIVE') {
            return false;
        }

        return true;
    }
    public function ym($uji)
    {
        $uji = strtoupper((string)$uji);
        $isi = strtoupper((string)$this->spec);

        // Periksa apakah nilai $uji sama dengan nilai $val atau sama dengan string "NEGATIF"
        if ($uji > $isi && $uji !== 'NEGATIVE') {
            return false;
        }

        return true;
    }
    public function entero($uji)
    {
        $uji = strtoupper((string)$uji);
        $isi = strtoupper((string)$this->spec);

        // Periksa apakah nilai $uji sama dengan nilai $val atau sama dengan string "NEGATIF"
        if ($uji > $isi && $uji !== 'NEGATIVE') {
            return false;
        }

        return true;
    }







    public function salinity($uji)
    {

        $uji = (int)$uji;
        $max = (int)$this->spec;
        if ($uji > $max) {
            return false;
        }
        return true;
    }
    public function mesh_1_4($uji)
    {

        $uji = (int)$uji;
        $max = (int)$this->spec;
        if ($uji > $max) {
            return false;
        }
        return true;
    }
    public function mesh_6($uji)
    {

        $uji = (int)$uji;
        $max = (int)$this->spec;
        if ($uji > $max) {
            return false;
        }
        return true;
    }
    public function mesh_1_4_5($uji)
    {

        $uji = (int)$uji;
        $min = (int)$this->spec;
        if ($uji < $min) {
            return false;
        }
        return true;
    }
    public function mesh_30($uji)
    {

        $uji = (int)$uji;
        $min = (int)$this->spec;
        if ($uji < $min) {
            return false;
        }
        return true;
    }
    public function mesh_40_kurang($uji)
    {

        $uji = (int)$uji;
        $min = (int)$this->spec;
        if ($uji < $min) {
            return false;
        }
        return true;
    }
}
