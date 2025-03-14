<?php

use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Route;

Route::get('/xemnhieu', function () {
    $query = FacadesDB::table('tin')
    ->select('id', 'tieuDe', 'xem')
    ->orderBy('xem', 'desc')
    ->limit(6);
    $data = $query->get();
    foreach($data as $item) echo "<p>{$item->tieuDe}</p>";
});
Route::get('/tinmoi', function () {
    $query = FacadesDB::table('tin')
    ->select('id', 'tieuDe', 'ngayDang')
    ->orderBy('ngayDang', 'desc')
    ->limit(6);
    $data = $query->get();
    return view('tinmoi', ['data' => $data]);
});
Route::get('/tintrongloai/{$id}', function ($id) {
    $query = FacadesDB::table('tin')
    ->select('id', 'tieuDe', 'tomTat')
    ->where('idTL', '=', $id)
    ->orderBy('ngayDang', 'desc');
    $data = $query->get();
    return view('tinmoi', ['data' => $data]);
});
