<?php

namespace Database\Seeders;

use App\Models\produit;
use App\Models\Tailles;
use Illuminate\Database\Seeder;

class ProductSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = produit::all();
        $sizes = Tailles::all();

        foreach ($products as $product) {
            $product->size()->attach($sizes->random(rand(1, 3))->pluck('id')->toArray());
        }
    }
}
