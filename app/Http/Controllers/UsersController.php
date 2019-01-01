<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersController extends Controller
{
    function index() {
        $users = [];
        if(isset($_GET['search'])) {
            $search = $_GET['search'];
            $users = User::where('username', 'like', "%$search%")
                    ->orWhere('full_name','like', "%$search%")
                    ->get();
        }

        return view('admin.users.index', compact('users'));
    }

    function show(User $user) {
        $availableRoles = \App\Role::availableFor($user);
        return view('admin.users.view', ['user'=>$user, 'available_roles'=>$availableRoles]);
    }

    function create() {
        return view('admin.users.create');
    }

    function store(Request $request) {
        $this->validate($request, [
            'username' => 'required',
            'full_name' => 'required',
            'password' => 'required|confirmed'
        ]);

        $user = User::create([
            'username' => $request['username'],
            'full_name' => $request['full_name'],
            'password' => bcrypt($request['password'])
        ]);
        
        return redirect("/users/$user->id");
    }

    function addRole() {
        $user = User::find($_POST['user_id']);

        $user->roles()->attach($_POST['role_id']);

        return redirect("/users/{$_POST['user_id']}");
    }

    function removeRole() {
        $user = User::find($_POST['user_id']);
        $user->roles()->detach($_POST['role_id']);
        return redirect("/users/{$_POST['user_id']}");
    }

    function changePassword(User $user) {
        $this->validate(request(), [
            'password'=>'required|confirmed'
        ]);

        $user->password = bcrypt(request('password'));

        $user->save();
        
        session()->flash('info',"Password for user $user->username has been changed successfully!");

        return redirect("/users/$user->id");
    }

    function update(User $user) {
        $this->validate(request(), [
            'username' => 'required',
            'full_name' => 'required',
        ]);

        $user->update([
            'username' => request('username'),
            'full_name' => request('full_name'),
        ]);

        session()->flash('info', "User $user->username has been updated successfully!");

        return redirect()->back();
    }

    function setActive(User $user) {
        $user->active = request('active');
        $user->save();
        return redirect()->back();
    }
}
