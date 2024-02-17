<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Dossier; 
use Illuminate\Http\Request;
use App\Models\Avocat;
use App\Models\benificier;
class StatistiqueController extends Controller
{
    public function index()
    {
        $nombreTotalDossiers = Dossier::count();
        $pourcentageDossiers = ($nombreTotalDossiers / 800) * 100;
        $annees = DB::table('dossiers')->select(DB::raw('YEAR(dateDossier) as annee'))->distinct()->get();
        $totalPrixParAnnee = null; 
        $dossiers = Dossier::all();
        $avocats = Avocat::all();
        $totalAvocats = Avocat::count(); 
        $targetYear = date('Y');

        $totalDossiersValides = Dossier::where('validate', 'oui')->count();
        $totalDossiersNonValides = Dossier::where('validate', 'non')->count();

        $totalBeneficiaries = Benificier::count();
        $totalAmountForYear = Dossier::whereYear('dateDossier', $targetYear)->sum('prix');
        $pourcentageBeneficiaires = ($totalBeneficiaries / $nombreTotalDossiers) * 100;
        $totalAmount = Dossier::sum('prix');
        return view('statistique.index', [
            'nombreTotalDossiers' => $nombreTotalDossiers,
            'pourcentageDossiers' => $pourcentageDossiers,
            'annees' => $annees,
            'totalPrixParAnnee' => $totalPrixParAnnee,
            'dossiers' => $dossiers,
            'totalAmount' => $totalAmount,
            'totalAmountForYear' => $totalAmountForYear,
            'targetYear' => $targetYear,
            'avocats' => $avocats,
            'totalAvocats' => $totalAvocats,
            'totalBeneficiaries' => $totalBeneficiaries,
            'pourcentageBeneficiaires' => $pourcentageBeneficiaires,
            'totalDossiersValides' => $totalDossiersValides,
            'totalDossiersNonValides' => $totalDossiersNonValides,
        ]);

    }
    public function plus(){
        $dossiers = dossier::with('avocat','tribunale')->get();
        $targetYear = date('Y');
        return view('statistique.plus',['dossiers' => $dossiers,
       ]);
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
    
        $dossiers = Dossier::where('numeroD', 'like', '%' . $searchTerm . '%')
            ->orWhereHas('benificier', function ($query) use ($searchTerm) {
                $query->where('nomB', 'like', '%' . $searchTerm . '%');
            })
            ->orWhereHas('avocat', function ($query) use ($searchTerm) {
                $query->where('nomV', 'like', '%' . $searchTerm . '%');
            })
            ->orWhere('dateDossier', 'like', '%' . $searchTerm . '%')
            ->orWhere('prix', 'like', '%' . $searchTerm . '%')
            ->get();
    
        return view('statistique.plus', ['dossiers' => $dossiers]);
    }
   
}
?>