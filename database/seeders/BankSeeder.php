<?php
namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder {
    public function run(): void {
        Bank::updateOrCreate(
            ['code' => 'MANDIRI'],
            [
                'name' => 'Bank Mandiri',
                'interest_rate' => 7.50,
                'min_tenor' => 5,
                'max_tenor' => 20,
                'min_dp_percent' => 10,
                'is_active' => true,
                'order' => 0,
            ]
        );
    }
}
