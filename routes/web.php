<?php

use App\Livewire\Pages\Dashboard;
use App\Livewire\Pages\Fitur;
use App\Livewire\Pages\Rekening;
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

Route::view('/', 'welcome');


Route::middleware('auth')->group(function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('rekening', Rekening::class)->name('rekening');
    Route::get('fitur', Fitur::class)->name('fitur');
    Route::view('profile', 'profile')->name('profile');
});

require __DIR__ . '/auth.php';
