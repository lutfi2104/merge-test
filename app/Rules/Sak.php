<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Sak implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    private $sak_akhir;
    public function __construct($sak_akhir)
    {
        $this->sak_akhir = $sak_akhir;
    }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($this->sak_akhir < $value) {
            $fail('Sak awal harus lebih kecil dari sak akhir');
        }
    }
}
