<?php

use App\Http\Controllers\Api\Entries\EntriesController;
use Illuminate\Support\Facades\Route;


Route::get('test-entry', function () {
    return 'Working';
});

Route::get('fetch-latest-entries', [EntriesController::class, 'getLatestEntries'])->name('api.fetchLatestEntries');
