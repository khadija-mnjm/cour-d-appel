<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Utilisateur extends Model implements Authenticatable
{
    use HasFactory;

    protected $table = 'utilisateurs'; // Correct table name

    protected $fillable = [
        'login',
        'password',
        'typeUtilisateur',
        'bureau_id',
        'nom',
        'prenom',
        'image',
    ];

    // Implementing methods from Authenticatable interface

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return null; // not needed for now
    }

    public function setRememberToken($value)
    {
        // not needed for now
    }

    public function getRememberTokenName()
    {
        return null; // not needed for now
    }
}
