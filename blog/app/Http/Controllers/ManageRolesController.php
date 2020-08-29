<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class ManageRolesController extends Controller
{   

    public function index()
    {
	$users = User::all();

  
        return view('manage-roles', compact('users'));
    }
}