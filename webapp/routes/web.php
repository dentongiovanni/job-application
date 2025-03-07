<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicantController;



Route::middleware('auth')->group(function () {

    Route::redirect('/', '/applicants');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/applicants/search', [ApplicantController::class, 'search'])->name('applicants.search');
    Route::resource('applicants', ApplicantController::class);
});

require __DIR__.'/auth.php';
