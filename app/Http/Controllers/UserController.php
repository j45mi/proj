<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show register/create form
    public function create(){
        return view('users.register');
    }

    // function for storing
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
            'is_admin' => '',
        ]);

        if($request['is_admin'] === 'yes'){
            $formFields['is_admin'] = true;
        }else{
            $formFields['is_admin'] = false;

        }

        // hash password
        $formFields['password'] = bcrypt($formFields['password']);
        //create user
        $user = User::create($formFields);
        //login
        auth()->login($user);
        $formFields['is_admin'] = auth()->is_admin();

        return redirect('/')->with('message', 'User created and logged in.');
        
    }

    //logout user
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out.');

    }

    //show login form
    public function login(){
        return view('users.login');
    }

    //authenticate user
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are logged in.');
        }

        return back()->withErrors(['email' => 'Invalid credentials.'])->onlyInput('email');
        

    }

    //show edit user form
    public function edit(Request $request, User $user){
        return view('users.edit', ['users' => $user]);
    }

    // function for user update
    public function update(Request $request, User $user){
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
        ]);


        $user->update($formFields);

        return back()->with('message', 'User edited.');
        
    }

    // function for showing all players
    /*public function show(Request $request, User $user){
        return view('users.registered_users', ['users' => $user]);
        
    }*/

    // show all listings
    public function index(){
        return view('users.registered_users', [
            'users' => User::all()
        ]);

    }

    // show single user --------> cesta je ='/users/{user}'
    public function show(User $user){
        return view('users.user_profile', [
            'user' => $user
        ]);

    }

    //delete user
    public function destroy(User $user){
        //make sure logged in user is owner or admin!
        if($user->user_id != auth()->id() || $user->is_admin =! 1){
            //abort(403, 'Unathorized Action');
            return redirect('/')->with('message', 'User deleted successfully');
        }

        $user->delete();
        return redirect('/')->with('message', 'User deleted successfully');
    }


}
