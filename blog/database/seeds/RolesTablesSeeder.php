<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_role = Role::where('slug', 'user')->first();
	if(!$user_role){
		Role::create([
			'name'		 => 'User',
			'slug'		 => 'user'
		]);
	}
	$admin_role = Role::where('slug', 'admin')->first();
	if(!$admin_role){
		Role::create([
			'name'		 => 'Administrator',
			'slug'		 => 'admin'
		]);
	}
    }
}
