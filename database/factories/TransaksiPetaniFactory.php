<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\TransaksiPetani;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransaksiPetaniFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TransaksiPetani::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'total' => $this->faker->text(7),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
