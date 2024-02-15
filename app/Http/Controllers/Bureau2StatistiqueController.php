<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tribunale;
use App\Models\compteur;
use App\Models\Moyenne;

class Bureau2StatistiqueController extends Controller
{
    public function index(Request $request)
    {
        return view('Electrique.Statistique');
    }
    public function more(){
        $moyennes = Moyenne::with('tribunale','compteur')->get();
        $targetYear = date('Y');
        return view('Electrique.more',['moyennes' => $moyennes, ]);
    }
} 
