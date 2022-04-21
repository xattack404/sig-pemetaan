<?php

namespace Database\Factories;

use App\Models\Panen;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PanenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Panen::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'stok' => $this->faker->text(3),
            'harga' => $this->faker->text(7),
            'lahan_id' => \App\Models\Lahan::factory(),
        ];
    }
}
