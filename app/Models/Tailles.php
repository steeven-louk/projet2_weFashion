<?php

namespace App\Models;

use App\Models\produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tailles extends Model
{
    use HasFactory;
    protected $fillable =['name'];

    public function produit(){
      return $this->belongsToMany(Product::class);

    }
}
