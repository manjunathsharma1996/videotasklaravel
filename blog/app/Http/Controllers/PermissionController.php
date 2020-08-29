<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{   

    public function Permission()
    {   
    	

		//RoleTableSeeder.php
		$dev_role = new Role();
		$dev_role->slug = 'admin';
		$dev_role->name = 'Administrator';
		$dev_role->save();
		

		$manager_role = new Role();
		$manager_role->slug = 'user';
		$manager_role->name = 'User';
		$manager_role->save();
		

		$developer = new User();
		$developer->name = 'admin';
		$developer->email = 'testadmin@gmail.com';
		$developer->password = bcrypt('secrettt');
		$developer->save();
		$developer->roles()->attach($dev_role);
		

		$manager = new User();
		$manager->name = 'testuser';
		$manager->email = 'testuser@gmail.com';
		$manager->password = bcrypt('secrettt');
		$manager->save();
		$manager->roles()->attach($manager_role);
		

		
		return redirect()->back();
    }
}