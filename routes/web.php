<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::group(['prefix' => 'address', 'as' => 'address.'], function () {
    Route::get('/', [AddressController::class, 'create'])
        ->name('create');

    Route::post('/', [AddressController::class, 'store'])
        ->name('store');

    Route::delete('/{address}', [AddressController::class, 'destroy'])
        ->name('destroy');

    Route::get('/{address}', [AddressController::class, 'show'])
        ->name('show');
});

Route::resource('address.document', DocumentController::class)
    ->shallow()
    ->only(['store', 'show', 'destroy'])
    ->missing(function () {
        return back()->with('toast_error', 'Document not found');
    });

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__ . '/auth.php';
