<?php

namespace Database\Factories;

use App\Models\Ujirm;




use App\Models\NamaProduk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ujirm>
 */

class UjirmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Ujirm::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tgl_datang' => $this->faker->date,
            'nama_produk_supplier_id' => function () {
                return \App\Models\NamaProduk_Supplier::inRandomOrder()->first()->id;
            },
            'supplier_id' => function () {
                return \App\Models\Supplier::inRandomOrder()->first()->id;
            },
            'no_batch' => $this->faker->unique()->word,
            'halal' => $this->faker->date,
            'bersih' => $this->faker->randomElement(['Bersih', 'Kotor']),
            'kondisi' => $this->faker->randomElement(['Digembok', 'Rusak', 'Hilang']),
            'aroma' => $this->faker->randomElement(['Normal', 'Abnormal']),
            'bentuk' => $this->faker->randomElement(['Normal', 'Abnormal']),
            'warna' => $this->faker->randomElement(['Normal', 'Abnormal']),
            'sample' => $this->faker->randomNumber,
            'asing' => $this->faker->randomElement(['Tidak Ada']),
            'coa' => function () {
                // Menghasilkan nama file acak dengan ekstensi PNG
                $imageName = $this->faker->word . '.png';

                // Menggunakan method image dari Faker untuk menghasilkan URL gambar palsu
                $imageData = $this->faker->image(storage_path('app/public/coa'), 400, 300, null, false);

                // Memindahkan file palsu ke lokasi yang sesuai
                $path = storage_path("app/public/coa/{$imageName}");
                file_put_contents($path, $imageData);

                // Mengembalikan nama file
                return $imageName;
            },
            'rasa' => $this->faker->randomElement(['Normal', 'Abnormal']),
            'suhu' => $this->faker->randomFloat(2, -20, 40),
            'note' => $this->faker->text,
            'status' => $this->faker->randomElement(['Passed', 'Reject']),
            'qty' => $this->faker->word,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }
}
