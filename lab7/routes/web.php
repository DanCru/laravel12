<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HsController;
use App\Http\Controllers\SvController;
use App\Http\Controllers\EmailController;

Route::get('/mail', [EmailController::class, 'index'])->name('mail.index');
Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('send.email');
Route::get("sv", [SvController::class, 'sv']);
Route::post("sv", [SvController::class, 'sv_store'])->name('sv_store');
Route::get("hs", [HsController::class, 'hs']);
Route::post("hs", [HsController::class, 'hs_store'])->name('hs_store');
Route::get('/', function () {
    return view('welcome');
});