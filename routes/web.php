<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

// For tests
// use App\Models\Post;
// use Illuminate\Support\Facades\Mail;
// use App\Mail\ConfirmSubscription;
// use App\Models\Folower;
// use App\Mail\NewPost;

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
    // Route::get('/foo', function () {
    //     $folower = new Folower();
    //     $folower->email = 'test@tes.co';
    //     $folower->id = 88;
    //     $post = Post::find(1);
    //     // dd();
    //     $unsubscribeUrl = route('blog.unsubscribe', [$folower->email, $folower->id]);
    //     Mail::to($folower->email)->queue(new NewPost($post, $unsubscribeUrl));
    // });


    Route::get('/post/{slug}-{post}', [BlogController::class, 'show'])
        ->where(['slug' => '[a-z0-9-]+', 'post' => '[0-9]+'])
        ->name('show');

    Route::get('/category/{name}', action: [BlogController::class, 'category'])
        ->where('name', '[a-z0-9]+')
        ->name('category');

    Route::get('/tag/{name}', [BlogController::class, 'tag'])
        ->where('name', '[a-z0-9]+')
        ->name('tag');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('posts', PostController::class)->except('show');
    Route::patch('/posts/{post}/changestatus', [PostController::class, 'changeStatus'])->name('posts.changestatus');
    Route::resource('categories', CategoryController::class)->except('show');
    Route::resource('tags', TagController::class)->except('show');
});

require __DIR__ . '/auth.php';
