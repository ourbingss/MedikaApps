<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Rute CRUD 
    Route::resource('dokter', DokterController::class);
    Route::resource('pasien', PasienController::class);
    Route::resource('rekam-medis', RekamMedisController::class);

    //Rute untuk fitur export 
    Route::get('/rekam-medis-pdf',[RekamMedisController::class, 'exportPdf'])->name('rekam-medis.pdf');
    Route::get('/rekam-medis-word', [RekamMedisController::class, 'exportWord'])->name('rekam-medis.word');

    Route::get('/pasien-pdf', [PasienController::class, 'exportPdf'])->name('pasien.exportPdf');
    Route::get('/pasien-word', [PasienController::class, 'exportWord'])->name('pasien.exportWord');
    Route::get('/dokter-pdf', [DokterController::class, 'exportPdf'])->name('dokter.exportPdf');
    Route::get('/dokter-word', [DokterController::class, 'exportWord'])->name('dokter.exportWord');
});

require __DIR__.'/auth.php';
