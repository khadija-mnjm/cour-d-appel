<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\DossierController;
use App\Http\Controllers\BenificierController;
use App\Http\Controllers\AvocatController;
use App\Http\Controllers\statistiqueController;
use App\Http\Controllers\ElectriqueController;
use App\Http\Controllers\compteursController;
use App\Http\Controllers\emailNotifications;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\MoyenneController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\BureauController;
use App\Http\Controllers\Bureau2StatistiqueController;


     Route::get('/', [UtilisateurController::class, 'index'])->name('login1');
    Route::post('/login', [UtilisateurController::class, 'login'])->name('login');
    Route::get('/logout', [UtilisateurController::class, 'logout'])->name('logout');



    Route::middleware([ 'loginAuth'])->group(function () {
        
        Route::get('/admin/dashboard', [UtilisateurController::class, 'dashboard'])->name('admin.dashboard');
    
        Route::get('/utilisateur/dashboard', [UtilisateurController::class, 'dashboard'])->name('utilisateur.dashboard');
        Route::get('/Electrique/dashboard', [ElectriqueController::class, 'index'])->name('resElectrique.dashbord1');
    });



// Routes de profil
Route::group(['middleware' => ['loginAuth'], 'prefix' => 'profile'], function () {
    Route::get('/', [UtilisateurController::class, 'profile'])->name('profile');
    Route::get('/edit', [UtilisateurController::class, 'editProfile'])->name('edit-profile');
    Route::get('/edit1', [UtilisateurController::class, 'editProfile1'])->name('edit-profile1');
    Route::post('/update', [UtilisateurController::class, 'updateProfile'])->name('update-profile');
    Route::post('/update1', [UtilisateurController::class, 'updateProfile'])->name('update-profile1');
});

// Routes du tableau de bord utilisateur
Route::group(['middleware' => ['loginAuth'], 'prefix' => 'dashboard'], function () {
    Route::get('/', [UtilisateurController::class, 'dashboard'])->name('dashboard');
});

// Routes des dossiers
Route::group(['middleware' => ['loginAuth'], 'prefix' => 'dossiers'], function () {
    Route::get('/', [DossierController::class, 'listDossiers'])->name('list-dossiers');
    Route::get('/add', [DossierController::class, 'addDossier'])->name('add');
    Route::post('/submit-form', [DossierController::class, 'store'])->name('store');
    Route::get('/{dossier}', [DossierController::class, 'show'])->name('dossier.show');
    Route::get('/{id}/edit',[DossierController::class,'edit'])->name('dossier.edit');
    Route::put('/{id}', [DossierController::class,'update'])->name('dossier.update');
});

// Routes des bénéficiaires
Route::group(['middleware' => ['loginAuth'], 'prefix' => 'benificiers'], function () {
    Route::get('/', [BenificierController::class, 'index'])->name('benificiers');
    Route::get('/ajouter', [BenificierController::class, 'ajouterBenificier'])->name('ajouterbenificier');
    Route::post('/submit-form', [BenificierController::class, 'store'])->name('submit.formbenificier');
    Route::post('/store', [BenificierController::class, 'store'])->name('benificier.store');
});

// Routes des avocats
Route::group(['middleware' => ['loginAuth'], 'prefix' => 'avocats'], function () {
    Route::get('/', [AvocatController::class, 'index'])->name('avocat');
    Route::get('/ajouter', [AvocatController::class, 'ajouterAvocat'])->name('ajouteravocat');
    Route::post('/submit-form', [AvocatController::class, 'store'])->name('submit.formavocat');
    Route::post('/store', [AvocatController::class, 'store'])->name('avocat.store');
    Route::get('/{id}', [AvocatController::class, 'destroy'])->name('avocat.destroy');
});
// Routes des statistisue
Route::group(['middleware' => ['loginAuth'], 'prefix' => 'statistique'], function () {
    Route::get('/', [statistiqueController::class, 'index'])->name('statistique');
    Route::get('/plus',[statistiqueController::class,'plus'])->name('plus');
    Route::post('/search', [StatistiqueController::class, 'search'])->name('search');
});

Route::group(['middleware' => ['loginAuth'], 'prefix' => 'compteurs'], function () {
    Route::get('/', [compteursController::class, 'ajouter'])->name('compteurs');
    Route::get('/list', [compteursController::class, 'compteurslist'])->name('compteurslist');
    Route::post('/store', [compteursController::class, 'store'])->name('compteurs.store');
    
    Route::put('/{id}', [compteursController::class,'update'])->name('compteurs.update');
    Route::get('/{id}/edit', [compteursController::class,'edit'])->name('compteurs.edit');
    Route::delete('/{id}', [compteursController::class ,'destroy'])->name('compteurs.destroy');
    Route::get('/calcul-consommation', [compteursController::class, 'index'])->name('calcul.consommation');
    Route::post('/calcul-consommation', [compteursController::class, 'calculConsommation']);
   
    Route::post('/calculer-moyenne', [compteursController::class, 'calculerMoyenne'])->name('compteurs.calculerMoyenne');
    Route::post('/calculer-moyenne', [compteursController::class, 'calculerMoyenne'])->name('compteurs.calculerMoyenne');

    Route::get('/calculer-moyenneAnnee', [MoyenneController::class, 'index'])->name('compteurs.calculer-moyenneAnnee');
    Route::post('/calculer-moyenneAnnee', [MoyenneController::class, 'calculmoyenneAnnee'])->name('compteurs.calculmoyenneAnnee');
    Route::get('/obtenir-mois/{annee}', [MoyenneController::class, 'obtenirMois']);
});


Route::get('/calcul-moyenne', [MoyenneController::class, 'calculer'])->name('calculations');
Route::post('/Consomations', [MoyenneController::class, 'methode2'])->name('suivi_consommation.methode2');
Route::resource('moyennes', MoyenneController::class);
Route::post('moyennes/store', [MoyenneController::class, 'store'])->name('moyennes.store');
Route::middleware(['loginAuth'])->group(function () {
    Route::get('/moyennes-list', [MoyenneController::class, 'list'])->name('list-moyennes');
    Route::get('/comparaison-compteurs', [MoyenneController::class, 'index'])->name('comparaison-compteurs');
    Route::post('/comparaison-compteurs', [MoyenneController::class, 'calculmoyenneAnnee'])->name('comparaison-compteurs');
    
});

Route::get('/Messages', [BureauController::class, 'message'])->name('message');
    

Route::post('notifications_email', [EmailController::class, 'transfert']);





Route::group(['middleware' => ['loginAuth'], 'prefix' => 'statistiqueBureau2'], function () {
    Route::get('/', [MoyenneController::class, 'statistiquesAnnuelles'])->name('statistiquesAnnuelles');
    Route::get('/more',[Bureau2StatistiqueController::class,'plus'])->name('more');
    Route::post('/search', [Bureau2StatistiqueController::class,'search'])->name('searchM');
});