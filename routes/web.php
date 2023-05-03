<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BuyController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('search', [BookController::class, 'show'])->name('searchBook');
Route::get('cart-book', [BuyController::class, 'show'])->name('cartBook');



//Admin routes
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('add-book', [BookController::class, 'create'])->name('addBook');
    Route::post('added-book', [BookController::class, 'store'])->name('addedBook');
    Route::get('edit/{id}', [BookController::class, 'edit'])->name('editBook');
    Route::put('edit/{id}', [BookController::class, 'update'])->name('updateBook');
    Route::get('delete-book/{id}', [BookController::class, 'destroy'])->name('deleteBook');
    Route::get('delete-cart/{id}', [BuyController::class, 'destroy'])->name('deleteBuy');
});
Route::middleware(['auth', 'isUser'])->group(function () {
    Route::get('buy-book/{id}', [BuyController::class, 'create'])->name('buyBook');
    Route::put('buy-book/{id}', [BuyController::class, 'store'])->name('boughtBook');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
