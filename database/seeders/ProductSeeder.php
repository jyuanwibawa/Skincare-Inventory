<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Brand;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $avoskin = Brand::where('name', 'Avoskin')->first();
        Product::create([
            'name' => 'Avoskin Hydrating Treatment Water',
            'brand_id' => $avoskin->id,
            'stock' => 100,
            'price' => 250000,
        ]);
    }
}
