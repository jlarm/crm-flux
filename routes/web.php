<?php

use App\Livewire\Dealership\Create;
use App\Livewire\Dealership\Index;
use App\Livewire\Dealership\Show;
use App\Livewire\Dealership\StoreIndex;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::view('dashboard', 'dashboard')
        ->name('dashboard');

    Route::group(['prefix' => 'dealerships'], function () {
        Route::get('/', Index::class)
            ->name('dealership.index');

        Route::get('create', Create::class)
            ->name('dealership.create');

        Route::get('{dealership:uuid}', Show::class)
            ->name('dealership.show');

        Route::get('{dealership:uuid}/stores}', StoreIndex::class)
            ->name('dealership.stores');
    });

    Route::get('users', \App\Livewire\User\Index::class)
        ->name('user.index');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
