<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compteur extends Model
{
    use HasFactory;
    protected $table = 'compteurs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'refCompteurs',
        'tribunale_id',
        'date',
        'type',
        'valeur',
        'moyenne',
        'etat'
    ];
    protected $appends = ['fuiteDetectee', 'fuiteIcone'];
    public function tribunale(){
        return $this->belongsTo(tribunale::class,'tribunale_id');
    }
}
