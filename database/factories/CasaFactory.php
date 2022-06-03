<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Casa;


use Illuminate\Database\Eloquent\Factories\Factory;

class CasaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=> $this->faker->company(),
            'user_id'=>\App\Models\User::all()->random()->id,
            'precio' => $this->faker->text(10),
            'espacio' => $this->faker->text(10),
            'description' => $this->faker->text(10),
            'imagen' => $this->faker->text(10)
            
        ];
    }
}
