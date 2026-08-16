<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/artikel', [PageController::class, 'artikel'])->name('artikel');
Route::get('/potensi-desa', [PageController::class, 'potensiDesa'])->name('potensi-desa');

