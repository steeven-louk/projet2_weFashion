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


Route::get('/', [produitController::class, 'index'])->name('home');
Route::get('/produit/{id}', [produitController::class, 'show']);

Route::get('/soldes', [produitController::class, 'soldes'])->name('solde');

Route::get('/homme', [produitController::class, 'hommes'])->name('homme');
Route::get('/femme', [produitController::class, 'femmes'])->name('femme');

// Route::view('/produit', 'produit')->name('produit');
