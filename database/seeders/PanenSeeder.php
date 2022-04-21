<?php

namespace Database\Seeders;

use App\Models\Panen;
use Illuminate\Database\Seeder;

class PanenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Panen::factory()
            ->count(5)
            ->create();
    }
}
