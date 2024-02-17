<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class electrique extends Model
{
    use HasFactory;
    protected $fillable = ['refCompteur', 'dateCompteur', 'tribunal_id', 'valeur', 'etat', 'etatGeneral'];
}
