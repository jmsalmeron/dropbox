<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'name' => 'prueba',
           'email' => 'prueba@prueba.com',
           'username' => 'prueba',
            'password' => bcrypt('prueba'),
        ]);
    }
}
