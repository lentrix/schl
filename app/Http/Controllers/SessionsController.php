<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function index() {
        if(auth()->user()) {
            return redirect('/home');
        }else {
            return view('login');
        }
    }

    public function create() {
        $this->validate(request(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if(!auth()->attempt(request(['username', 'password']))) {
            return back()->withErrors([
                'message' => 'Invalid user credentials!'
            ]);
        }

        return redirect('/home');
    }

    public function destroy() {
        auth()->logout();
        return redirect('/');
    }
}
