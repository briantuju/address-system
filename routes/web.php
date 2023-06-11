<?php

use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['prefix' => 'address', 'as' => 'address.'], function () {
    Route::get('/', [AddressController::class, 'create'])->name('create');

    Route::post('/', [AddressController::class, 'store'])->name('store');
});
