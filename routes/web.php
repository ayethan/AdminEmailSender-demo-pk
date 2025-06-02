<?php

use Illuminate\Support\Facades\Route;
use Atk\Contact\Http\Controllers\ContactFormController;

Route::middleware(['guest','web'])->group(function () {
    Route::get('/contact', [ContactFormController::class, 'create'])
        ->name('contact.create');
    Route::post('/submit/contact', [ContactFormController::class, 'store'])
        ->name('contact.store');
});
