<?php

use App\Http\Controllers\HiController;
use App\Http\Controllers\TinController;
use Illuminate\Support\Facades\DB ;
use Illuminate\Support\Facades\Route;

Route::get('/', [TinController::class, 'index'])->name('trangchu');
Route::get('/chitiet/{id}', [TinController::class, 'chitiet'])->name('chitiet');
Route::get('/tintrongloai/{id}', [TinController::class, 'tintrongloai'])->name('tintrongloai');






