<?php

    use App\Http\Controllers\InFoStudent;
    use App\Http\Controllers\TinController;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\DB;  

    // Route::get('/', function () {
    //     return view('home');
    // });
    Route::get('/', [TinController::class, 'home'])->name('tin.moi');

    Route::get('/tin/ds', [TinController::class, 'index'])->name('tin.ds');
    Route::get('/tin/create', [TinController::class, 'create'])->name('tin.create');
    Route::post('/tin/store', [TinController::class, 'store'])->name('tin.store');
    Route::get('/tin/edit/{id}', [TinController::class, 'edit'])->name('tin.edit');
    Route::post('/tin/update/{id}', [TinController::class, 'update'])->name('tin.store');
    Route::get('/tin/delete/{id}', [TinController::class, 'destroy'])->name('tin.update');

