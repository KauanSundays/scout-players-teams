<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PositionController;


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
    return view('draft');
});

Route::get('/dashboard', [PositionController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view('/draft', 'draft')->name('draft');


Route::get('/register/faculdade', [RegisteredUserController::class, 'createFaculdade'])->name('register.faculdade');
Route::get('/register/avaliador', [RegisteredUserController::class, 'createAvaliador'])->name('register.avaliador');
Route::post('/update-position', [PositionController::class, 'updatePosition'])->name('update_position');

require __DIR__ . '/auth.php';
