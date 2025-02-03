<?php

use App\Livewire\Dealership\Index;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::view('dashboard', 'dashboard')
        ->name('dashboard');

    Route::get('dealerships', Index::class)
        ->name('dealership.index');

    Route::get('users', \App\Livewire\User\Index::class)
        ->name('user.index');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
