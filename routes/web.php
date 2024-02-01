<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Books\NewBookController;
use App\Http\Controllers\Books\BookPageController;

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

Route::get('/welcome', [HomeController::class, 'welcome'])->name('welcome');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profiles.profile_edit');
Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/libros/nuevo', [NewBookController::class, 'showForm'])->name('libros.nuevo');
Route::get('/books/{id}', [BookPageController::class, 'show'])->name('books.show');
Route::get('/libros', [LibroController::class, 'listarLibros'])->name('books.BooksPage');

Route::view('/libros/nuevo', 'books.New_Book')->name('libros.nuevo');
Route::get('/newBook', [NewBookController::class, 'showForm'])->name('newBook');
Route::post('/books/store', [NewBookController::class, 'bookStore'])->name('books.store');

