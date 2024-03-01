<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\PiggyBank;
use Illuminate\Http\Request;

class PiggyBankController extends Controller
{
    public function getPiggy()
    {
        $piggy = PiggyBank::all();
        return response()->json(['piggy' => $piggy], 201);
    }
    public function editPiggy(Request $request)
    {
        $id = $request['id'];
        $piggy = PiggyBank::find($id);
        
        $piggy->goal = $request['goal'];
        $piggy->goal_amount = $request['goal_amount'];
        $piggy->save();
    
        return response()->json($piggy, 200);
    }

    public function addMoney(Request $request)
    {
        $id = $request['id'];
        $piggy = PiggyBank::find($id);
        
        $piggy->saved_amount = $request['saved_amount'];
        $piggy->date = $request['date'];
        $piggy->save();
    
        return response()->json($piggy, 200);
    }

    public function destroy($id)
	{
		$piggy = PiggyBank::find($id);
        $account = Account::find(1);
        $accountBalance = $account->balance;
        $accountBalance += $piggy->saved_amount;
        $account->balance = $accountBalance;
        $account->save();
		$piggy->delete();

		return response()->json(['message' => 'piggy bank crashed successfully']);
	}
}
