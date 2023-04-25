<?php

use App\Http\Controllers\produitController;
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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [produitController::class, 'index'])->name('home');
Route::get('/produit/{id}', [produitController::class, 'show']);

Route::view('/soldes', [produitController::class, 'soldes'])->name('solde');
Route::view('/homme', 'categories.homme')->name('homme');
Route::view('/femme', 'categories.femme')->name('femme');

Route::view('/produit', 'produit')->name('produit');
