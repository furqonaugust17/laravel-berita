<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {


    Route::middleware(['verified'])->group(function () {
        Route::group(['prefix' => 'backend', 'middleware' => ['admin']], function () {
            Route::get('dashboard', function () {
                return view('dashboard');
            })->name('dashboard');
            Route::resource('berita', BeritaController::class)->parameters(['berita' => 'berita'])->except(['show']);
        });

        Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
        Route::get('/berita/{berita:slug}', [BeritaController::class, 'show'])->name('berita.detail');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__ . '/auth.php';
