<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder {
    public function run(): void {
        User::updateOrCreate(
            ['email' => 'admin@putraprananta.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'phone' => '6281234567890',
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );
    }
}
