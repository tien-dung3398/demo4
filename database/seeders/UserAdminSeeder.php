<?php

namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = new Role;
       $user->name ='admin';
       $user->save(); 

       $user = new Role;
       $user->name ='author';
       $user->save();

       $user = new Role;
       $user->name ='user';
       $user->save();

       
       
    }
    
}
