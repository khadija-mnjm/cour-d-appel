<?php 
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dossier;

class DossierFactory extends Factory
{
    protected $model = Dossier::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'numeroD' => fake()->unique()->numberBetween(1, 30),
            'avocat_id' => fake()->numberBetween(1, 4),
            'commission' => fake()->word, 
            'dateDossier' => fake()->dateTime, 
            'refJuridique' => fake()->word, 
            'refDecision' => fake()->word,
            'tribunale_id' => fake()->numberBetween(1, 4),
            'benificier_id' => fake()->numberBetween(1, 5),
            'dateAideJustice' => fake()->dateTime,
            'prix' => fake()->randomElement([2000,2500,3000,3500]),
            'validate' => fake()->randomElement(['oui', 'non']),
            'refPerfermance' => fake()->word,
            'refEngagement' => fake()->word,
            'refEditions' => fake()->word,
            'date_ds_aide_etat' => fake()->dateTime,
        ];
    }
}