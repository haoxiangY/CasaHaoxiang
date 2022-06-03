<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $usuario = User::create([
            'name' => 'Haoxiang',
            'email' => 'haoxiang@hotmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('haoxiang')
        ]);
        
      
      

    
    }
}
