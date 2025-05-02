<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class primary extends Controller
{
    public function index()
    {
        return view('primary.index');
    }
}
