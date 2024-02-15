<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class tribunaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tribunales')->insert([[
            'nomT'=>"Cour d'appel ouarzazate",
            'adresseT'=>"Ouarzazate",
            'typeTribunale'=>"Cour d'appel",
        ],[
            'nomT'=>"Tribunal de première instance OUARZAZATE",
            'adresseT'=>"Ouarzazate",
            'typeTribunale'=>"Tribunal de première instance",
        ],[
            'nomT'=>"Tribunal de première instance ZAGOURA",
            'adresseT'=>"Zagoura",
            'typeTribunale'=>"Tribunal de première instance",
        ],[
            'nomT'=>"Tribunal de première instance TINGHIR",
            'adresseT'=>"Tinghir",
            'typeTribunale'=>"Tribunal de première instance",
        ]]);
    }
}