<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LoaiSanPham;
class LoaiSanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LoaiSanPham::create([
            'tenLoai' => 'Bánh mì',
            'moTa' => 'Bánh mì là một loại thực phẩm phổ biến ở Việt Nam, thường được làm từ bột mì và nước.',
        ]);

        LoaiSanPham::create([
            'tenLoai' => 'Bánh bao',
            'moTa' => 'Bánh bao là một loại bánh truyền thống của Việt Nam, thường được nhồi với thịt và rau củ.',
        ]);

        LoaiSanPham::create([
            'tenLoai' => 'Bánh tét',
            'moTa' => 'Bánh tét là một món ăn truyền thống của người Việt Nam, thường được làm vào dịp Tết Nguyên Đán.',
        ]);

        LoaiSanPham::create([
            'tenLoai' => 'Bánh chưng',
            'moTa' => 'Bánh chưng là một món ăn truyền thống của người Việt Nam, thường được làm vào dịp Tết Nguyên Đán.',
        ]);
    }
}
