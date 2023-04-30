<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\produit;
use App\Models\Produit_Tailles;
use App\Models\Tailles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        
        $data = produit::paginate(15)->all();//recuperation de tout les produits de la base de donnée
        $getWomenProductCount = produit::where('category_id', 1)->count();//recuperation du nombre de produit pour femme
        $getMenProductCount = produit::where('category_id', 2)->count();//recuperation du nombre de produit pour homme
        $getProductSoldCount = produit::where('state', 'en solde')->count();//recuperation du nombre de produit en solde

        return view('admin.dashboard', compact('data', 'getWomenProductCount', 'getMenProductCount', 'getProductSoldCount'));
    }

    public function getMenProduct()
    {
        //recuperation des produits de la categories homme
        $data = produit::where('category_id', 2)->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.produitsHomme', compact('data'));
    }

    public function getWomenProduct()
    {
        //recuperation des produits de la categories femme
        $data = produit::where('category_id', 1)->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.produitsFemme', compact('data'));
    }

    public function getAddPage()
    {
        //recuperation des tailles et categoris
        $size = Tailles::all();
        $categories = Category::all();

        return view('admin.ajouterProduit', ['taille' => $size, 'categorie' => $categories]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addProduct(Request $request)
    { //nom add product

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:10',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tailles' => 'required|array',
            'tailles.*' => 'integer|exists:tailles,id',
        ]);

        //verification des erreur de validation
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/assets/images');
        $image->move($destinationPath, $imageName);
        
        // Création du produit
        $data = new produit;

        $data->name = $request->name;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->category_id = $request->categorie;
        $data->state = $request->state;
        $data->image = $imageName;
        $data->status = $request->status;
        $data->reference = $request->reference;

        $productSizes = [];

        foreach ($request->tailles as $sizeId) {
            $produitSizes[] = ['produit_id' => $data->id, 'tailles_id' => $sizeId];
            Produit_Tailles::insert($productSizes); // Ajout des tailles sélectionnées au produit
        }

        $data->save(); //sauvegarde du produit

        // Redirection vers la page de détails du produit
        return redirect()->back()->with('message', 'le produit a été ajouter avec success');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEditPage($id)
    {

        $product = produit::findOrFail($id); //recuperation d'un seul produit
        $size = Tailles::all(); //recuperation de toute les tailles
        $categories = Category::all(); //recuperation de toutes les categories
        return view('admin.modifierProduit', ['Produit' => $product, 'taille' => $size, 'categorie' => $categories]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(Request $request, $id)
    {
        //recuperation du produit
        $produit = Produit::findOrFail($id);

        //methode de validation
        $request->validate([
            'name' => 'required|string|min:5|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'reference' => 'required|string|size:16|unique:produits,reference,' . $produit->id,
        ]);

        //verifier si l'image existe
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/assets/images');
            $image->move($destinationPath, $imageName);
            $produit->image = $imageName;
        }

        $produit->name = $request->name;
        $produit->description = $request->description;
        $produit->price = $request->price;
        $produit->category_id = $request->categorie;
        $produit->taille_id = $request->taille;
        $produit->state = $request->state;
        $produit->status = $request->status;
        $produit->reference = $request->reference;

        $produit->updated_at = now(); // On met à jour la date de mise à jour

        $produit->save();

        return redirect()->route('dashboard')->with('success', 'Produit modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProduct($id)
    {
        //recuperation puis suppression du produit
        $getProduct = produit::findOrFail($id);

        //verifier si l'image existe puis la supprimer
        if(file_exists(public_path('/assets/images/'.$getProduct->image))){
            unlink(public_path('/assets/images/'.$getProduct->image));
        }

        //verifier si le produit existe
        if (!$getProduct) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        $getProduct->delete();
        return redirect()->back()->with('message', 'produit supprimer avec success');
    }
}
