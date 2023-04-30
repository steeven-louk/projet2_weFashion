<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\produit;
use App\Models\Tailles;
use Illuminate\Http\Request;

class produitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = produit::where('statut', 'publié')->inRandomOrder()->paginate(6);
        return view('home', compact('product'));
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function soldes()
    {
        //
        $soldes = produit::where('etat', 'en solde')->orderBy('created_at', 'desc')->paginate(6);
        return view('soldes', compact('soldes'));
    }

    public function hommes()
    {
        //
        $produitsHomme = produit::where('categorie_id', 2)->orderBy('created_at', 'desc')->paginate(6);
        return view('categories.homme', compact('produitsHomme'));
    }

    public function femmes()
    {
        //
        $produitsFemme = produit::where('categorie_id', 1)->orderBy('created_at', 'desc')->paginate(6);
        return view('categories.femme', compact('produitsFemme'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $product=  produit::findOrFail($id);
       $tailles = Tailles::all();
        if(!$product){
            abort(404);
        }
        return view('produit', ['product' => $product, 'tailles'=> $tailles]);
    }
}
