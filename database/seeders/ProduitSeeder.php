<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\produit;
use Illuminate\Database\Seeder;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Factory::create();

        for ($i = 0; $i < 40; $i++) {
            Produit::create([
                'nom' => $faker->sentence(rand(2, 10), true),
                'description' => $faker->text(300),
                'prix' => $faker->randomFloat(2, 10, 100),
                'taille_id' => $faker->numberBetween(1,5),
                'image' => 'femme-'.$faker->numberBetween(1,10).'.jpg',
                'statut' => $faker->randomElement(['publié', 'non publié']),
                'etat' => $faker->randomElement(['en solde', 'standard']),
                'reference' => $faker->unique()->regexify('[A-Za-z0-9]{16}'),
                'categorie_id' => 1,
            ]);
        }

        for ($i = 0; $i < 40; $i++) {
            Produit::create([
                'nom' => $faker->sentence(rand(2, 10), true),
                'description' => $faker->text(300),
                'prix' => $faker->randomFloat(2, 10, 100),
                'taille_id' => $faker->numberBetween(1,5),
                'image' => 'homme-'.$faker->numberBetween(1,10).'.jpg',
                'statut' => $faker->randomElement(['publié', 'non publié']),
                'etat' => $faker->randomElement(['en solde', 'standard']),
                'reference' => $faker->unique()->regexify('[A-Za-z0-9]{16}'),
                'categorie_id' => 2
            ]);
        }
    }
}
