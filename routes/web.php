<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(["auth", "verified"])->group(function () {
    //-- Make resource Route For Orders Process
    Route::get('orders',function(){
        return Inertia::render('orders/index');
    });
    // Route::resource('orders', OrderController::class)->names(["index"]);
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
