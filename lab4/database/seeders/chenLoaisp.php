<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class chenLoaisp extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loaisp')->insert([
            ['tenLoai' => 'Smartphone', 'thuTu' => 1, 'anHien' => 1, 'urlHinh' => 'smartphone.jpg'],
            ['tenLoai' => 'Tablet', 'thuTu' => 2, 'anHien' => 1, 'urlHinh' => 'tablet.jpg'],
        ]);
    }
}
