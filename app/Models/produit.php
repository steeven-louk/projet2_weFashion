<?php

namespace App\Models;

use App\Models\Tailles;
use App\Models\Category;
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

    public function size(){
       return $this->belongsToMany(Tailles::class);
    }
}
