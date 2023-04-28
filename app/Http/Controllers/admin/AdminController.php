<?php

namespace App\Http\Controllers\admin;

use App\Models\produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tailles;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function index()
    {
        $data = produit::paginate(15)->all();
        $getWomenProductCount = produit::where('categorie_id',1)->count();
        $getMenProductCount = produit::where('categorie_id',2)->count();
        $getMenSoldCount = produit::where('etat','en solde')->count();
        // dd($getMenSoldCount);
        return view('admin.dashboard', compact('data','getWomenProductCount','getMenProductCount','getMenSoldCount'));
    }

    
    public function getHommesProduct()
    {
        $data = produit::where('categorie_id',2)->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.produitsHomme', compact('data'));

    }

    public function getFemmesProduct()
    {
        //
        $produitFemme = produit::where('categorie_id', 1)->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.produitsFemme', compact('produitFemme'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
   

        $data = new produit;
        $image = $request->file('image');
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/assets/images');
        $image->move($destinationPath, $imagename);
       

       
           $data->nom = $request->nom;
           $data->description = $request->description;
           $data->prix = $request->prix;
           $data->categorie_id = $request->categorie;
           $data->taille_id = $request->taille;
           $data->etat = $request->etat;
           $data->image = $imagename;
           $data->statut = $request->statut;
           $data->reference = $request->reference;
       
        $data->save();
        return redirect()->back()->with('message','le produit a été ajouter avec success');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajouterProduit()
    {
        $taille = Tailles::all();
        $categories = Category::all();
        
        return view('admin.ajouterProduit', ['taille'=>$taille,'categorie'=>$categories]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Produit = produit::findOrFail($id);

        return view('admin.modifierProduit', compact('Produit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProduct($id)
    {
        //
        $getProduct = produit::find($id);
        
        if(!$getProduct){
            return response()->json(['error'=>'Product not found'], 404);
        }
        $getProduct->delete();
        return redirect()->back()->with('message', 'produit supprimer avec success');
    }
}
