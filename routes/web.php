<?php

use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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
Route::get('/', [HomeController::class, 'page'])->name('Home');
/*
|--------------------------------------------------------------------------
| PUBLIC (tanpa login)
|--------------------------------------------------------------------------
*/
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}/read', [BookController::class, 'read']);

// Route::get('/dashboard', fn() => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/peminjaman-buku', [ActivitiesController::class, 'index'])
    ->middleware('auth')
    ->name('Activities');

// Route::get('/collection', [CollectionController::class, 'page'])->name('collection');
Route::get('/koleksi-buku', [CollectionController::class, 'index'])->name('collection');
Route::get('/koleksi-buku/{book}', [CollectionController::class, 'show'])
    ->name('collection.show');

// Route::get('/beranda', [HomeController::class, 'page'])->name('Home');
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

        Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
        Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
        Route::post('/categories', [CategoriesController::class, 'store'])->name('categories.store');
        Route::get('/categories/{category}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
        Route::put('/categories/{category}', [CategoriesController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{category}', [CategoriesController::class, 'destroy'])->name('categories.destroy');

        Route::resource('/users', UserController::class)->names('users');
        Route::patch('/users/{user}/role', [UserController::class, 'updateRole'])
            ->name('users.updateRole');
    });

require __DIR__ . '/auth.php';
