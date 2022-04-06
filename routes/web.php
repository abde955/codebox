<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('/', [ProductController::class, 'index']);
Route::get('/home', [ProductController::class, 'index'])->name('home');


//Route::get('/welcome', [App\Http\Controllers\WelcomeController::class, 'index']) -> name('welcome');

// CRUD Product

Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('delete');
Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
Route::patch('/update/{id}', [ProductController::class, 'update'])->name('update');
