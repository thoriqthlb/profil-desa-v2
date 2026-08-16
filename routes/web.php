<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/artikel', [PageController::class, 'artikel'])->name('artikel');
Route::get('/artikel/{slug}', [PageController::class, 'artikelShow'])->name('artikel.show');
Route::get('/potensi-desa', [PageController::class, 'potensiDesa'])->name('potensi-desa');
Route::get('/potensi-desa/{id}', [PageController::class, 'potensiDesaShow'])->name('potensi-desa.show');
