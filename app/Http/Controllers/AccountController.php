<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function get()
    {
        $acc = Account::all();
        return response()->json(['accounts' => $acc], 201);
    }
    public function editAccount(Request $request)
    {
        $id = $request['id'];
        $account = Account::find($id);
        $account->title = $request['title'];
        $account->currency = $request['currency'];
        $account->description = $request['description'];
        $account->save();
    
        return response()->json($account, 200);
    }
}
