<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\produitController;

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\auth\LoginController;

// CLIENT ROUTES

    Route::get('/', [produitController::class, 'index'])->name('home');
    Route::get('/produit/{id}', [produitController::class, 'getProduct']);
    Route::get('/soldes', [produitController::class, 'getSales'])->name('solde');
    Route::get('/homme', [produitController::class, 'getMenProducts'])->name('homme');
    Route::get('/femme', [produitController::class, 'getWomenProducts'])->name('femme');

// CLIENT ROUTES



// AUTHENTIFICATION ROUTES

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login/connection', [LoginController::class, 'connection'])->name('connection');

// AUTHENTIFICATION ROUTES


// ADMIN ROUTES

Route::group(['middleware' => ['admin']], function () {

    Route::get('/admin', [AdminController::class, 'index'])->name('dashboard'); //affiche de la page d'acceuil
    Route::get('/admin/homme', [AdminController::class, 'getMenProduct'])->name('admin.produitsHomme'); //affichage de la page des produit pour homme
    Route::get('/admin/femme', [AdminController::class, 'getWomenProduct'])->name('admin.produitsFemme'); //affichage de la page des produit pour femme

    // CRUD
    Route::get('/admin/ajouter', [AdminController::class, 'getAddPage'])->name('admin.ajouterProduit'); //affichage de la page d'ajout de produit
    Route::get('/admin/deleleProduct/{id}', [AdminController::class, 'deleteProduct'])->name('admin.produitsDelete'); //suppression du produit
    Route::get('/admin/modifierProduit/{id}', [AdminController::class, 'getEditPage'])->name('edit'); //affichage de la page de mise a jour
    Route::post('/admin/create}', [AdminController::class, 'addProduct'])->name('addProduct'); //fonction d'ajout de produit
    Route::post('/admin/updateProduit/{id}', [AdminController::class, 'updateProduct'])->name('update'); //mise a jour du produit
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    // CRUD

});

// CLIENT ROUTES
