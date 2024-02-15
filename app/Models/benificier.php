<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benificier extends Model
{
    use HasFactory;

    protected $table = 'benificiers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nomB',
        'prenomB',
        'villeB',
    ];
}
