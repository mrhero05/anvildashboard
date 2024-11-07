<?php

use App\Livewire\Admin\Judge;
use App\Livewire\Admin\Screener;
use App\Livewire\Admin\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Entries\AllEntries;


Route::redirect('/', 'login');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard',Dashboard::class)->name('dashboard');
    Route::get('screener',Screener::class)->name('screener');
    Route::get('judge',Judge::class)->name('judge');
    Route::get('all-entries',AllEntries::class)->name('all-entries');
});

Route::view('profile', 'livewire.admin.profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
