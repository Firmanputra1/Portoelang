<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/portfolio', [MainController::class, 'portfolio'])->name('portfolio');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
});
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Protected Admin Panel Routes
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']); // Alias
    
    // Settings
    Route::get('/settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');

    // Services CRUD
    Route::resource('/services', App\Http\Controllers\Admin\ServiceController::class);
    Route::post('/services/{service}/toggle', [App\Http\Controllers\Admin\ServiceController::class, 'toggle'])->name('services.toggle');

    // Packages CRUD
    Route::resource('/packages', App\Http\Controllers\Admin\PackageController::class);
    Route::post('/packages/{package}/toggle', [App\Http\Controllers\Admin\PackageController::class, 'toggle'])->name('packages.toggle');

    // Portfolios CRUD
    Route::resource('/portfolios', App\Http\Controllers\Admin\PortfolioController::class);
    Route::post('/portfolios/{portfolio}/toggle', [App\Http\Controllers\Admin\PortfolioController::class, 'toggle'])->name('portfolios.toggle');

    // Testimonials CRUD
    Route::resource('/testimonials', App\Http\Controllers\Admin\TestimonialController::class);
    Route::post('/testimonials/{testimonial}/toggle', [App\Http\Controllers\Admin\TestimonialController::class, 'toggle'])->name('testimonials.toggle');

    // FAQs CRUD
    Route::resource('/faqs', App\Http\Controllers\Admin\FaqController::class);
    Route::post('/faqs/{faq}/toggle', [App\Http\Controllers\Admin\FaqController::class, 'toggle'])->name('faqs.toggle');

    // Clients CRUD
    Route::resource('/clients', App\Http\Controllers\Admin\ClientController::class);
    Route::post('/clients/{client}/toggle', [App\Http\Controllers\Admin\ClientController::class, 'toggle'])->name('clients.toggle');
});
