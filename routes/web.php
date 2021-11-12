<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ShareRequestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/keygen', function () {
    Artisan::call('key:generate');
});
Route::view('about', 'about')->name('about');
Route::view('services', 'services')->name('services');
Route::get('actual-offers', [PageController::class, 'actual'])->name('actual-offers');
Route::view('contact-us', 'contact_us')->name('contact-us');
Route::post('contact-request', [ShareRequestController::class, 'newContactRequest'])->name('contact-request');
Route::post('share-request', [ShareRequestController::class, 'newRequest'])->name('share-request');
Route::get('share/{property}', [PageController::class, 'share'])->name('buy-share');
Route::get('prop/{property}', [PageController::class, 'show'])->name('property.show');

Route::get('/all-properties', [PageController::class, 'allProperties'])->name('all-properties');
Route::view('admin-login', 'admin.login')->name('admin.login');
Route::post('login', [AdminController::class, 'login'])->name('login');

Route::middleware('auth.elf')->group(function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin');
    Route::resource('property', PropertyController::class)->except('show');
});
