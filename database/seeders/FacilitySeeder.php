<?php
namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder {
    public function run(): void {
        $items = [
            ['AC', 'wind'], ['Kolam Renang', 'waves'], ['Garasi', 'car'],
            ['Taman', 'trees'], ['Keamanan 24 Jam', 'shield-check'], ['CCTV', 'cctv'],
            ['Dapur Set', 'utensils'], ['Wifi', 'wifi'], ['Parkir Luas', 'square-parking'],
            ['Listrik 2200W', 'zap'],
        ];
        foreach ($items as $f) {
            Facility::updateOrCreate(['name' => $f[0]], ['icon' => $f[1], 'is_active' => true]);
        }
    }
}
