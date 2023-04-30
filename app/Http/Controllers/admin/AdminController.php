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
        $taille = Tailles::all();
        $categories = Category::all();
        return view('admin.modifierProduit',['Produit'=>$Produit,'taille'=>$taille,'categorie'=>$categories]);
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
        $produit = Produit::findOrFail($id);

     $request->validate([
            'nom' => 'required|string|min:5|max:100',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'reference' => 'required|string|size:16|unique:produits,reference,'.$produit->id,
        ]);

       if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/assets/images');
            $image->move($destinationPath, $imagename);
            $produit->image= $imagename;
        }

        $produit->nom = $request->nom;
        $produit->description = $request->description;
        $produit->prix = $request->prix;
        $produit->categorie_id = $request->categorie;
        $produit->taille_id = $request->taille;
        $produit->etat = $request->etat;
        $produit->statut = $request->statut;
        $produit->reference = $request->reference;
    
        $produit->updated_at = now(); // On met à jour la date de mise à jour

        $produit->save();
     
     return redirect()->route('edit', ['id' => $id])->with('success', 'Produit modifié avec succès.');
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
        $getProduct = produit::findOrFail($id);
        
        if(!$getProduct){
            return response()->json(['error'=>'Product not found'], 404);
        }
        $getProduct->delete();
        return redirect()->back()->with('message', 'produit supprimer avec success');
    }
}
