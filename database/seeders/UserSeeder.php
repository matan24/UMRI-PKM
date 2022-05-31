<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = User::create([

            'name' => 'Admin1',
            'username' => 'admin1',
            'password' => bcrypt('pkmumri115'),
            'email' => 'adminpkm115@gmail.com',
        ]);

        $admin->assignRole('admin');

        $admin = User::create([

            'name' => 'Admin2',
            'username' => 'admin2',
            'password' => bcrypt('pkmjaya115'),
            'email' => 'adminjaya115@gmail.com',
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Feri Mulyadi',
            'username' => '180401152',
            'password' => bcrypt('180401152'),
            'email' => '180401152@student.umri.ac.id',
        ]);

        $user->assignRole('user');
        
        // User::create([

        //     'name' => 'Feri Mulyadi',
        //     'username' => '180401152',
        //     'password' => bcrypt('180401152'),
        //     'email' => '180401152.student.umri.ac.id'

        // ]);
    }
}
