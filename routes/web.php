<?php

use App\Models\Donot;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::livewire('/dashboard', 'pages::app.dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
