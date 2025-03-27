<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class chendienthoai extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 300; $i++) {
            DB::table('dienthoai')->insert([
                ['tenDT' => 'Oppo XA ' . $i, 'gia' => mt_rand(7000000, 10000000), 'ngayCapNhat' => now(), 'idLoai' => 2],
                ['tenDT' => 'iPhone xs Max ' . $i, 'gia' => mt_rand(5000000, 8000000), 'ngayCapNhat' => now(), 'idLoai' => 1],
                ['tenDT' => 'Nokia Pro ' . $i, 'gia' => mt_rand(2500000, 5000000), 'ngayCapNhat' => now(), 'idLoai' => 1],
            ]);
        }
    }
}
