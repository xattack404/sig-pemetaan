<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\JenisTanamans;
use Illuminate\Database\Eloquent\Factories\Factory;

class JenisTanamansFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JenisTanamans::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->text(50),
        ];
    }
}
