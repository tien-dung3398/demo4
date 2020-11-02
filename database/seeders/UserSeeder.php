<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Admin;
        $user->name     = 'Nguyên Tiến Dũng';
        $user->email    = 'tiendungbtk@gmail.com';
        $user->password = bcrypt('dungusd01');
        $user->save();
    }
}
