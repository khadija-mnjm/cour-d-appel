<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Dossier;
use Illuminate\Http\Request;
use App\Models\Avocat;
use App\Models\benificier;

use App\Models\utilisateur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Attempt to authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'login' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        $user = Utilisateur::where('login', $credentials['login'])->first();

        if (!$user) {
            return redirect()->back()->withErrors(['login' => 'Invalid login credentials'])->withInput($request->only('username'));
        }

        if (Auth::attempt($credentials)) {
            $request->session()->put('user', Auth::user());

            // Redirect based on user type
            if ($user->typeUtilisateur === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->typeUtilisateur === 'utilisateur') {
                return redirect()->route('utilisateur.dashboard');
            } elseif ($user->typeUtilisateur === 'resElectrique') {
                return redirect()->route('resElectrique.dashbord1'); // Replace with your ResELectrique dashboard route
            }
        }

        return redirect()->back()->withErrors(['login' => 'Invalid login credentials'])->withInput($request->only('username'));
    }

    public function dashboard()
{
    $nombreTotalDossiers = Dossier::count();
    $pourcentageDossiers = ($nombreTotalDossiers > 0) ? ($nombreTotalDossiers / 800) * 100 : 0;
    $annees = DB::table('dossiers')->select(DB::raw('YEAR(dateDossier) as annee'))->distinct()->get();
    $totalPrixParAnnee = null;
    $dossiers = Dossier::all();
    $avocats = Avocat::all();
    $totalAvocats = Avocat::count();
    $totalDossiersValides = Dossier::where('validate', 'oui')->count();
    $totalDossiersNonValides = Dossier::where('validate', 'non')->count();
    $targetYear = date('Y');
    $totalBeneficiaries = benificier::count(); // Corrected model name
    $totalAmountForYear = Dossier::whereYear('dateDossier', $targetYear)->sum('prix');
    $pourcentageBeneficiaires = ($nombreTotalDossiers > 0) ? ($totalBeneficiaries / $nombreTotalDossiers) * 100 : 0;
    $totalAmount = Dossier::sum('prix');
    $dossiersThisMonth = Dossier::whereMonth('dateDossier', now()->month)->count();
    $dossiers2000 = Dossier::where('prix', 2000)->get();
    $dossiers3000 = Dossier::where('prix', 3000)->get();
    $dossiers2500 = Dossier::where('prix', 2500)->get();
    $dossiers3500 = Dossier::where('prix', 3500)->get();

    // Get the counts for customers (beneficiaries)
    $totalBeneficiaries = benificier::count(); // Corrected model name

    // Get the counts for avocats
    $totalAvocats = Avocat::count();

    // Get the counts for sales (dossiers)
    $totalSales = Dossier::count();
    $dossiersToday = Dossier::whereDate('dateDossier', now())->count();

    $dossiersCount = Dossier::count();
    $avocatsCount = Avocat::count();
    $beneficiairesCount = benificier::count(); // Corrected model name

    $dossiersThisYear = Dossier::whereYear('dateDossier', now()->year)->count();

    $data = [
        ['value' => $totalBeneficiaries, 'name' => 'Customers'],
        ['value' => $totalSales, 'name' => 'Sales'],
        ['value' => $totalAvocats, 'name' => 'Avocats'],
    ];

    return view('includes.main', [
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
        'dossiersThisMonth' => $dossiersThisMonth,
        'dossiersToday' => $dossiersToday, // Add this line
        'dossiersThisYear' => $dossiersThisYear,
        'dossiers2000' => $dossiers2000,
        'dossiers3000' => $dossiers3000,
        'dossiers2500' => $dossiers2500,
        'dossiers3500' => $dossiers3500,
        'dossiersCount' => $dossiersCount,
        'avocatsCount' => $avocatsCount,
        'beneficiairesCount' => $beneficiairesCount,
    ]);
}


public function profile()
{
    $user = auth()->user();

    if ($user->typeUtilisateur === 'admin') {
        return view('includes.profile');
    } elseif ($user->typeUtilisateur === 'resElectrique') {
        return view('Electrique.profile1');
    }
    return view('includes.profile');
}

    public function logout()
    {
        Session::forget('user');
        return redirect()->route('login1');
    }

    public function editProfile()
    {
        $user = auth()->user();
        if ($user->typeUtilisateur === 'admin') {
            return view('includes.edit-profile', ['user' => $user]);
        } elseif ($user->typeUtilisateur === 'Electriciter') {
            return view('Electrique.edit-profile', ['user' => $user]);
        }
        return view('includes.edit-profile', ['user' => $user]);
    }
    public function editProfile1()
    {
        $user = auth()->user();
        return view('Electrique.edit-profile', ['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'fullName' => 'required',
            'company' => 'required',
            'job' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable',
            
        ]);
        $user = auth()->user();
        $user->nom = $request->input('fullName');
        $user->prenom = $request->input('company');
        $user->typeUtilisateur = $request->input('job');
        $user->login = $request->input('email');
        if ($request->filled('phone')) {
            $user->password = bcrypt($request->input('phone'));
        }

        $user->update();
        $request->session()->put('user', $user);
        return redirect()->route('profile')->with('success', 'Profil mis à jour avec succès');
    }
}
