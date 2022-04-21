<?php

namespace Database\Seeders;

use App\Models\LimitStok;
use Illuminate\Database\Seeder;

class LimitStokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LimitStok::factory()
            ->count(5)
            ->create();
    }
}
