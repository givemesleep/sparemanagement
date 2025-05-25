<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveAuditorRequest;
use Illuminate\Http\Request;
use App\Models\backlog;
use app\Models\auditor;

class BacklogController extends Controller
{
        public function backlog(){
        return view('sparesinfo_backlog');

        }

        public function store(SaveAuditorRequest $request) {
        $auditor = auditor::create($request->validated());
        return redirect()->route('sparesinfo_backlog', $auditor);
        // ->with('status', 'Product created');
       }
    }
