<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use Session;
class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(){
	$users = User::all();
        return view('show-users',compact('users'));
    }
    public function edit( User $user )
    {
    $roles=Role::all();
    return view('edit-user', compact('user','roles'));
    }

    public function update(User $user)
    { 
	$role = Role::findOrFail(request('role'));
         $user->roles()->sync($role);
	if(request('password')==""){
		$password=$user->password;
	}
	else{
		$password=bcrypt(request('password'));
	}
        $this->validate(request(), [
            'email' => 'unique:users,email,'.$user->id,
        ]);

	User::where('id', $user->id)->update([
				'name' =>request('name'),
				'email'=>request('email'),
				'password'=>$password
				]);
        return redirect('users');
    }
    public function destroy($id)
    {
	if(auth()->user()->id != $id){
        $user = User::find($id);
        $user->delete();
	}
        else{
	Session::flash('flash_message', 'You cant delete your account'); 
	}

        return redirect('users');
    }
}