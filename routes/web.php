<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['prefix' => 'address', 'as' => 'address.'], function () {
    Route::get('/', [AddressController::class, 'create'])->name('create');

    Route::post('/', [AddressController::class, 'store'])->name('store');

    Route::get('/{address}', [AddressController::class, 'show'])->name('show');
});

Route::resource('address.document', DocumentController::class)
    ->shallow()
    ->only(['store', 'show', 'destroy'])
    ->missing(function () {
        return back()->with('toast_error', 'Document not found');
    });
