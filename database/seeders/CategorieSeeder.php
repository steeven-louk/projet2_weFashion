<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
     Category::create([
        'name' => 'Femme'
     ]);

     Category::create([
        'name' => "Homme"
     ]);
    }
}
