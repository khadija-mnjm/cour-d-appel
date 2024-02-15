<?php

namespace App\Http\Controllers;

use App\Models\bureau;
use Illuminate\Http\Request;
use App\Models\Utilisateur;

class BureauController extends Controller
{
    public function message(){
        $utilisateurs = Utilisateur::all();
        return view('Message',compact('utilisateurs'));
    }

}
