<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class dossier extends Model
{
    use HasFactory;
    protected $table = 'dossiers';
    protected $fillable = [
            'numeroD' ,
            'avocat_id',
            'commission',  
            'dateDossier' , 
            'refJuridique',  
            'refDecision', 
            'tribunale_id',
            'benificier_id',
            'dateAideJustice',
            'prix' ,
            'validate' ,
            'refPerfermance' ,
            'refEngagement' ,
            'refEditions' ,
            'date_ds_aide_etat'
    ];
    public function avocat(){
        return $this->belongsTo(avocat::class,'avocat_id');
    }
    public function tribunale(){
        return $this->belongsTo(tribunale::class,'tribunale_id');
    }
    public function benificier(){
        return $this->belongsTo(benificier::class,'benificier_id');
    }
    public function isModified()
{
    return $this->modified;
}

public function markAsModified()
{
    $this->update(['modified' => true]);
}
}
