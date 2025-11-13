<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [\App\Http\Controllers\SiteController::class, 'index'])->name('index');
Route::get('/detail produk', function () {
    return view('customer.produk.show');
});
Route::get('/kategori-produk', function () {
    return view('customer.produk.index');
});
require __DIR__.'/auth.php';

// Route::middleware(['auth', 'verified'])->group(function () {
Route::middleware(['auth'])->group(function () {

    Route::get('profile', [\App\Http\Controllers\SiteController::class, 'profile'])
        ->middleware('password.confirm')
        ->name('profile');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
});