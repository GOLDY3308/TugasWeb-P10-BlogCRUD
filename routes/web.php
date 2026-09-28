<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Redirect halaman utama langsung ke daftar post
Route::get('/', function () {
    return redirect()->route('posts.index');
});

// Requirement 1: Route::resource('posts') otomatis membuat 7 named routes
Route::resource('posts', PostController::class);

// Route tambahan untuk Bonus Soft Delete (Trash, Restore, Force Delete)
Route::get('/posts-trash', [PostController::class, 'trash'])->name('posts.trash');
Route::patch('/posts-trash/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
Route::delete('/posts-trash/{id}/force-delete', [PostController::class, 'forceDelete'])->name('posts.forceDelete');