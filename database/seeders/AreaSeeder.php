<?php
namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AreaSeeder extends Seeder {
    public function run(): void {
        $province = Area::updateOrCreate(
            ['slug' => 'jawa-timur'],
            ['name' => 'Jawa Timur', 'type' => 'province', 'is_active' => true]
        );

        $cities = ['Jember', 'Lumajang', 'Bondowoso', 'Situbondo', 'Banyuwangi'];
        $jemberDistricts = ['Kaliwates', 'Sumbersari', 'Patrang', 'Ajung', 'Rambipuji', 'Mangli', 'Arjasa', 'Pakusari'];

        foreach ($cities as $city) {
            $cityRow = Area::updateOrCreate(
                ['slug' => Str::slug($city)],
                ['name' => $city, 'type' => 'city', 'parent_id' => $province->id, 'is_active' => true]
            );

            if ($city === 'Jember') {
                foreach ($jemberDistricts as $d) {
                    Area::updateOrCreate(
                        ['slug' => Str::slug($city . '-' . $d)],
                        ['name' => $d, 'type' => 'district', 'parent_id' => $cityRow->id, 'is_active' => true]
                    );
                }
            }
        }
    }
}
