<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ItemTransaksiPetani;

class ItemTransaksiPetaniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemTransaksiPetani::factory()
            ->count(5)
            ->create();
    }
}
