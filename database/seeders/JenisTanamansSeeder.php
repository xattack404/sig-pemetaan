<?php

namespace Database\Seeders;

use App\Models\JenisTanamans;
use Illuminate\Database\Seeder;

class JenisTanamansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisTanamans::factory()
            ->count(5)
            ->create();
    }
}
