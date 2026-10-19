<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// About
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

// Projects
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');

// News
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

// Donations
Route::get('/donate', [DonationController::class, 'create'])->name('donations.create');
Route::post('/donations', [DonationController::class, 'store'])->name('donations.store');
Route::get('/donations/success', [DonationController::class, 'success'])->name('donations.success');
Route::get('/donations/receipt/{id}', [DonationController::class, 'receipt'])->name('donations.receipt');

// Volunteers
Route::get('/volunteer', [VolunteerController::class, 'create'])->name('volunteers.create');
Route::post('/volunteers', [VolunteerController::class, 'store'])->name('volunteers.store');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Gallery
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

// Admin routes (Filament)
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    // Admin dashboard handled by Filament
});
