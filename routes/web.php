<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/upload', [PostController::class, 'store'])->name('post.upload');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['role:super-administrador', 'auth', 'verified'])->name('dashboard');

Route::get('/dashboard-usuario', function () {
    return view('dashboard');
})->middleware(['role:usuario', 'auth', 'verified'])->name('dashboard.usuario');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
