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
            'imagen' => 'storage/img/casaplaya1.jpg',
            'description'=>"Casa con vistas al mar"
        ]);

        $Casa = Casa::create([
            'nombre' => 'Casa de la playa 2',
            'user_id'=>\App\Models\User::all()->where('name','<>','admin')->random()->id,
            'precio' => '300 000',
            'espacio' => '400m2',
            'imagen' => 'storage/img/casaplaya2.jpg',
            'description'=>"Casa con piscina"
        ]);
        $Casa = Casa::create([
            'nombre' => 'Casa de la campo',
            'user_id'=>\App\Models\User::all()->random()->id,
            'precio' => '100 000',
            'espacio' => '100m2',
            'imagen' => 'storage/img/casacampo.jpg',
            'description'=>"Casa en el campo"
        ]);

        $Casa = Casa::create([
            'nombre' => 'Piso en Oviedo',
            'user_id'=>\App\Models\User::all()->random()->id,
            'precio' => '140 000',
            'espacio' => '80m2',
            'imagen' => 'storage/img/pisooviedo.jpg',
            'description'=>"Casa ubicado en Oviedo"
        ]);
        $Casa = Casa::create([
            'nombre' => 'Piso en Gijon',
            'user_id'=>\App\Models\User::all()->random()->id,
            'precio' => '150 000',
            'espacio' => '100m2',
            'imagen' => 'storage/img/pisogijon.jpg',
            'description'=>"Casa ubicado en Gijon"
        ]);
        $Casa = Casa::create([
            'nombre' => 'Piso en Gijon cerca de la playa',
            'user_id'=>\App\Models\User::all()->random()->id,
            'precio' => '200 000',
            'espacio' => '120m2',
            'imagen' => 'storage/img/pisogijonmar.jpg',
            'description'=>"Con buenas vistas"
        ]);
        
        $Casa = Casa::create([
            'nombre' => 'Apartamento',
            'user_id'=>\App\Models\User::all()->random()->id,
            'precio' => '30 000',
            'espacio' => '50m2',
            'imagen' => 'storage/img/apartamento.jpg',
            'description'=>"perfecto para una persona"
        ]);
        $Casa = Casa::create([
            'nombre' => 'Casa al lado rio',
            'user_id'=>\App\Models\User::all()->random()->id,
            'precio' => '300 000',
            'espacio' => '140m2',
            'imagen' => 'storage/img/casario.jpg',
            'description'=>"Con buenas vistas y buen sitio"
        ]);
        $Casa = Casa::create([
            'nombre' => 'Casa al rio',
            'user_id'=>\App\Models\User::all()->random()->id,
            'precio' => '220 000',
            'espacio' => '140m2',
            'imagen' => 'storage/img/casario2.jpg',
            'description'=>"Con buenas vistas"
        ]);
        
        
   

    
    }
}
