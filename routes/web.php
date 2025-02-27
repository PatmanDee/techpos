<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\PricingController;
use App\Http\Controllers\Frontend\FeaturesController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\FaqController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
| These are the public-facing routes for your application.
|
*/

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');
Route::get('/features', [FeaturesController::class, 'index'])->name('features');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');

// Contact Form Submission
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Authentication Routes (Login/Register)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// // Include authentication routes
// require __DIR__.'/auth.php';

// // Include dashboard routes (protected by auth middleware)
// require __DIR__.'/dashboard.php';

// // Include super admin routes (if needed)
// if (file_exists(__DIR__.'/super_admin.php')) {
//     require __DIR__.'/super_admin.php';
// }
