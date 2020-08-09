<?php

use Illuminate\Database\Seeder;
use App\Roles;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
             [
	            'nama_role' => 'Super Admin'
        	],
        	[
	            'nama_role' => 'Admin'
        	]
        ];

        foreach ($roles as $r) {
            Roles::create($r);
        }

    }
}
