<?php

namespace Database\Factories;

use App\Models\Lahan;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class LahanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lahan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->text(50),
            'status_panen' => 'Proses Tanam',
            'lattitude' => $this->faker->text(15),
            'longitude' => $this->faker->text(15),
            'jenis_tanamans_id' => \App\Models\JenisTanamans::factory(),
        ];
    }
}
