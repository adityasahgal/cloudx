<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriveController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\GoogleDriveController;
use App\Models\File;
use Illuminate\Http\Request;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/services', [HomeController::class, 'services'])->name('services');

// Route::get('/dashboard/addCloud', [HomeController::class, 'addCloud'])->name('addCloud')->middleware('auth');
// Route::get('/dashboard/cloudtransfer', [HomeController::class, 'cloudtransfer'])->name('cloudtransfer')->middleware('auth');

// google routes
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// googleDrive routes

// cloud transfer routes
Route::get('/dashboard/addCloud', [HomeController::class, 'addCloud'])->name('addCloud')->middleware('auth');
Route::get('/dashboard/cloudtransfer', [HomeController::class, 'cloudtransfer'])->name('cloudtransfer')->middleware('auth');
Route::get('/dashboard/uploads', [HomeController::class, 'uploads'])->name('uploads')->middleware('auth');
// Route::get('/dashboard/google_drive', [GoogleDriveController::class, 'index'])->name('google_drive')->middleware('auth');
Route::get('/dashboard/google_drive', [DriveController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('files', [FileController::class, 'store'])->name('files.store');

require __DIR__ . '/auth.php';
