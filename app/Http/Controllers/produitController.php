<?php

namespace App\Http\Controllers;

use App\Models\produit;
use App\Models\Sizes;
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
        //recuperation de tout les produit publier
        $product = produit::where('status', 'publié')->inRandomOrder()->paginate(6);
        return view('home', compact('product'));
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSales()
    {
        //recuperation de tout les produit solder
        $soldes = produit::where('state', 'en solde')->orderBy('created_at', 'desc')->paginate(6);
        return view('soldes', compact('soldes'));
    }


       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMenProducts()
    {
        //recuperation de tout les produit Homme par ordre decroissant
        $menProducts = produit::where('category_id', 2)->orderBy('created_at', 'desc')->paginate(6);
        return view('categories.homme', ['produitsHomme'=> $menProducts]);
    }


           /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getWomenProducts()
    {
        //recuperation de tout les produit Femme par ordre decroissant
        $womenProducts = produit::where('category_id', 1)->orderBy('created_at', 'desc')->paginate(6);
        return view('categories.femme', ['produitsFemme'=> $womenProducts]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\produit  $id
     * @return \Illuminate\Http\Response
     */
    public function getProduct($id)
    {
        //recuperation d'un seul produit
       $product=  produit::findOrFail($id);
       $size = $product->sizes()->get();// recuperation des tailles du produit

       //verifier si le produit existe
        if(!$product){
            abort(404);
        }
        return view('produit', ['product' => $product, 'size'=>$size]);
    }

}
