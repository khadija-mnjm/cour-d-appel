<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompteursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Exemple de données de test pour la table compteurs
        $compteursData = [
            [
                'refCompteur' => 1.1,
                'tribunale_id' => 1,
                'date' => '2023-01-01',
                'valeur' => 500,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 2 dans janvier
            [
                'refCompteur' => 1.2,
                'tribunale_id' => 2,
                'date' => '2023-01-08',
                'valeur' => 520,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Ajoutez ici les données pour les autres semaines de janvier
            // Semaine 3 dans janvier
            [
                'refCompteur' => 1.3,
                'tribunale_id' => 3,
                'date' => '2023-01-15',
                'valeur' => 550,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 4 dans janvier
            [
                'refCompteur' => 1.4,
                'tribunale_id' => 4,
                'date' => '2023-01-22',
                'valeur' => 580,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 1 dans février
            [
                'refCompteur' => 2.1,
                'tribunale_id' => 1,
                'date' => '2023-02-05',
                'valeur' => 510,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'refCompteur' => 2.2,
                'tribunale_id' => 2,
                'date' => '2023-02-12',
                'valeur' => 530,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 3 dans février
            [
                'refCompteur' => 2.3,
                'tribunale_id' => 3,
                'date' => '2023-02-19',
                'valeur' => 560,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 4 dans février
            [
                'refCompteur' => 2.4,
                'tribunale_id' => 4,
                'date' => '2023-02-26',
                'valeur' => 590,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'refCompteur' => 3.1,
                'tribunale_id' => 1,
                'date' => '2023-03-05',
                'valeur' => 600,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 2 dans mars
            [
                'refCompteur' => 3.2,
                'tribunale_id' => 2,
                'date' => '2023-03-12',
                'valeur' => 620,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 3 dans mars
            [
                'refCompteur' => 3.3,
                'tribunale_id' => 3,
                'date' => '2023-03-19',
                'valeur' => 650,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 4 dans mars
            [
                'refCompteur' => 3.4,
                'tribunale_id' => 4,
                'date' => '2023-03-26',
                'valeur' => 680,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'refCompteur' => 4.1,
                'tribunale_id' => 1,
                'date' => '2023-04-02',
                'valeur' => 590,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 2 dans avril
            [
                'refCompteur' => 4.2,
                'tribunale_id' => 2,
                'date' => '2023-04-09',
                'valeur' => 610,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 3 dans avril
            [
                'refCompteur' => 4.3,
                'tribunale_id' => 3,
                'date' => '2023-04-16',
                'valeur' => 630,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 4 dans avril
            [
                'refCompteur' => 4.4,
                'tribunale_id' => 4,
                'date' => '2023-04-23',
                'valeur' => 650,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'refCompteur' => 5.1,
                'tribunale_id' => 1,
                'date' => '2023-05-07',
                'valeur' => 700,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 2 dans mai
            [
                'refCompteur' => 5.2,
                'tribunale_id' => 2,
                'date' => '2023-05-14',
                'valeur' => 720,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 3 dans mai
            [
                'refCompteur' => 5.3,
                'tribunale_id' => 3,
                'date' => '2023-05-21',
                'valeur' => 740,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 4 dans mai
            [
                'refCompteur' => 5.4,
                'tribunale_id' => 4,
                'date' => '2023-05-28',
                'valeur' => 760,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'refCompteur' => 6.1,
                'tribunale_id' => 1,
                'date' => '2023-06-04',
                'valeur' => 800,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 2 dans juin
            [
                'refCompteur' => 6.2,
                'tribunale_id' => 2,
                'date' => '2023-06-11',
                'valeur' => 820,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 3 dans juin
            [
                'refCompteur' => 6.3,
                'tribunale_id' => 3,
                'date' => '2023-06-18',
                'valeur' => 840,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 4 dans juin
            [
                'refCompteur' => 6.4,
                'tribunale_id' => 4,
                'date' => '2023-06-25',
                'valeur' => 860,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'refCompteur' => 7.1,
                'tribunale_id' => 1,
                'date' => '2023-07-02',
                'valeur' => 880,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 2 dans juillet
            [
                'refCompteur' => 7.2,
                'tribunale_id' => 2,
                'date' => '2023-07-09',
                'valeur' => 900,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 3 dans juillet
            [
                'refCompteur' => 7.3,
                'tribunale_id' => 3,
                'date' => '2023-07-16',
                'valeur' => 920,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 4 dans juillet
            [
                'refCompteur' => 7.4,
                'tribunale_id' => 4,
                'date' => '2023-07-23',
                'valeur' => 940,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'refCompteur' => 8.1,
                'tribunale_id' => 1,
                'date' => '2023-08-06',
                'valeur' => 1000,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 2 dans août
            [
                'refCompteur' => 8.2,
                'tribunale_id' => 2,
                'date' => '2023-08-13',
                'valeur' => 1020,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 3 dans août
            [
                'refCompteur' => 8.3,
                'tribunale_id' => 3,
                'date' => '2023-08-20',
                'valeur' => 1040,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 4 dans août
            [
                'refCompteur' => 8.4,
                'tribunale_id' => 4,
                'date' => '2023-08-27',
                'valeur' => 1060,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            [
                'refCompteur' => 9.1,
                'tribunale_id' => 1,
                'date' => '2023-09-03',
                'valeur' => 1100,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 2 dans septembre
            [
                'refCompteur' => 9.2,
                'tribunale_id' => 2,
                'date' => '2023-09-10',
                'valeur' => 1120,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 3 dans septembre
            [
                'refCompteur' => 9.3,
                'tribunale_id' => 3,
                'date' => '2023-09-17',
                'valeur' => 1140,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 4 dans septembre
            [
                'refCompteur' => 9.4,
                'tribunale_id' => 4,
                'date' => '2023-09-24',
                'valeur' => 1160,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'refCompteur' => 10.1,
                'tribunale_id' => 1,
                'date' => '2023-10-01',
                'valeur' => 1200,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 2 dans octobre
            [
                'refCompteur' => 10.2,
                'tribunale_id' => 2,
                'date' => '2023-10-08',
                'valeur' => 1220,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 3 dans octobre
            [
                'refCompteur' => 10.3,
                'tribunale_id' => 3,
                'date' => '2023-10-15',
                'valeur' => 1240,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 4 dans octobre
            [
                'refCompteur' => 10.4,
                'tribunale_id' => 4,
                'date' => '2023-10-22',
                'valeur' => 1260,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'refCompteur' => 11.1,
                'tribunale_id' => 1,
                'date' => '2023-11-05',
                'valeur' => 1300,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 2 dans novembre
            [
                'refCompteur' => 11.2,
                'tribunale_id' => 2,
                'date' => '2023-11-12',
                'valeur' => 1320,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 3 dans novembre
            [
                'refCompteur' => 11.3,
                'tribunale_id' => 3,
                'date' => '2023-11-19',
                'valeur' => 1340,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 4 dans novembre
            [
                'refCompteur' => 11.4,
                'tribunale_id' => 4,
                'date' => '2023-11-26',
                'valeur' => 1360,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'refCompteur' => 11.1,
                'tribunale_id' => 1,
                'date' => '2023-11-05',
                'valeur' => 1300,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 2 dans novembre
            [
                'refCompteur' => 11.2,
                'tribunale_id' => 2,
                'date' => '2023-11-12',
                'valeur' => 1320,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 3 dans novembre
            [
                'refCompteur' => 11.3,
                'tribunale_id' => 3,
                'date' => '2023-11-19',
                'valeur' => 1340,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 4 dans novembre
            [
                'refCompteur' => 11.4,
                'tribunale_id' => 4,
                'date' => '2023-11-26',
                'valeur' => 1360,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'refCompteur' => 12.1,
                'tribunale_id' => 1,
                'date' => '2023-12-03',
                'valeur' => 720,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 2 dans décembre
            [
                'refCompteur' => 12.2,
                'tribunale_id' => 2,
                'date' => '2023-12-10',
                'valeur' => 750,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 3 dans décembre
            [
                'refCompteur' => 12.3,
                'tribunale_id' => 3,
                'date' => '2023-12-17',
                'valeur' => 780,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 4 dans décembre
            [
                'refCompteur' => 12.4,
                'tribunale_id' => 4,
                'date' => '2023-12-24',
                'valeur' => 800,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Semaine 5 dans décembre (si applicable, sinon ajustez en fonction du nombre de semaines dans le mois)
            [
                'refCompteur' => 12.5,
                'tribunale_id' => 1,
                'date' => '2023-12-31',
                'valeur' => 820,
                'moyenne' => 0,
                'etat' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ];

       
        DB::table('compteurs')->insert($compteursData);
    }
}
