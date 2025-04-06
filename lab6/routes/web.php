<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuanTriTinController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/quantritin', [QuanTriTinController::class, 'index']);
Route::get('/quantri', function (){
    return view('quantri');
})->middleware('auth', 'Quantri');

Route::get('download', function(){ 
    return view("download"); 
})->middleware('auth'); 

Route::get('/basic-auth', function () {
    return "Chỉ người dùng được xác thực mới thấy nội dung này!";
})->middleware('auth.basic');

require __DIR__.'/auth.php';