<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;



// **Rute Admin**
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

// **Rute User**
Route::middleware(['auth', \App\Http\Middleware\UserMiddleware::class])->group(function () {
    Route::get('/home', [UserController::class, 'index'])->name('home');
});

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/home', function () {
//     return view('home', ['title' => 'Home']);
// });

Route::get('/blog', function () {
    return view('blog', ['title'=> 'Blog']);
});

Route::get('/contact', function () {
    return view('contact', ['title'=> 'Contact']);
});

Route::get('/about', function () {
    return view('about', ['nama' => 'ferdiodwi', 'title'=> 'About']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
