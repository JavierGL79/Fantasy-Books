<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Books\NewBookController;
use App\Http\Controllers\Books\BookDetailController;
use App\Http\Controllers\Books\EditBookController;
use App\Http\Controllers\Users\UserLoansController;
use App\Http\Controllers\Users\UserListController;
use App\Http\Controllers\Books\PrestamoController;
use App\Http\Controllers\Books\AllLoansController;


use Illuminate\Support\Facades\Mail;
use App\Mail\PruebaMail;

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

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profiles.profile_edit');
Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');


Route::get('/userloans', [UserLoansController::class, 'show'])->name('userloans.show');
Route::get('/allloans', [AllLoansController::class, 'show'])->name('books.AllLoans');
Route::post('/prestamo/{id}/devolver', [UserLoanController::class, 'devolverLibro'])->name('devolver-libro');
Route::post('/prestamo/{id}/ampliar', [UserLoanController::class, 'ampliarPrestamo'])->name('ampliar-prestamo');


Route::get('/books/{id}', [BookDetailController::class, 'showDetail'])->name('books.BookPage');
Route::get('/books/{id}/edit', [EditBookController::class, 'editDetail'])->name('books.EditBook');
Route::patch('/books/{id}//update', [EditBookController::class, 'update'])->name('books.update');
Route::get('/libros/nuevo', [NewBookController::class, 'showForm'])->name('libros.nuevo');
Route::post('/books/store', [NewBookController::class, 'bookStore'])->name('books.store');
Route::delete('/books/{id}', [BookDetailController::class, 'destroy'])->name('books.delete');

Route::post('/prestar-libro/{id}', [PrestamoController::class, 'prestarLibro'])->name('prestar-libro');


Route::get('/usersList', [UserListController::class, 'index'])->name('users.UserList');
Route::delete('/users/{id}', [ProfileController::class, 'destroy'])->name('user.delete');


// routes/web.php

Route::get('/enviar-correo-prueba', function () {
    Mail::to('destinatario@example.com')->send(new PruebaMail());
    
    return redirect()->back()->with('status', 'Correo de prueba enviado correctamente');
})->name('enviar.correo.prueba');
Route::get('/enviar-correo-userCreado')->name('enviar.correo.userCreado');
