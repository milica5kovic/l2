<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/students/{page?}', function(){
//     return view('student.page');
    
// });
Route::get('/students/{page?}', [StudentController::class, 'page'])->name('/students/{page?}');

// U routes/web.php napravite rute za te metode
// /students/{page?}   	ruta sa opcionim parametrom page, koja gađa metod page()
// /students/search/{search}	ruta koja gađa metod search()
// /student/{id}			ruta koja gađa metod student()
// Napunite metode kodom koji radi to što treba da radi, i ispisuje JSON sadržaj
require __DIR__.'/auth.php';
