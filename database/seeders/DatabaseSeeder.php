<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
                'phone' => '082872874872'
            ]);
        $this->call(PermissionsSeeder::class);

        // $this->call(BarangSeeder::class);
        // $this->call(DetailTransaksiSeeder::class);
        // $this->call(ItemTransaksiPetaniSeeder::class);
        // $this->call(JenisTanamansSeeder::class);
        // $this->call(LahanSeeder::class);
        // $this->call(LimitStokSeeder::class);
        // $this->call(PanenSeeder::class);
        // $this->call(TransaksiSeeder::class);
        // $this->call(TransaksiPetaniSeeder::class);
        // $this->call(UserSeeder::class);
    }
}
