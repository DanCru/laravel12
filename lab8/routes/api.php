<?php 
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoaiSanPhamController;

Route::resource('products', ProductController::class);
Route::resource('loaisanpham', LoaiSanPhamController::class);
?>