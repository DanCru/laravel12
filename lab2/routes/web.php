<?php

use App\Http\Controllers\HiController;
use App\Http\Controllers\TinController;
use Illuminate\Support\Facades\DB ;
use Illuminate\Support\Facades\Route;

Route::get('/', [HiController::class, 'index']);
Route::get('/edit/{id}', [HiController::class, 'edit']);
Route::get('/tinxemnhieu', [TinController::class, 'xemnhieu'])->name('tinxemnhieu');
Route::get('/tinmoi', [TinController::class, 'tinmoi'])->name('tinmoi');
Route::get('/tintrongloai/{id}', [TinController::class, 'tintrongloai'])->name('tintrongloai');
Route::get('/tinchitiet/{id}', [TinController::class, 'tinchitiet'])->name('tinchitiet');


// Route::get('/xemnhieu', function () {
//     $query = DB::table('tin')
//     ->select('id', 'tieuDe', 'xem')
//     ->orderBy('xem', 'desc')
//     ->limit(6);
//     $data = $query->get();
//     foreach($data as $item) echo "<p>{$item->tieuDe}</p>";
// });
// Route::get('/tinmoi', function () {
//     $query = DB::table('tin')
//     ->select('id', 'tieuDe', 'ngayDang')
//     ->orderBy('ngayDang', 'desc')
//     ->limit(6);
//     $data = $query->get();
//     return view('tinmoi', ['data' => $data]);
// });
// Route::get('/tintrongloai/{$id}', function ($id) {
//     $query = DB::table('tin')
//     ->select('id', 'tieuDe', 'tomTat')
//     ->where('idTL', '=', $id)
//     ->orderBy('ngayDang', 'desc');
//     $data = $query->get();
//     return view('tinmoi', ['data' => $data]);
// });
