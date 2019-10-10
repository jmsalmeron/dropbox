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
        ])->each(function (User $user){
            factory(\App\File::class, 5)->create(['type' => 'document', 'extension' => 'pdf', 'folder' => 'prueba-1', 'user_id' => $user->id]);
//            factory(\App\File::class, 5)->create(['type' => 'image', 'extension' => 'jpg', 'folder' => 'prueba-1', 'user_id' => $user->id]);
        });
    }
}
