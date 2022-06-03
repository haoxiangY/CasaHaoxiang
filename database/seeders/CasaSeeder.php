<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Casa;

class CasaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Casa = Casa::create([
            'nombre' => 'Casa de la playa',
            'user_id'=>\App\Models\User::all()->random()->id,
            'precio' => '200 000',
            'espacio' => '200m2',
            'imagen' => '1',
            'description'=>"Casa con vistas al mar"
        ]);

        $Casa = Casa::create([
            'nombre' => 'Casa de la playa 2',
            'user_id'=>\App\Models\User::all()->random()->id,
            'precio' => '300 000',
            'espacio' => '400m2',
            'imagen' => '2',
            'description'=>"Casa con piscina"
        ]);
        $Casa = Casa::create([
            'nombre' => 'Casa de la campo',
            'user_id'=>\App\Models\User::all()->random()->id,
            'precio' => '100 000',
            'espacio' => '100m2',
            'imagen' => '1',
            'description'=>"Casa en el campo"
        ]);

        $Casa = Casa::create([
            'nombre' => 'Piso en Oviedo',
            'user_id'=>\App\Models\User::all()->random()->id,
            'precio' => '140 000',
            'espacio' => '80m2',
            'imagen' => '1',
            'description'=>"Casa ubicado en Oviedo"
        ]);
        $Casa = Casa::create([
            'nombre' => 'Piso en Gijon',
            'user_id'=>\App\Models\User::all()->random()->id,
            'precio' => '150 000',
            'espacio' => '100m2',
            'imagen' => '1',
            'description'=>"Casa ubicado en Gijon"
        ]);
        $Casa = Casa::create([
            'nombre' => 'Piso en Gijon cerca de la playa',
            'user_id'=>\App\Models\User::all()->random()->id,
            'precio' => '200 000',
            'espacio' => '120m2',
            'imagen' => '1',
            'description'=>"Con buenas vistas"
        ]);
        

        
   

    
    }
}
