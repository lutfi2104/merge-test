<?php

namespace Database\Factories;

use App\Models\supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProdusenFactory extends Factory
{
    /**
     * Define the model's default state.

     * @return array<string, mixed>
     */
    protected $model = supplier::class;
    public function definition(): array
    {
        return [
            'nama_supplier' => $this->faker->name,
            'asal_supplier' => $this->faker->country,
            'nama_produsen' => $this->faker->company,
            'asal_produsen' => $this->faker->city,
            'alamat1' => $this->faker->address,
            'alamat2' => $this->faker->secondaryAddress,
            'no_tlp' => $this->faker->phoneNumber,
            'nama_pic' => $this->faker->name,
            'jabatan' => $this->faker->jobTitle,
            'email' => $this->faker->email,
            'no_hp' => $this->faker->phoneNumber,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }
}
