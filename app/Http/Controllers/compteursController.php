<?php

namespace App\Http\Controllers;

use App\Models\tribunale;
use App\Models\compteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class compteursController extends Controller
{
    public function ajouter()
    {
        $tribunaux = tribunale::all();
        return view('Electrique.ajouter', ['tribunaux' => $tribunaux]);
    }

    public function compteurslist()
    {
        $compteurs = compteur::all();
        return view('Electrique.list', ['compteurs' => $compteurs]);
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'refCompteur' => 'nullable',
            'tribunale_id' => 'required',
            'date' => 'required|date',
            'type' => 'required|in:eau,electrique',
            'valeur' => 'required|numeric',
        ]);

        // Create a new Compteur instance and populate it with validated data
        $compteur = new Compteur();
        $compteur->refCompteur = $validatedData['refCompteur'];
        $compteur->tribunale_id = $validatedData['tribunale_id'];
        $compteur->date = $validatedData['date'];
        $compteur->type = $validatedData['type'];
        $compteur->valeur = $validatedData['valeur'];

        // Calculate the month from the date and get the expected value for that month
        $numeroMois = \Carbon\Carbon::parse($compteur->date)->month;
        $valeurAttendue = $this->getIntervaleValeurMois($numeroMois);

        // Calculate consumption and check for leaks
        $consommation = $compteur->valeur - $valeurAttendue;
        $seuilFuite = 50;
        $fuiteDetectee = $this->detecterFuite($consommation, $seuilFuite);

        // Update the Compteur instance with leak status and save to the database
        $compteur->etat = $fuiteDetectee ? 1 : 0;
        $compteur->save();
        $compteurs = compteur::all();
        return view('Electrique.list', ['compteurs' => $compteurs]);
        // Return the view with the calculation results and a success message
        /*return view('Electrique.list', [
            'resultat' => [
                'consommationCalculee' => $consommation,
                'resultat' => $fuiteDetectee ? 'Il y a une fuite détectée !' : 'Utilisation normale.',
            ],
            'notification' => $fuiteDetectee ? 'danger' : 'success',
        ])->with('success', 'Compteur ajouté avec succès');*/
    }




    public function edit($id)
    {
        $tribunaux = tribunale::all();
        $compteur = Compteur::findOrFail($id);

        return view('Electrique.edit', ['tribunaux' => $tribunaux, 'compteur' => $compteur]);
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'refCompteur' => 'nullable',
            'tribunale_id' => 'required',
            'date' => 'required|date',
            'type' => 'required|in:eau,electrique',
            'valeur' => 'required|numeric',
        ]);
    
        // Find the Compteur instance by its ID
        $compteur = Compteur::findOrFail($id);
    
        // Update the Compteur instance with the validated data
        $compteur->refCompteur = $validatedData['refCompteur'];
        $compteur->tribunale_id = $validatedData['tribunale_id'];
        $compteur->date = $validatedData['date'];
        $compteur->type = $validatedData['type'];
        $compteur->valeur = $validatedData['valeur'];
    
        // Perform additional logic if needed (e.g., calculating consumption, detecting leaks)
    
        // Save the updated Compteur instance to the database
        $compteur->save();
    
        // Redirect back to the list of counters with a success message
        return redirect()->route('compteurslist')->with('success', 'Compteur mis à jour avec succès');
    }
    

    public function destroy($id)
    {
        $compteur = Compteur::findOrFail($id);
        $compteur->delete();

        return redirect()->route('compteurslist')->with('success', 'Compteur supprimé avec succès');
    }

    public function index()
    {
        return view('Electrique.calculConsommation');
    }

    

    public function calculConsommation(Request $request)
    {
        
        $nouvelleValeur = $request->input('nouvelleValeur');
        $dateCompteur = $request->input('date');

        $dateCarbon = \Carbon\Carbon::parse($dateCompteur);
        $moisCompteur = $dateCarbon->month;

    
        $intervaleMois = $this->getIntervaleValeurMois($moisCompteur);

        $consommation = $nouvelleValeur - $intervaleMois;

        
        $seuilFuite = 50;
        $fuiteDetectee = $this->detecterFuite($consommation, $seuilFuite);

        return view('Electrique.calculConsommation', [
            'resultat' => [
                'consommationCalculee' => $consommation,
                'resultat' => $fuiteDetectee ? 'Il y a une fuite détectée !' : 'Utilisation normale.',
            ],
            'notification' => $fuiteDetectee ? 'danger' : 'success',
        ]);
    }


    private function getIntervaleValeurMois($mois)
    {
        $intervaleValeurmois = [
            600, 550, 260, 300, 400, 300, 500, 650, 700, 600, 240, 500
        ];

        return $intervaleValeurmois[$mois - 1];
    }

    private function detecterFuite($consommation, $seuil)
    {
        return $consommation > $seuil;
    }

        
      

    private function getAncienneValeurJanvier($tribunale_id)
    {
        
        $ancienneValeur = \DB::table('ancienne_valeur_janviers')
            ->where('tribunale_id', $tribunale_id)
            ->whereMonth('date', 1)
            ->value('valeur');
        return $ancienneValeur;
    }
    
       

    public function calculerMoyenne(Request $request)
    {
        $validatedData = $request->validate([
            'mois' => 'required|numeric|min:1|max:12',
            'pourcentage' => 'required|numeric|in:0.1,0.3',
        ]);
    
        
        $mois = $validatedData['mois'];
        $pourcentage = $validatedData['pourcentage'];
    
        
        $moyenne = $this->calculerMoyennePourMois($mois, $pourcentage);
        return view('Electrique.calculConsommation', [
            'resultat' => [
                'mois' => $mois,
                'pourcentage' => $pourcentage * 100,
                'moyenne' => $moyenne,
            ],
        ]);
    }
    
    private function calculerMoyennePourMois($mois, $pourcentage)
{
    $intervaleValeurMois = $this->getIntervaleValeurMois($mois);
    $moyenne = $intervaleValeurMois * $pourcentage;
    return $moyenne;
}

public function calculerMoyennePourTouteAnnee()
{
    $mois2023 = range(1, 12);
    $resultatsMoyenne = [];

    foreach ($mois2023 as $mois) {
        $pourcentage = 0.1;

        if (in_array($mois, [12, 1, 2, 6, 7, 8])) {
            $pourcentage = 0.3;
        }

        $moyenne = $this->calculerMoyennePourMois($mois, $pourcentage);
        $resultatsMoyenne[$mois] = $moyenne;
    }

    return view('Electrique.resultatsMoyenne', ['resultatsMoyenne' => $resultatsMoyenne]);
}









}
