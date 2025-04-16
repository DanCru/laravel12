<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'tenSP' => 'Bánh mì',
            'gia' => 100000,
            'antien' => 1,
        ]);

        Product::create([
            'tenSP' => 'Bánh bao',
            'gia' => 200000,
            'antien' => 1,
        ]);
        
        Product::create([
            'tenSP' => 'Bánh tét',
            'gia' => 300000,
            'antien' => 1,
        ]);
        Product::create([
            'tenSP' => 'Bánh chưng',
            'gia' => 400000,
            'antien' => 1,
        ]);
    }
}
