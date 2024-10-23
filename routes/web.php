<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('users', [RegisteredUserController::class, 'index'])->name('users.index');
    Route::get('users/create', [RegisteredUserController::class, 'create'])->name('users.create');
    Route::post('users/create', [RegisteredUserController::class, 'store'])->name('users.store');
    Route::get('users/{user}/edit', [RegisteredUserController::class, 'edit'])->name('users.edit');
    Route::get('users/{user}/restore', [RegisteredUserController::class, 'restore'])->name('users.restore');
    Route::put('users/{user}', [RegisteredUserController::class, 'update'])->name('users.update');
    Route::delete('users', [RegisteredUserController::class, 'destroy'])->name('users.delete');

    Route::get('tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('tickets/create', [TicketController::class, 'store'])->name('tickets.create');
    Route::get('tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
    Route::get('tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('tickets.edit');
    Route::put('tickets/{ticket}', [TicketController::class, 'update'])->name('tickets.update');
    Route::delete('tickets', [TicketController::class, 'destroy'])->name('tickets.delete');
    Route::get('tickets/{ticket}/{user_id}/assign', [TicketController::class, 'assign'])->name('tickets.assign');
    Route::get('tickets/{ticket}/{user_id}/resolve', [TicketController::class, 'resolve'])->name('tickets.resolve');
    Route::get('tickets/{ticket}/{user_id}/close', [TicketController::class, 'close'])->name('tickets.close');

    Route::post('comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('comments', [CommentController::class, 'destroy'])->name('comments.destroy');
});

require __DIR__ . '/auth.php';
