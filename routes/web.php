<?php

use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\HomeController;
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
Route::get('/', [HomeController::class, 'page'])->middleware('guest');
/*
|--------------------------------------------------------------------------
| PUBLIC (tanpa login)
|--------------------------------------------------------------------------
*/
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}/read', [BookController::class, 'read']);

// Route::get('/dashboard', fn() => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/activities', [ActivitiesController::class, 'index'])
    ->middleware('auth')
    ->name('Activities');

// Route::get('/collection', [CollectionController::class, 'page'])->name('collection');
Route::get('/collection', [CollectionController::class, 'index'])->name('collection');
/*
|--------------------------------------------------------------------------
| AUTH USER
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/home', [HomeController::class, 'page'])->name('Home');

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

        Route::post('/borrowings/{borrowing}/reject', [BorrowingController::class, 'reject'])
            ->name('borrowings.reject');

        Route::post('/borrowings/{borrowing}/borrow', [BorrowingController::class, 'borrow'])
            ->name('borrowings.borrow');

        Route::post('/borrowings/{borrowing}/return', [BorrowingController::class, 'return'])
            ->name('borrowings.return');

        Route::delete('/borrowings/{borrowing}', [BorrowingController::class, 'destroy'])
            ->name('borrowings.destroy');

        Route::resource('/books', BookController::class)
            ->except(['show']);
    });

require __DIR__ . '/auth.php';
