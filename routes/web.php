<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [HomeController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

/**
 * Public pages
 */
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

/**
 * Admin news management
 */




/**
 * Authenticated user profile (Breeze)
 */
Route::middleware('auth')->group(function () {
    // Breeze profile routes blijven zoals je hebt
});

/**
 * Fitness public pages (optioneel publiek) + user actions
 */
Route::get('/workouts', [WorkoutController::class, 'index'])->name('workouts.index');
Route::get('/workouts/{workout}', [WorkoutController::class, 'show'])->name('workouts.show');

Route::middleware('auth')->group(function () {
    Route::post('/workouts/{workout}/toggle', [WorkoutController::class, 'toggle'])
        ->name('workouts.toggle');
});

/**
 * Admin panel
 *

 */


/**
 * Public news (read-only)
 */
Route::resource('news', NewsController::class)->only(['index', 'show']);

/**
 * Admin news (CRUD)
 */
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('news', NewsController::class)->except(['show']);
    });
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {


    Route::get('/faq', [FaqController::class, 'adminIndex'])->name('faq.admin');
    Route::resource('faq-categories', \App\Http\Controllers\Admin\FaqCategoryController::class);
    Route::resource('faqs', \App\Http\Controllers\Admin\FaqController::class);

    Route::resource('workouts', \App\Http\Controllers\Admin\WorkoutController::class);
    Route::resource('exercises', \App\Http\Controllers\Admin\ExerciseController::class);

    Route::get('/contacts', [ContactController::class, 'adminIndex'])->name('contacts.index');
    Route::get('/contacts/{contactMessage}', [ContactController::class, 'adminShow'])->name('contacts.show');

    Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
    Route::post('/users/{user}/toggle-admin', [UserManagementController::class, 'toggleAdmin'])->name('users.toggleAdmin');
    Route::get('/users/create', [UserManagementController::class, 'create'])->name('users.create');
    Route::post('/users', [UserManagementController::class, 'store'])->name('users.store');
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
});
require __DIR__.'/auth.php';
