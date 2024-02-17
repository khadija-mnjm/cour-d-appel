<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\bureau;

class UtilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       

        DB::table('utilisateurs')->insert([
            'login' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'typeUtilisateur' => 'admin',
            'bureaus_id' => bureau::all()->random()->id, // Make sure bureau model is correctly imported
            'image' => 'https://rc-pro-france.fr/wp-content/uploads/sites/2/2020/03/why-choose-us.png',
            'nom' => 'admin',
            'prenom' => 'ali',
            

        ]);


        DB::table('utilisateurs')->insert([
            'login' => 'user@gmail.com',
            'password' => Hash::make('user'),
            'typeUtilisateur' => 'utilisateur',
            'bureaus_id'=>bureau::all()->random()->id,
            'image' => 'https://img.freepik.com/vecteurs-libre/illustration-concept-abstrait-responsabilite-responsabilite-juridique-responsabilite-personnelle-publique-assumer-responsabilite-actions-decisions-roles-leadership_335657-37.jpg',
            'nom' => 'info',
            'prenom' => 'utilisateurs',

        ]);
        DB::table('utilisateurs')->insert([
            'login' => 'khadijamounajjim@gmail.com',
            'password' => Hash::make('khadija123'),
            'typeUtilisateur' => 'utilisateur',
            'bureaus_id'=>bureau::all()->random()->id,
            'image' => 'https://us.123rf.com/450wm/luzazure/luzazure2309/luzazure230910415/212602044-vue-lat%C3%A9rale-d-une-femme-d-affaires-s%C3%A9rieuse-travaillant-sur-un-ordinateur-sur-son-lieu-de-travail.jpg?ver=6',
            'nom' => 'khadija',
            'prenom' => 'Mounajjim',
        ]);
        DB::table('utilisateurs')->insert([
            'login' => 'reselelectrique@gmail.com',
            'password' => Hash::make('res123'),
            'typeUtilisateur' => 'resElectrique',
            'bureaus_id'=>bureau::all()->random()->id,
            'image' => 'https://www.shutterstock.com/image-photo/professional-engineer-technician-team-working-260nw-2274403311.jpg', 
            'nom' => 'John',
            'prenom' => 'Doe',
        ]); 
    }
}
