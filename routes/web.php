<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

// Main / Public Routes
Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/portfolio', [MainController::class, 'portfolio'])->name('portfolio');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');

// Guest Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
});

// Protected Admin Routes
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Services
    Route::post('/services/{service}/toggle', [ServiceController::class, 'toggle'])->name('services.toggle');
    Route::resource('services', ServiceController::class);

    // Packages
    Route::post('/packages/{package}/toggle', [PackageController::class, 'toggle'])->name('packages.toggle');
    Route::resource('packages', PackageController::class);

    // Portfolios
    Route::post('/portfolios/{portfolio}/toggle', [PortfolioController::class, 'toggle'])->name('portfolios.toggle');
    Route::resource('portfolios', PortfolioController::class);

    // Testimonials
    Route::post('/testimonials/{testimonial}/toggle', [TestimonialController::class, 'toggle'])->name('testimonials.toggle');
    Route::resource('testimonials', TestimonialController::class);

    // FAQs
    Route::post('/faqs/{faq}/toggle', [FaqController::class, 'toggle'])->name('faqs.toggle');
    Route::resource('faqs', FaqController::class);

    // Clients
    Route::post('/clients/{client}/toggle', [ClientController::class, 'toggle'])->name('clients.toggle');
    Route::resource('clients', ClientController::class);

    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
});

