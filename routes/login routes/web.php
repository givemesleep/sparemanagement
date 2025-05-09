<?php

use App\Http\Controllers\OtpController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\primary;
use App\Http\Controllers\SpareManagement;
use App\Http\Controllers\SpareLogin;
use App\Http\Controllers\SpareMaintenance;

// LOGIN ROUTES!

//Logout
// Route::get('/logins/logout', [SpareLogin::class, 'logout'])->name('logins.logout');


// //Route for Login Men Uwu Amen Jesus is the best. Satan/Lucifer sucks ass hes a bad boy
// Route::get('/logins/login', [SpareLogin::class, 'showlogin'])->name('logins.login');
// //For processing of login
// Route::post('/logins/user_login', [SpareLogin::class, 'user_login'])->name('logins.user_login');

// Route::group(['prefix' => 'admin'], function(){
    
//     Route::get('/', function() {
//         if (Session::get('role') === 1) {
//             return app(primary::class)->index();
//         }
//         return redirect('/logins.login')->with('InvalidLogIn', 'Unauthorized Access.');
//     })->name('primary.index');

// });



// //For processing of new accounts
// Route::post('/logins/new_user', [SpareLogin::class, 'new_user'])->name('logins.new_user');

// //This is for Create_User ADMIN will create it my boy   
// Route::get('/logins/create_user', [SpareLogin::class, 'create_user'])->name('logins.create_user');



// //END OF LOGIN ROUTES

// //Maintenance ROUTE
// Route::get('/maintenance/account_manage', [SpareMaintenance::class, 'account_log'])->name('maintenance.account_manage');

// //OTP ROUTE

// // Send OTP route
// Route::post('/maintenance/send-otp', [OtpController::class, 'sendOtp'])->name('send.otp');

// // Verify OTP route
// Route::post('/maintenance/verify-otp', [OtpController::class, 'verifyOtp'])->name('verify.otp');

// //Route for Account Table
// Route::get('/account_manage', [SpareMaintenance::class, 'showAccounts'])->name('accounts.manage');

// //Toggle in Account Management
// Route::post('/account/{id}/toggle', [SpareMaintenance::class, 'toggleStatus'])->name('accounts.toggle');
