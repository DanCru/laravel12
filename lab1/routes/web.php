<?php

use App\Http\Controllers\NguyenAnhDuc;
use App\Http\Controllers\TinController;


use Illuminate\Support\Facades\Route;

Route::get('/', [TinController::class, 'index']);
Route::get('/lienhe', [TinController::class, 'lienhe']);
Route::get('/chitiet/{id}', [TinController::class, 'lay1tin']);
Route::get('/thongtinsv', [NguyenAnhDuc::class, 'thongtinsv']);


Route::get('/thongtinsv', function (){
       return view('hiii');
});
