<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Middleware\AdminAuth;

// ==========================
// ROUTE PUBLIK
// ==========================

// Halaman Beranda
Route::get('/', [RecipeController::class, 'homepage'])->name('home');

// Detail Resep
Route::get('/recipe/{id}', [RecipeController::class, 'show'])->name('recipes.show');

// Review Resep (aman dari konflik)
Route::post('/recipes/{id}/add-review', [RecipeController::class, 'storeReview'])->name('recipes.review');

// Pencarian
Route::get('/search', [RecipeController::class, 'search'])->name('recipes.search');


// ==========================
// AUTH ADMIN
// ==========================
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


// ==========================
// PANEL ADMIN (dengan middleware)
// ==========================
Route::middleware([AdminAuth::class])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [RecipeController::class, 'adminIndex'])->name('dashboard');

    // CRUD Resep (admin.recipes.*)
    Route::resource('recipes', RecipeController::class)->except(['show']);

    // CRUD Kategori (admin.categories.*)
    Route::resource('categories', CategoryController::class)->except(['show']);
});
