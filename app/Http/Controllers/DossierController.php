<?php

namespace App\Http\Controllers;

use App\Models\avocat;
use App\Models\dossier;
use Illuminate\Http\Request;

class DossierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listDossiers()
     { 
        $dossiers = dossier::with('avocat','tribunale')->get();
        
        
        return view('dossier.list', ['dossiers' => $dossiers]);    
     }
   
    public function addDossier()
    {
        return view('dossier.add');
    }

    public function store(Request $request)
    {
    // Obtenir le dernier numéro de dossier dans la base de données
    $dernierNumero = Dossier::orderBy('numeroD', 'desc')->value('numeroD');
        
    // Vérifier si le dernier numéro appartient à l'année en cours
   // $anneeEnCours = date('Y');
   // $derniereAnnee = substr($dernierNumero, 0, 4);
    $nouveauNumero = $dernierNumero + 1;
/*
    if ($derniereAnnee == $anneeEnCours) {
        // Incrémenter le numéro de dossier
        $dernierNumero = intval(substr($dernierNumero, 5));
        $nouveauNumero = $anneeEnCours . '-' . str_pad($dernierNumero + 1, 4, '0', STR_PAD_LEFT);
    } else {
        // Commencer une nouvelle séquence de numérotation pour la nouvelle année
        $nouveauNumero = $anneeEnCours . '-0001';
    }*/
   
    // Créer un nouveau dossier avec les données du formulaire
    $dossier = new Dossier();
    $dossier->numeroD = $nouveauNumero;
    $dossier->avocat_id = $request->input('avocat_id');
    $dossier->commission = 'marrakech';
    $dossier->dateDossier = date('Y-m-d');
    $dossier->refJuridique = $request->input('refJuridique');
    $dossier->refDecision = $request->input('refDecision');
    $dossier->tribunale_id = $request->input('tribunale_id');
    $dossier->benificier_id = $request->input('benificier_id');
    $dossier->dateAideJustice = $request->input('dateAideJustice');
    $dossier->prix = $request->input('prix');
    
    $dossier->refPerfermance = ' ';
    $dossier->refEngagement = ' ';
    $dossier->refEditions = ' ';
    $dossier->date_ds_aide_etat= date('Y-m-d');
    $dossier->save();

    $nomAvocat = $request->input('avocat_id');

    $avocat = Avocat::where('nomV', $nomAvocat)->first();

    if ($avocat && $avocat->active === 'oui') {
        $avocat->active = 'non';
        $avocat->save();
    }
    return redirect()->route('list-dossiers');
 }
    public function show(dossier $dossier)
    {
        return view('dossier.show', compact('dossier'));
    }
    public function edit($id)
    {
        $dossier = Dossier::find($id);
        return view('dossier.edit', compact('dossier'));
    } 
    

public function update(Request $request, $id)
{
    
    $dossier = dossier::find($id);
    if (!$dossier->isModified) {
    $dossier->refJuridique = $request->input('refJuridique');
    $dossier->refDecision = $request->input('refDecision');
    $dossier->tribunale_id = $request->input('tribunale_id');
    $dossier->benificier_id = $request->input('benificier_id');
    $dossier->dateAideJustice = $request->input('dateAideJustice');
    $dossier->prix = $request->input('prix');
    $dossier->refPerfermance = $request->input('refPerfermance');
    $dossier->refEngagement = $request->input('refEngagement');
    $dossier->refEditions = $request->input('refEditions');
    $dossier->date_ds_aide_etat= date('Y-m-d');
    $dossier->isModified = true;
        $dossier->save();

        return redirect()->route('list-dossiers')->with('success', 'Dossier updated successfully.');
    } else {
        return redirect()->route('list-dossiers')->with('warning', 'Dossier already modified.');
    }
}

    

    
}