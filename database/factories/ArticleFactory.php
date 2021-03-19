<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return  [
            'code_barre' =>$this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'nom' =>$this->faker->word(),
            'numero_inventaire'=> $this->faker->randomDigit(),
            'quantite'=>$this->faker->randomDigit(),
            'observation' =>$this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'prix_achat' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'lieu' => $this->faker->address()

        ];
    }
}