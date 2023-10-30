<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UploadImageController;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('events')
->middleware('auth')
->controller(EventController::class)
->name('events.')
->group(function(){
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}', 'update')->name('update');
    Route::post('/{id}/destory', 'destory')->name('destory');
});

Route::post('/upload-image', [EventController::class, 'uploadimage'])
    ->name('image.upload');

Route::prefix('events')
->controller(EventController::class)
->name('events.')
->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/{id}', 'show')->name('show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
