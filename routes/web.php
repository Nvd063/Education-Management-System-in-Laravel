<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // 1. Check if the user is the Admin
    if (auth()->user()->email === 'admin@gmail.com') {
        return redirect()->route('students.index');
    }

    // 2. If not admin, show the normal dashboard
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::middleware(['auth'])->group(function () {

//     Route::get('/students', [StudentController::class, 'index'])
//         ->name('students.index');

//     Route::get('/students/create', [StudentController::class, 'create'])
//         ->name('students.create');

//     Route::post('/students', [StudentController::class, 'store'])
//         ->name('students.store');

// });

Route::middleware(['auth'])->group(function () {
    Route::resource('students', StudentController::class);
});



require __DIR__.'/auth.php';





