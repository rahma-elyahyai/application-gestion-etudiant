<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $fillable = [
        'num_apogee',
        'nom',
        'prenom',
        'email',
        'tele',
        'photo',
    ];
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

}
