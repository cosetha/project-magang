<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
             [
	            'gambar' => 'a.jpg',
	            'name' => 'Super Admin',
		        'email' => 'superadmin@gmail.com',
		        'password' => bcrypt('rahasia_superadmin'), // password
		        'id_role' => '1',
		        'remember_token' => Str::random(10)
        	],
        	[
	            'gambar' => 'a.jpg',
	            'name' => 'Admin',
		        'email' => 'admin@gmail.com',
		        'password' => bcrypt('rahasia_admin'), // password
		        'id_role' => '2',
		        'remember_token' => Str::random(10)
        	]
        ];

        foreach ($user as $u) {
            User::create($u);
        }

    }
}
