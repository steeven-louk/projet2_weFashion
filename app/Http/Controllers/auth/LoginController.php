<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function connection(Request $request)
    {
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){
            
            //L'utilisateur est connecté en tant qu'administrateur
            if(Auth::user()->isAdmin){
                //Authentification reussie
                return redirect()->intended('/admin',302);
            }

            //L'utilisateur n'est pas administrateur
            Auth::logout();

            return back()->with([
                'error' => 'You are not authorized to access this page.'
            ]);
        }

        //Authentification echouée

        return redirect()->route('home')->with('error', 'Email ou mot de passe incorrect.');
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

  
 
}
