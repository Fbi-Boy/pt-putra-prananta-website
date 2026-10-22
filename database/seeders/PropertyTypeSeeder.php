<?php
namespace Database\Seeders;

use App\Models\PropertyType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertyTypeSeeder extends Seeder {
    public function run(): void {
        $types = [
            ['Rumah', 'house'], ['Tanah', 'land-plot'], ['Ruko', 'store'],
            ['Apartemen', 'building-2'], ['Kos', 'bed-double'], ['Villa', 'home'],
            ['Gudang', 'warehouse'], ['Kantor', 'briefcase'],
        ];
        foreach ($types as $i => $t) {
            PropertyType::updateOrCreate(
                ['slug' => Str::slug($t[0])],
                ['name' => $t[0], 'icon' => $t[1], 'order' => $i, 'is_active' => true]
            );
        }
    }
}
