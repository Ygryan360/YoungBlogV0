<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'home'])->name('home');
    Route::get('/allposts', [BlogController::class, 'posts'])->name('posts');
    Route::get('/search', [BlogController::class, 'search'])->name('search');
    Route::get('/contact', [BlogController::class, 'contact'])->name('contact');
    Route::post('/contact', [BlogController::class, 'storeContact'])->name('storeContact');
    Route::get('/about', [BlogController::class, 'about'])->name('about');
    Route::get('/privacy', [BlogController::class, 'privacy'])->name('privacy');
    Route::post('/subscribe', [BlogController::class, 'newsletter'])->name('newsletter');
    Route::get('/confirm-subscription', [BlogController::class, 'confirm'])->name('confirm');
    Route::get('/unsubscribe', [BlogController::class, 'unsubscribe'])->name('unsubscribe');
    Route::get('/post/{slug}-{post}', [BlogController::class, 'show'])
        ->where(['slug' => '[a-z0-9-]+', 'post' => '[0-9]+'])
        ->name('show');
    Route::post('/post/{post}/comment', [BlogController::class, 'comment'])->name('comment');
    Route::get('/categorie/{slug}', [BlogController::class, 'category'])
        ->where('slug', '[a-z0-9-]+')
        ->name('category');
    Route::get('/tag/{slug}', [BlogController::class, 'tag'])
        ->where('slug', '[a-z0-9-]+')
        ->name('tag');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
