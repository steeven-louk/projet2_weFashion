<?php

namespace Database\Seeders;

use App\Models\Tailles;
use Illuminate\Database\Seeder;

class TaillesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Tailles::create([
            'tailles'=>'XS'
        ]);
        Tailles::create([
            'tailles'=>'S'
        ]);
        Tailles::create([
            'tailles'=>'M'

        ]);
        Tailles::create([
            'tailles'=>'L'

        ]);
        Tailles::create([
            'tailles'=>'XL'

        ]);
    }
}
