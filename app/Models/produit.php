<?php

namespace App\Models;

use App\Models\Sizes;
use App\Models\Category;
use App\Models\ProduitTailles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'price',
        'image',
        'status',
        'state',
        'reference'
    ];

    public function category(){
      return  $this->belongsTo(Category::class);
    }

    public function sizes()
    {
        return $this->hasMany(ProduitTailles::class);
    }
 
}
