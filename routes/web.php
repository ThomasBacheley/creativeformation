<?php

use App\Http\Controllers\Admin\PostController as PostController;
use App\Http\Controllers\Admin\CategoryController as CategoryController;
use App\Http\Controllers\Admin\TagController as TagController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', [PageController::class, 'home']);

Route::middleware('auth')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/update/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/post/{id}-{slug}', [PostController::class, 'show'])->name('posts.show');

    Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    Route::get('/tags', [TagController::class, 'index'])->name('tag.index');
    Route::get('/tags/create', [TagController::class, 'create'])->name('tag.create');
    Route::post('/tags/store', [TagController::class, 'store'])->name('tag.store');
    Route::get('/tags/{tag}/edit', [TagController::class, 'edit'])->name('tag.edit');
    Route::put('/tags/update/{id}', [TagController::class, 'update'])->name('tag.update');
    Route::delete('/tags/{id}', [TagController::class, 'destroy'])->name('tag.destroy');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::get('/dashboard/posts', [PostController::class, 'indexadmin'])->middleware(['auth', 'verified'])->name('posts.indexadmin');

Route::get('/hello-creative', fn () => view('hello-creative'));

require __DIR__ . '/auth.php';
