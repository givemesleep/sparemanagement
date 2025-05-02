<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class SpareMaintenance extends Controller
{
    
public function showAccounts()
{
    if (!session()->has('user')) {
        return redirect('/logins/login');
    }
    $accounts = Account::all();
    return view('maintenance.account_manage', compact('accounts'));
}

public function toggleStatus(Request $request, $id)
{
    $account = Account::findOrFail($id);
    $account->is_active = $request->has('is_active'); // checkbox returns true if checked
    $account->save();

    return redirect()->back()->with('success', 'User status updated.');
}




}
