<?php

namespace App\Http\Controllers\admin;

use App\Models\produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('admin.dashboard', compact(('data')));
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function delete($id)
    {
        //
        $getProduct = produit::find($id)->get();
        if($getProduct){
            $getProduct->delete();
            return redirect()->back();
        }
    }
}
