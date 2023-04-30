<?php

namespace Database\Seeders;

use App\Models\produit;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker  = Factory::create();


        for ($i = 0; $i < 40; $i++) {
            produit::create([
                'name' => $faker->sentence(rand(2, 10), true),
                'description' => $faker->text(300),
                'price' => $faker->randomFloat(2, 10, 100),
                'image' => 'femme-'.$faker->numberBetween(1,10).'.jpg',
                'status' => $faker->randomElement(['publié', 'non publié']),
                'state' => $faker->randomElement(['en solde', 'standard']),
                'reference' => $faker->unique()->regexify('[A-Za-z0-9]{16}'),
                'category_id' => 1,
            ]);
        }

        for ($i = 0; $i < 40; $i++) {
            Produit::create([
                'name' => $faker->sentence(rand(2, 10), true),
                'description' => $faker->text(300),
                'price' => $faker->randomFloat(2, 10, 100),
                'image' => 'homme-'.$faker->numberBetween(1,10).'.jpg',
                'status' => $faker->randomElement(['publié', 'non publié']),
                'state' => $faker->randomElement(['en solde', 'standard']),
                'reference' => $faker->unique()->regexify('[A-Za-z0-9]{16}'),
                'category_id' => 2
            ]);
        }
    }
}
