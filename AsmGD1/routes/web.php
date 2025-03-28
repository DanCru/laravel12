<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('/update/{id}', [AdminController::class, 'update'])->name('admin.update');
Route::delete('/destroy/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('/signin', [AuthController::class, 'signin'])->name('signin')->middleware('guest');
// Route::post('/signin', [AuthController::class, 'signinPost'])->name('signin.post')->middleware('guest');
Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
// Route::post('/signup', [AuthController::class, 'signupPost'])->name('signup.post')->middleware('guest');      


Route::get('/', [NewsController::class, 'index'])->name('news.home');
Route::get('/news/detail/{id}', [NewsController::class, 'newsDetail'])->name('news.detail');


// Quên mật khẩu
Route::get('/forgot-password', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

// Reset mật khẩu
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'reset'])->name('password.update');






Route::post('/check-email', [AuthController::class, 'checkEmail'])->name('check.email');

// Đăng nhập
Route::post('/signin', [AuthController::class, 'signinPost'])->name('signin.post');

// Đăng ký
Route::post('/signup', [AuthController::class, 'signupPost'])->name('signup.post');


Route::get('/news/search', [NewsController::class, 'search'])->name('news.search');
Route::get('/news/category/{id}', [NewsController::class, 'categoryNews'])->name('news.category');