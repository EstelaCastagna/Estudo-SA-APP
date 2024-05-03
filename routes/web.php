<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\BlogController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\CategoryController;
use Illuminate\Support\Facades\Route;

Route::namespace(value:'Site')->group(function(){
    Route::get('/', [HomeController::class, '__invoke'])->name('inicio');

    Route::get('produtos', [CategoryController::class, 'index'])->name('categorias');
    Route::get('produtos/{slug}', [CategoryController::class, 'show'])->name('categoria_produtos');

    Route::get('blog', [BlogController::class, '__invoke'])->name('blog');

    Route::view('sobre', 'site.sobre');

    Route::get('contato',[ContactController::class, 'index'])->name('contato');
    Route::post('contato',[ContactController::class, 'form'])->name('form_contato');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
