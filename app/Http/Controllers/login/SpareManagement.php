<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpareManagement extends Controller
{
    // 
    public function index()
    {
        //This session is basically the bootleg middleware
        if (!session()->has('user')) {
            return redirect('/logins/login');
        }
        return view('spares.sparesTable');
    }

    public function pendingTicket(){
        if (!session()->has('user')) {
            return redirect('/logins/login');
        }
        return view('spares.pendingTicket');
    }

    public function createTicket(){
        if (!session()->has('user')) {
            return redirect('/logins/login');
        }
        return view('spares.createTicket');
    }
}
