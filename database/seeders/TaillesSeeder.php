<?php

namespace Database\Seeders;

use App\Models\Tailles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaillesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $sizes = [
        'XS',
        'S',
        'M',
        'L',
        'XL',
    ];

    foreach ($sizes as $size) {
        DB::table('sizes')->insert([
            'name' => $size
        ]);
    }

    }
}
