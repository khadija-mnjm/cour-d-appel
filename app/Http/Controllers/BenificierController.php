<?php

namespace App\Http\Controllers;

use App\Models\benificier;
use Illuminate\Http\Request;

class BenificierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
     public function index()
     { 
        $benificiers = Benificier::all();
        return view('benificier.list', ['benificiers' => $benificiers]);    
     }
     public function ajouterbenificier()
     {
        return view('benificier.add');
     }
     public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomB' => 'required|string|max:255',
            'prenomB' => 'required|string|max:255',
            'villeB' => 'required|string|max:255',
        ]);

        Benificier::create($validatedData);

        return redirect()->route('benificiers')->with('success', 'Benificier added successfully!');
    }
   
}
