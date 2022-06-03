<?php

namespace Database\Seeders;

use App\Models\Casa;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       \App\Models\User::factory(3)->create();
       $this->call(CasaSeeder::class);
       $this->call(UserSeeder::class);
      
    }
   
}
