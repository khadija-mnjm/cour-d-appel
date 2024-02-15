<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class avocatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('avocats')->insert([[
            'nomV'=>'alami',
            'villeV'=>'ouarzazate',
            'adresseV'=>'ouarzazate masira av.M6'
        ],[
            'nomV'=>'rami',
            'villeV'=>'marrakech',
            'adresseV'=>'marrakech geliz av.M5'
        ],[
            'nomV'=>'kabiri',
            'villeV'=>'zagoura',
            'adresseV'=>'zagoura bureau1'
        ],[
            'nomV'=>'khadija',
            'villeV'=>'ouarzazte',
            'adresseV'=>'ouarzazte bureau1'
        ],[
            'nomV'=>'fatimzahra',
            'villeV'=>'ouarzazate',
            'adresseV'=>'ouarzazate sididaoud av.M6'
        ]]);
    }
}

