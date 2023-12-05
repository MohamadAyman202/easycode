<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ContactusController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\DeveloperController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource("brands", BrandController::class);
    Route::resource('portfolio', PortfolioController::class);
    Route::resource('developer', DeveloperController::class);
    Route::resource('contact_us', ContactusController::class);
    Route::resource('setting', SettingController::class);
});

require __DIR__ . '/auth.php';
