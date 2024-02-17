<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Moyenne;
use App\Models\compteur;
use App\Models\tribunale;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\notificationsMail;
use Illuminate\Support\Facades\DB; // N'oubliez pas d'importer la classe DB

class MoyenneController extends Controller
{
    public function calculer(Request $request)
    {
        $tribunaux = tribunale::all();
        $typecmpts = compteur::all();

        $typecmpts = $typecmpts->unique('type');

        
        $dateDebut = $request->input('date_debut');
        $dateFin = $request->input('date_fin');
        $tribunaleId = $request->input('tribunale_id');
        $pourcentage = $request->input('pourcentage');
        $moyenne = compteur::whereBetween('date', [$dateDebut, $dateFin])
            ->where('tribunale_id', $tribunaleId)
            ->avg('valeur');

        return view('Electrique.calculConsommation', compact('tribunaux', 'moyenne','typecmpts'));
    }
    
    public function methode2(Request $request)
    {
        $request->validate([
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'pourcentage' => 'required|numeric',
            'tribunale_id' => 'required|exists:tribunales,id',
            'valeur_saisie' => 'required|numeric',
        ]);
    
        $dateDebut = $request->input('date_debut');
        $dateFin = $request->input('date_fin');
        $tribunaleId = $request->input('tribunale_id');
        $pourcentage = $request->input('pourcentage');
    
        $moyenne = compteur::whereBetween('date', [$dateDebut, $dateFin])
            ->where('tribunale_id', $tribunaleId)
            ->groupBy('tribunale_id')
            ->avg('valeur');
    
        $result = compteur::whereBetween('date', [$dateDebut, $dateFin])
            ->where('tribunale_id', $tribunaleId)
            ->groupBy('tribunale_id')
            ->select(DB::raw('count(*) as count'), DB::raw('sum(valeur) as sum'))
            ->first();
    
        $count = $result->count;
        $sum = $result->sum;
    
        $seuilDetection = $moyenne + ($moyenne * $pourcentage / 100);
        $valeurSaisie = $request->input('valeur_saisie');
    
        $etat = ($valeurSaisie > $seuilDetection) ? 1 : 0;
        $situation = ($etat) ? 'Fuite détectée ! La valeur saisie est anormalement élevée.' : 'Consommation normale';

        $moyennes = Moyenne::create([
            'date_debut' => $dateDebut,
            'date_fin' => $dateFin,
            'pourcentage' => $pourcentage,
            'tribunale_id' => $tribunaleId,
            'valeur' => $valeurSaisie,
            'etat' => $etat,
        ]);

        $this->checkMoyenne($moyennes);
       
        $existingMoyennes = Session::get('moyennes', []);
        
        $existingMoyennes[] = [
            'id' => $moyennes->id,
            'moyenne' => $moyenne,
            'count' => $count,
            'sum' => $sum,
            'seuilDetection' => $seuilDetection,
            'valeurSaisie' => $valeurSaisie,
            'situation' => $situation,
        ];
        
        Session::put('moyennes', $existingMoyennes);
    
        return view('Electrique.situations', compact('moyenne', 'count', 'sum', 'seuilDetection', 'valeurSaisie', 'situation'));
    }

    public function getNotificationsCount()
    {
        $notifications = Session::get('notifications', []);
    
        return count($notifications);
    }

    protected function checkMoyenne($moyennes)
    {
        if ($moyennes->etat == 1) {
            $this->addNotification('danger', 'La valeur ' . $moyennes->date . ' : détection de fuite');
        } elseif ($moyennes->etat == 0) {
            $this->addNotification('info', 'La valeur ' . $moyennes->date . ' : consommation normale');
        }
    }

    protected function addNotification($type, $message)
    {
        $notifications = Session::get('notifications', []);

        $notifications[] = [
            'type' => $type,
            'message' => $message,
        ];

        Session::put('notifications', $notifications);
    }

    public function index(Request $request)
    {
        $request->validate([
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
        ]);
        $date_debut = $request->input('date_debut');
        $date_fin = $request->input('date_fin');
        $moyenne = compteur::whereBetween('date', [$date_debut, $date_fin])->avg('valeur');
    
        $tribunaux = tribunale::all();
        return view('Electrique.calculConsommation', ['tribunaux' => $tribunaux, 'moyenne' => $moyenne]);
    }
    
    private function getAllYears()
    {
        $allDates = DB::table('compteurs')->pluck('date');
        $allYears = [];
    
        foreach ($allDates as $date) {
            $year = \Carbon\Carbon::parse($date)->year;
    
            if (!in_array($year, $allYears)) {
                $allYears[] = $year;
            }
        }
    
        return $allYears;
    }

    private function getPourcentage($mois)
    {
        // Définir le pourcentage en fonction du mois
        return in_array($mois, [1, 2, 6, 7, 8, 12]) ? 30 : 10;
    }
    

    public function suiviConsommationManuelle(Request $request)
    {
        $validatedData = $request->validate([
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date|after_or_equal:dateDebut',
        ]);

        $dateDebut = $validatedData['dateDebut'];
        $dateFin = $validatedData['dateFin'];
        $compteurs = compteur::whereBetween('date', [$dateDebut, $dateFin])->get();

        $moyenne = $compteurs->avg('valeur');
        $pourcentage = 0.1; 
        $fuites = $compteurs->filter(function ($compteur) use ($moyenne, $pourcentage) {
            return $compteur->valeur > ($moyenne + $moyenne * $pourcentage);
        });

        return view('Electrique.calculConsommation', ['compteurs' => $compteurs, 'fuites' => $fuites]);
    }
    public function sendEmail()
    {
        $to = 'khadijamjm@gmail.com';
        $subject = 'Fuite détectée !';
        $message = 'Une fuite a été détectée. La valeur saisie est anormalement élevée.';
        $mail = new notificationsMail($subject, $message);
        Mail::to($to)->send($mail);
        if (count(Mail::failures()) > 0) {
            return redirect()->back()->with('email_sent', false);
        }
    
        return redirect()->back()->with('email_sent', true);
    }
    public function list(){
        $moyennes = Moyenne::with('tribunale','compteur')->get();
        return view('Electrique.listmoyenne',['moyennes' => $moyennes,
       ]);
    }


    public function search(Request $request)
{
    $searchTerm = $request->input('search');
  
    $moyennes = Moyenne::where('date', 'like', '%' . $searchTerm . '%')
        ->orWhereHas('tribunale', function ($query) use ($searchTerm) {
            $query->where('nomT', 'like', '%' . $searchTerm . '%');
        })
        ->orWhere('date_fin', 'like', '%' . $searchTerm . '%')
        ->orWhere('date_debut', 'like', '%' . $searchTerm . '%')
        ->orWhere('etat', 'like', '%' . $searchTerm . '%')
        ->get();

    return view('Electrique.listmoyenne', ['moyennes' => $moyennes]);
}

public function statistiquesAnnuelles()
    {
        $anneeActuelle = Carbon::now()->year;

        $nombreTotalMoyennes = Moyenne::count();
        $nombreTotalTribunaux = Tribunale::count();
        $nombreCompteursEau = Compteur::where('type', 'eau')->count();

        $nombreCompteursElectricite = Compteur::where('type', 'electricite')->count();

        $nombreFuitesAnneeActuelle =  Moyenne::where('etat', 1)->count();
        $nombreConsommationsNormalesAnneeActuelle =  Moyenne::where('etat', 0)->count();

        return view('Electrique.Statistique', compact('nombreTotalMoyennes', 'anneeActuelle', 'nombreCompteursEau','nombreTotalTribunaux', 'nombreCompteursElectricite', 'nombreFuitesAnneeActuelle', 'nombreConsommationsNormalesAnneeActuelle'));

    }

    public function moyenneParMois(Request $request)
    {
        $typecmpts = compteur::all();
        $typecmpts = $typecmpts->unique('type');

        $moyennes = [];

        foreach ($typecmpts as $type) {
            $moyennes[$type->type] = DB::table('moyennes')
                ->join('compteurs', 'moyennes.compteur_id', '=', 'compteurs.id')
                ->where('compteurs.type', $type->type)
                ->select(
                    DB::raw('MONTH(date_debut) as mois'),
                    DB::raw('YEAR(date_debut) as annee'),
                    DB::raw('AVG(valeur) as moyenne_consommation')
                )
                ->groupBy(DB::raw('MONTH(date_debut)'), DB::raw('YEAR(date_debut)'))
                ->get();
        }

        return view('Electrique.moyenneParMois', compact('moyennes', 'typecmpts'));
    }
}
