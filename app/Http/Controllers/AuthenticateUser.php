<?php

namespace App\Http\Controllers;

use App\Models\login\AuthUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthenticateUser extends Controller
{
    public function AuthLogin(){
        return view('logins.login');
    }

    public function AuthUserLog(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        // Find the user by username
        $user = AuthUsers::where('username', $request->username)->first();
    
        // Commented out hashing for now
        if (!$user || $request->password !== $user->password) {
            return back()->withErrors(['error' => 'Invalid username or password.']);
        }
    
        // Store user role and user data in session
        Session::put('role', $user->role);
        Session::put('user', $user);
    
        // Redirect based on role
        if ($user->role === 1) {
            return redirect()->route('primary.index');
        } elseif ($user->role === 2) {
            return redirect()->route('spares.sparesReceived');
        }
    
        return redirect()->route('logins.login')->withErrors(['error' => 'Role not recognized.']);
    }


    public function AuthLogout(){
        session()->forget('user');
        return view('logins.login');
    }
}
