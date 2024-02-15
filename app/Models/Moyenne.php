<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moyenne extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_debut',
        'date_fin',
        'date',
        'pourcentage',
        'moyenne',
        'tribunale_id',
        'compteur_id',
        'valeur',
        'etat'
    ];
    public function tribunale(){
        return $this->belongsTo(tribunale::class,'tribunale_id');
    }
    
    public function compteur(){
        return $this->belongsTo(Compteur::class, 'compteur_id');
    }
}

