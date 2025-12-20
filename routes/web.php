<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/users/{user}', [ProfileController::class, 'show'])
    ->name('profile.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin', function () {
            return 'Admin panel';
        });
    });

    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
});


Route::get('/', function () {
    return view('welcome');
});
