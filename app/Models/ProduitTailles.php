<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitTailles extends Model
{
    use HasFactory;
    protected $fillable = ['produit_id',' tailles_id'];

     // Définir la relation avec la table des tailles
     public function sizes()
     {
         return $this->belongsTo(Sizes::class);
     }

}
