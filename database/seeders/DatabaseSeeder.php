<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        $this->call([
            PropertyTypeSeeder::class,
            AreaSeeder::class,
            BankSeeder::class,
            FacilitySeeder::class,
            AdminSeeder::class,
            DemoDataSeeder::class,
        ]);
    }
}
