<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsCommentController;
use App\Http\Controllers\PublicProfileController;
use App\Http\Controllers\ForumController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [HomeController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

/**
 * Public pages
 */
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
/**
 * Admin news management
 */






/**
 * Fitness public pages (optioneel publiek) + user actions
 */
Route::get('/workouts', [WorkoutController::class, 'index'])->name('workouts.index');
Route::get('/workouts/{workout}', [WorkoutController::class, 'show'])->name('workouts.show');

/**
 * Authenticated user profile (Breeze)
 */

Route::middleware('auth')->group(function () {
    Route::post('/workouts/{workout}/toggle', [WorkoutController::class, 'toggle'])
        ->name('workouts.toggle');
});

/**
 * Public news (read-only)
 */
Route::resource('news', NewsController::class)->only(['index', 'show']);

// News comments (auth only)
Route::middleware('auth')->group(function () {
    Route::post('/news/{news}/comments', [NewsCommentController::class, 'store'])
        ->name('news.comments.store');

    // Update comment (owner) - authorization enforced in controller
    Route::patch('/news/{news}/comments/{comment}', [NewsCommentController::class, 'update'])
        ->name('news.comments.update');

    // Delete comment (owner or admin) - authorization enforced in controller
    Route::delete('/news/{news}/comments/{comment}', [NewsCommentController::class, 'destroy'])
        ->name('news.comments.destroy');
});

// Public user profiles
Route::get('/users/{user}', [PublicProfileController::class, 'show'])->name('users.show');

/**
 * Forum (public read, auth write)
 */
Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
Route::get('/forum/{thread}', [ForumController::class, 'show'])->name('forum.show');

Route::middleware('auth')->group(function () {
    Route::post('/forum/threads', [ForumController::class, 'storeThread'])->name('forum.threads.store');
    Route::post('/forum/{thread}/posts', [ForumController::class, 'storePost'])->name('forum.posts.store');

    Route::patch('/forum/posts/{post}', [ForumController::class, 'updatePost'])->name('forum.posts.update');
    Route::delete('/forum/posts/{post}', [ForumController::class, 'destroyPost'])->name('forum.posts.destroy');
});

// Admin forum moderation (delete)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::delete('/forum/{thread}', [ForumController::class, 'destroyThread'])->name('forum.threads.destroy');
});

/**
 * Admin news (CRUD)
 */
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {


        Route::resource('news', \App\Http\Controllers\Admin\NewsController::class);
        Route::resource('faq-categories', \App\Http\Controllers\Admin\FaqCategoryController::class);
        Route::resource('faqs', \App\Http\Controllers\Admin\FaqController::class);

        Route::resource('workouts', \App\Http\Controllers\Admin\WorkoutController::class);
        Route::resource('exercises', \App\Http\Controllers\Admin\ExerciseController::class);
        Route::post(
            'workouts/{workout}/exercises',
            [\App\Http\Controllers\Admin\WorkoutController::class, 'attachExercise']
        )->name('workouts.exercises.attach');

        Route::delete(
            'workouts/{workout}/exercises/{exercise}',
            [\App\Http\Controllers\Admin\WorkoutController::class, 'detachExercise']
        )->name('workouts.exercises.detach');


        Route::get('/contacts', [ContactController::class, 'adminIndex'])->name('contacts.index');
        Route::get('/contacts/{contactMessage}', [ContactController::class, 'show'])->name('contacts.show');
        Route::post('/contacts/{contactMessage}/reply', [ContactController::class, 'storeReply'])->name('contacts.reply');

        Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserManagementController::class, 'create'])->name('users.create');
        Route::post('/users', [UserManagementController::class, 'store'])->name('users.store');

        Route::get('/users/{user}/edit', [UserManagementController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserManagementController::class, 'update'])->name('users.update');

        Route::delete('/users/{user}', [UserManagementController::class, 'destroy'])->name('users.destroy');

        Route::post('/users/{user}/toggle-admin', [UserManagementController::class, 'toggleAdmin'])
            ->name('users.toggleAdmin');

    });






Route::get('/contact', [ContactController::class, 'create'])
    ->name('contact.create');

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::get('/contacts', [ContactController::class, 'userIndex'])->name('contacts.user.index');
    Route::get('/contacts/{contactMessage}/thread', [ContactController::class, 'userThread'])->name('contacts.thread');
    Route::post('/contacts/{contactMessage}/reply', [ContactController::class, 'storeUserReply'])->name('contacts.user.reply');
});
require __DIR__.'/auth.php';
