<?php

namespace Database\Seeders;

use App\Models\Sizes;
use App\Models\produit;
use Illuminate\Database\Seeder;

class ProductTaillesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = produit::all();
        $sizes = Sizes::all();

        foreach ($products as $product) {
            $product->size()->attach($sizes->random(rand(1, 3))->pluck('id')->toArray());
        }
    }
}
