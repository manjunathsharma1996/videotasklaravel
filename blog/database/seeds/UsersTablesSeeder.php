<?php

use Illuminate\Database\Seeder;
use App\Role;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	
	$user_role = Role::where('slug', 'user')->first();
	$admin = Role::findOrFail($user_role->id);
	if(!$admin){
		Role::create([
			'name'		 => 'User',
			'slug'		 => 'user'
		]);
	}
	$admin_role = Role::where('slug', 'admin')->first();
	$user = Role::findOrFail($admin_role->id);
	if(!$user){
		Role::create([
			'name'		 => 'Administrator',
			'slug'		 => 'admin'
		]);
	}
    }
}
