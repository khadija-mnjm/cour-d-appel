<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tribunale extends Model
{
    protected $fillable = [
        'nomT',
        'adresseT',
        'typeTribunale'
    ];
    use HasFactory;
}
