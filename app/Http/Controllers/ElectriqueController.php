<?php

namespace App\Http\Controllers;

use App\Models\electrique;
use Illuminate\Http\Request;
use App\Models\tribunale;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\Moyenne;
use App\Models\compteur;
use Illuminate\Support\Facades\Mail;
use App\Mail\notificationsMail;
class ElectriqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anneeActuelle = Carbon::now()->year;
        $nombreTotalMoyennes = Moyenne::count();
        $nombreTotalTribunaux = Tribunale::count();
        $nombreCompteursEau = Compteur::where('type', 'eau')->count();

        $nombreCompteursElectricite = Compteur::where('type', 'electricite')->count();

        $nombreFuitesAnneeActuelle =  Moyenne::where('etat', 1)->count();
        $nombreConsommationsNormalesAnneeActuelle =  Moyenne::where('etat', 0)->count();

        return view('Electrique.dash1', compact('nombreTotalMoyennes', 'anneeActuelle', 'nombreCompteursEau','nombreTotalTribunaux', 'nombreCompteursElectricite', 'nombreFuitesAnneeActuelle', 'nombreConsommationsNormalesAnneeActuelle'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 

 
    public function store(Request $request)
    {
        
        $request->validate([
            'refCompteur' => 'required|string',
            'dateCompteur' => 'required|date',
            'tribunal' => 'required|exists:tribunales,id',
            'valeur' => 'required|numeric',
            'etat' => 'required|string',
            'etatGeneral' => 'required|in:oui,non',
        ]);

        
        $electrique = new Electrique([
            'refCompteur' => $request->input('refCompteur'),
            'dateCompteur' => $request->input('dateCompteur'),
            'tribunal_id' => $request->input('tribunal'), 
            'valeur' => $request->input('valeur'),
            'etat' => $request->input('etat'),
            'etatGeneral' => $request->input('etatGeneral'),
        ]);


        $electrique->save();

        
        return redirect()->route('nom_de_la_route_vers_vue_appropriee');
    }
    
}
