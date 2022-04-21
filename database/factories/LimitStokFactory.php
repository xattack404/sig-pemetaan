<?php

namespace Database\Factories;

use App\Models\LimitStok;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class LimitStokFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LimitStok::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'limit' => $this->faker->text(3),
        ];
    }
}
