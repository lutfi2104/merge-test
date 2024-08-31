<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

class NamaProdukSupplierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\NamaProduk_Supplier::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'supplier_id' => function () {
                // Pilih ID acak dari model Supplier
                return \App\Models\Supplier::inRandomOrder()->first()->id;
            },
            'produk_supplier_id' => function () {
                // Pilih ID acak dari model ProdukSupplier
                return \App\Models\ProdukSupplier::inRandomOrder()->first()->id;
            },
            'nama_produk' => $this->faker->word,
            'satuan' => $this->faker->word,
            'kemasan' => $this->faker->word,
            'berat' => $this->faker->numberBetween(1, 1000),
            'masa_halal' => $this->faker->date,
            'by_halal' => $this->faker->word,
            'kode' => str_pad($this->faker->numberBetween(0, 999), 3, '0', STR_PAD_LEFT),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }
}
