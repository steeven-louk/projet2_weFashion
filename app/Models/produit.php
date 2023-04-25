<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nom',
        'description',
        'prix',
        'tailles',
        'image',
        'statut',
        'etat',
        'reference'
 
    ];

    public function category(){
        $this->belongsTo(Category::class);
    }
}
