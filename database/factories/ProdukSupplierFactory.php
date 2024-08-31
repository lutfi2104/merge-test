<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProdukSupplier>
 */
class ProdukSupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\produkSupplier::class;
    public function definition(): array
    {
        return [
            'kode_jenis' => str_pad($this->faker->numberBetween(0, 999), 3, '0', STR_PAD_LEFT),
            'jenis_produk' => $this->faker->word,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }
}
