<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ItemTransaksiPetani;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemTransaksiPetaniFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ItemTransaksiPetani::class;

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
            'panen_id' => \App\Models\Panen::factory(),
            'transaksi_petani_id' => \App\Models\TransaksiPetani::factory(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
