<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan nama-nama brand skincare Indonesia ke dalam tabel 'brands'
        $brands = [
            'Sariayu',
            'Wardah',
            'Emina',
            'Pond\'s',
            'Olay',
            'L\'Oreal',
            'Himalaya',
            'Bioderma',
            'Nivea',
            'The Body Shop',
            'Skintific',
            'Avoskin',
            'Sensatia Botanicals',
            'Soothing Aloe Vera',
            'Innisfree',
            'Hada Labo',
            'Biore',
            'La Roche-Posay',
            'Kiehl\'s',
            'Neutrogena',
        ];

        // Menyimpan setiap brand ke dalam database
        foreach ($brands as $brand) {
            Brand::create([
                'name' => $brand,
                'description' => 'Brand skincare ' . $brand . ' yang populer di Indonesia.',
            ]);
        }
    }
}
