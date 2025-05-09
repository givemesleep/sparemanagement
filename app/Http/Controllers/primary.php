<?php

namespace App\Http\Controllers;

use App\Models\SpareManagement\SpareTicket;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class primary extends Controller
{
    public function index()
    {

        $Approved = DB::table('tblsparesinfo')
        ->where('is_approved', 1)
        ->where('is_active', 1)
        ->where('is_pullout', 0)
        ->where('is_defect', 0)
        ->count();

        $PullOut = DB::table('tblsparesinfo')
        ->where('is_pullout', 1)
        ->where('is_approved', 0)
        ->where('is_active', 1)
        ->where('is_defect', 0)
        ->count();

        $Defect = DB::table('tblsparesinfo')
        ->where('is_defect', 1)
        ->where('is_active', 1)
        ->where('is_pullout', 0)
        ->where('is_approved', 0)
        ->count();

        $Archive = DB::table('tblsparesinfo')
        ->where('is_active', 0)
        ->where('is_pullout', 0)
        ->where('is_defect', 0)
        ->where('is_approved', 0)
        ->count();

        //Must be Limit at 5, and order by newest
        $Recent = DB::table('tblsparesinfo')
        ->where('is_active', 1)
        ->where('is_pullout', 0)
        ->where('is_defect', 0)
        ->where('is_approved', 1)
        ->limit(5)
        ->orderBy('created_at', 'desc')
        ->get();

        return view('primary.index', [
            'Approved' => $Approved,
            'PullOut' => $PullOut,
            'Defect' => $Defect,
            'Archive' => $Archive,
            'Recent' => $Recent
        
        ]);
        
    }

    public function landingPage(){
        return view('primary.landing');
    }
}
