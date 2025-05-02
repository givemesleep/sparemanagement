<?php

namespace App\Http\Controllers;
use app\models\Account;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class OtpController extends Controller
{
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
    
        $email = $request->input('email');
        $role = $request->input('role');
        $otp = random_int(100000, 999999);
        $hashedOtp = bcrypt($otp);
    
        session(['otp' => $otp, 'otp_email' => $email]);
    
        Mail::raw("Your Pass Code is: $otp", function ($message) use ($email) {
            $message->to($email)
                    ->subject('Your Pass Code');
        });
    
        $new_user = [
            'username' => $email,  
            'email' => $email,     
            'password' => $hashedOtp,
            'role' => $role,
        ];
    
        Account::create($new_user);  
    
        return redirect()->route('accounts.manage')->with([
            'otp' => $otp,  
            'email' => $email  
        ]);
    }
}