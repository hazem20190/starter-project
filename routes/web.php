<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;

// THEMES ROUTES
Route::controller(ThemeController::class)->name('theme.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/category/{name?}', 'category')->name('category');
    Route::get('/contact', 'contact')->name('contact');
});

// SUBSCRIBES ROUTES
Route::post('/subscribe-store', [SubscriberController::class, 'store'])->name('subscribe.store');
Route::post('/subscribe-store2', [SubscriberController::class, 'store2'])->name('subscribe.store2');

// CONTACT ROUTES
Route::post('/contact-store', [ContactController::class, 'store'])->name('contact.store');



// BLOGS ROUTES
Route::resource('blogs', BlogController::class)->except('show')->middleware('auth');
Route::get('blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');

Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');

require __DIR__ . '/auth.php';
