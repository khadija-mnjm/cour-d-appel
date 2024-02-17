<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class benificierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('benificiers')->insert([[
            'nomB'=>'aitahmed',
            'prenomB'=>'ahmed',
            'villeB'=>'zagoura',
        ],[
            'nomB'=>'ouali',
            'prenomB'=>'ali',
            'villeB'=>'ouarzazate',
        ],[
            'nomB'=>'rahimi',
            'prenomB'=>'salma',
            'villeB'=>'tinghir',
        ],[
            'nomB'=>'kabiri',
            'prenomB'=>'kaoutar',
            'villeB'=>'ouarzazate',
        ],[
            'nomB'=>'moden',
            'prenomB'=>'amen',
            'villeB'=>'zagoura',
        ]]);
    }

}