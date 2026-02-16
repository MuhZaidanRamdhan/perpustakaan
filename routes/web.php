<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;

/*
|--------------------------------------------------------------------------
| Redirect root
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => view('welcome'));
/*
|--------------------------------------------------------------------------
| PUBLIC (tanpa login)
|--------------------------------------------------------------------------
*/
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}/read', [BookController::class, 'read']);

Route::get('/dashboard', fn() => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| AUTH USER
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::post('/borrow/{book}', [BorrowingController::class, 'store'])
        ->name('borrow.store');

    Route::get('/my-borrowings', [BorrowingController::class, 'myBorrowings'])->name('borrowings.my');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/borrowings', [BorrowingController::class, 'index'])
            ->name('borrowings.index');

        Route::post('/borrowings/{borrowing}/approve', [BorrowingController::class, 'approve'])
            ->name('borrowings.approve');

        Route::post('/borrowings/{borrowing}/return', [BorrowingController::class, 'return'])
            ->name('borrowings.return');

        Route::delete('/borrowings/{borrowing}', [BorrowingController::class, 'destroy'])
            ->name('borrowings.destroy');


        Route::resource('/books', BookController::class)
            ->except(['show']);
    });

require __DIR__ . '/auth.php';
