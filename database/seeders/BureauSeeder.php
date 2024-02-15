<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class BureauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bureaus')->insert([
            'nom' => 'Electrique/eau',
            'type_bureau' => 'Surveillance interne',
        ]);
        DB::table('bureaus')->insert([
            'nom' => 'Information et technologie',
            'type_bureau' => 'Information et technologie',
        ]);
        DB::table('bureaus')->insert([
            'nom' => ' Budget et offres',
            'type_bureau' => ' Budget et offres',
        ]);
        DB::table('bureaus')->insert([
            'nom' => 'Local pour voitures et motos',
            'type_bureau' => 'Local pour voitures et motos',
        ]);
    }
   
}
