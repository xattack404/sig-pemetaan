<?php

namespace Database\Factories;

use App\Models\Transaksi;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransaksiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaksi::class;

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
            'barang_id' => \App\Models\Barang::factory(),
            'detail_transaksi_id' => \App\Models\DetailTransaksi::factory(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
