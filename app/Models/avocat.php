<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class avocat extends Model
{
    use HasFactory;
    protected $table = 'avocats';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nomV',
        'villeV',
        'adresseV',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
   
}
