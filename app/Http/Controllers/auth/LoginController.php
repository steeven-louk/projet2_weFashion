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
        //affichage de la page login
        return view('admin.auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function connection(Request $request)
    {
        //recuperation des données des champs
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){
            
            //L'utilisateur est connecté en tant qu'administrateur
            if(Auth::user()->isAdmin){
                //Authentification reussie
                return redirect()->intended('/admin',302);
            }

            //L'utilisateur n'est pas administrateur, on le deconnect
            Auth::logout();

            return redirect()->back()->with('error', 'Email ou mot de passe incorrect.');
        }
        
        //Authentification echouée
        
        return redirect()->route('home')->with([ 'error' => "Vous n'êtes pas autorisé à accéder à cette page."]);
    }

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }


 
}
