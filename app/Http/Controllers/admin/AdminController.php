<?php

namespace App\Http\Controllers\admin;

use App\Models\produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Produit_Tailles;
use App\Models\Tailles;
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
        $data = produit::paginate(15)->all();
        $getWomenProductCount = produit::where('category_id',1)->count();
        $getMenProductCount = produit::where('category_id',2)->count();
        $getProdoductSoldCount = produit::where('state','en solde')->count();
        return view('admin.dashboard', compact('data','getWomenProductCount','getMenProductCount','getProdoductSoldCount'));
    }

    
    public function getHommesProduct()
    {
        $data = produit::where('category_id',2)->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.produitsHomme', compact('data'));
    }

    public function getFemmesProduct()
    {
        $data = produit::where('category_id', 1)->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.produitsFemme', compact('data'));
    }

    public function ajouterProduit()
    {
        $size = Tailles::all();
        $categories = Category::all();
        
        return view('admin.ajouterProduit', ['taille'=>$size,'categorie'=>$categories]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {//nom add product
   
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            // 'categorie_id' => 'required',
            'price' => 'required|numeric|min:10',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tailles' => 'required|array',
            'tailles.*' => 'integer|exists:tailles,id'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        $data = new produit;

        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/assets/images');
        $image->move($destinationPath, $imageName);

        // Création du produit
 

    // Ajout des tailles sélectionnées au produit

    // Redirection vers la page de détails du produit

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
        Produit_Tailles::insert($productSizes);
    }

        $data->save();
        return redirect()->back()->with('message','le produit a été ajouter avec success');
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
            'name' => 'required|string|min:5|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'reference' => 'required|string|size:16|unique:produits,reference,'.$produit->id,
        ]);

       if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/assets/images');
            $image->move($destinationPath, $imageName);
            $produit->image= $imageName;
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
