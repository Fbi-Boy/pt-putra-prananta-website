<?php
namespace Database\Seeders;

use App\Models\{Agent, Area, Developer, Property, PropertyImage, Testimonial, User};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DemoDataSeeder extends Seeder {
    public function run(): void {
        // ============ AGENT + USER ============
        $agentUser = User::updateOrCreate(
            ['email' => 'budi@putraprananta.com'],
            [
                'name' => 'Budi Santoso',
                'password' => Hash::make('password'),
                'role' => 'agent',
                'phone' => '6281234567890',
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );

        $admin = User::where('role', 'admin')->first();

        $agent = Agent::updateOrCreate(
            ['user_id' => $agentUser->id],
            [
                'name' => 'Budi Santoso',
                'slug' => 'budi-santoso',
                'photo' => 'images/agents/agent.png',
                'phone' => '6281234567890',
                'whatsapp' => '6281234567890',
                'email' => 'budi@putraprananta.com',
                'bio' => 'Agen properti berpengalaman di Jember.',
                'status' => 'active',
                'verified_at' => now(),
                'verified_by' => $admin?->id,
            ]
        );

        $kaliwates = Area::where('slug', 'jember-kaliwates')->first();
        $sumbersari = Area::where('slug', 'jember-sumbersari')->first();
        if ($kaliwates) {
            $agent->areas()->syncWithoutDetaching([
                $kaliwates->id  => ['is_primary' => true],
                $sumbersari?->id => ['is_primary' => false],
            ]);
        }

        // ============ PROPERTIES ============
        $properties = [
            ['title' => 'Rumah Minimalis Modern Dekat Pusat Kota Jember', 'price' => 850000000,  'area' => 'jember-kaliwates',  'image' => 'images/property/rumah1.jpg', 'recommended' => true],
            ['title' => 'Rumah Mewah dengan Halaman Luas',                 'price' => 1200000000, 'area' => 'jember-sumbersari', 'image' => 'images/property/rumah2.jpg', 'recommended' => true],
            ['title' => 'Rumah Strategis Dekat Kampus',                    'price' => 650000000,  'area' => 'jember-sumbersari', 'image' => 'images/property/rumah3.jpg', 'recommended' => false],
            ['title' => 'Rumah Keluarga Nyaman di Lokasi Strategis',       'price' => 975000000,  'area' => 'jember-patrang',    'image' => 'images/property/rumah4.jpg', 'recommended' => false],
            ['title' => 'Rumah Minimalis Baru di Jember',                  'price' => 750000000,  'area' => 'jember-sumbersari', 'image' => 'images/property/rumah1.jpg', 'recommended' => false],
            ['title' => 'Tanah Strategis Dekat Jalan Utama',               'price' => 450000000,  'area' => 'jember-kaliwates',  'image' => 'images/property/rumah2.jpg', 'recommended' => false],
            ['title' => 'Rumah Nyaman Siap Huni',                          'price' => 900000000,  'area' => 'jember-patrang',    'image' => 'images/property/rumah3.jpg', 'recommended' => false],
            ['title' => 'Rumah Dekat Kampus',                              'price' => 680000000,  'area' => 'jember-sumbersari', 'image' => 'images/property/rumah4.jpg', 'recommended' => false],
        ];

        foreach ($properties as $i => $p) {
            $area = Area::where('slug', $p['area'])->first();
            $prop = Property::updateOrCreate(
                ['slug' => Str::slug($p['title'])],
                [
                    'title' => $p['title'],
                    'description' => 'Deskripsi untuk ' . $p['title'],
                    'listing_type' => 'sale',
                    'property_type_id' => 1,
                    'area_id' => $area?->id,
                    'agent_id' => $agent->id,
                    'address' => ($area?->name ?? 'Jember') . ', Jember',
                    'latitude' => -8.1689 + ($i * 0.005),
                    'longitude' => 113.7020 + ($i * 0.005),
                    'price' => $p['price'],
                    'land_area' => 120,
                    'building_area' => 100,
                    'bedrooms' => 3,
                    'bathrooms' => 2,
                    'status' => 'published',
                    'is_recommended' => $p['recommended'],
                    'is_kpr_eligible' => true,
                    'published_at' => now()->subDays($i),
                    'created_by' => $admin?->id,
                ]
            );

            PropertyImage::updateOrCreate(
                ['property_id' => $prop->id, 'is_primary' => true],
                [
                    'path_thumb'  => $p['image'],
                    'path_medium' => $p['image'],
                    'path_large'  => $p['image'],
                    'alt_text'    => $p['title'],
                    'order'       => 0,
                ]
            );
        }

        // ============ TESTIMONIALS ============
        $testimonials = [
            ['Andi Pratama', 'CEO, PT Sejahtera', 'Pelayanannya sangat profesional. Saya dibantu dari awal mencari properti sampai proses transaksi selesai.'],
            ['Siti Rahma', 'Pengusaha', 'Proses mencari rumah jadi jauh lebih mudah. Timnya responsif dan memberikan informasi yang sangat jelas.'],
            ['Rizky Maulana', 'Karyawan Swasta', 'Saya sangat puas dengan pelayanan yang diberikan. Semua proses dijelaskan dengan baik dan transparan.'],
            ['Dewi Lestari', 'Wiraswasta', 'Pengalaman yang sangat menyenangkan. Properti yang ditawarkan sesuai dengan kebutuhan dan budget saya.'],
        ];
        foreach ($testimonials as $i => $t) {
            Testimonial::updateOrCreate(
                ['name' => $t[0]],
                ['role' => $t[1], 'photo' => 'images/testimoni.png', 'rating' => 5.0, 'message' => $t[2], 'is_active' => true, 'order' => $i]
            );
        }

        // ============ DEVELOPERS ============
        for ($i = 1; $i <= 8; $i++) {
            Developer::updateOrCreate(
                ['name' => 'Developer ' . $i],
                ['logo' => "images/developers/developer-$i.jpg", 'is_active' => true, 'order' => $i]
            );
        }
    }
}
