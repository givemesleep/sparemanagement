<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;

class SpareLogin extends Controller
{

    public function showlogin()
    {
        return view('logins.login');
    }
    
    public function create_user()
    {
        return view('logins.create_user');
    }

    public function new_user(Request $request){
        
        $new_user = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        //hash me baby one more time!
        $new_user['password'] = Hash::make($new_user['password']);
        
        $account = Account::create($new_user);
        return redirect(route('logins.login'));
    }

    public function user_login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = Account::where('username', 'like', '%' . $request->username . '%')->first();
        session(['user' => $user]);

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Incorrect password.');
        }
        return redirect(route('primary.index'));
    }

    //Logout me there
    public function logout()
    {
    session()->forget('user');
    return redirect('/logins/login')->with('success', 'You have been logged out.');
    }


    
}
