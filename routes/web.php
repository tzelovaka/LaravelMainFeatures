<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Catalog\IndexController;
use App\Http\Controllers\Catalog\StoreController;
use App\Http\Controllers\Catalog\DestroyController;
use App\Http\Controllers\Catalog\CreateController;
use App\Http\Controllers\Catalog\ShowController;
use App\Http\Controllers\Catalog\UpdateController;
use App\Http\Controllers\Catalog\EditController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\Post\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'Catalog'], function() {
Route::get('/cat', [IndexController::class, '__invoke'])->name('cat.index');
Route::get('/cat/create', [CreateController::class, '__invoke'])->name('cat.create');
Route::post('/cat', [StoreController::class, '__invoke'], )->name('cat.store');
Route::get('/cat/{post}', [ShowController::class, '__invoke'])->name('cat.show');
Route::get('/cat/{post}/edit', [EditController::class, '__invoke'])->name('cat.edit');
Route::patch('/cat/{post}', [UpdateController::class, '__invoke'])->name('cat.update');
Route::delete('/cat/{post}', [DestroyController::class, '__invoke'])->name('cat.delete');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function() {
//Route::get('/admin', [AdminController::class, '__invoke'])->name('admin.index');
Route::group(['namespace' => 'Post'], function() {
    Route::get('/post', [AdminController::class, '__invoke'])->name('admin.post.index');
});

});

Route::get('/main', [MainController::class, 'index'])->name('main.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');



