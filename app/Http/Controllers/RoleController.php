<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    function index() {
        $roles = Role::orderBy('display_name')->get();
        return view('admin.roles.index', compact('roles'));
    }

    function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'display_name' => 'required',
        ]);

        Role::create([
            'name' => $request['name'],
            'display_name' => $request['display_name'],
            'description' => $request['description']
        ]);

        return redirect('/roles');
    }

    function destroy(Request $request) {
        $role = Role::find($request['id']);
        $role->delete();
        return redirect('/roles');
    }
}
