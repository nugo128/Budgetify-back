<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function getAllTransactions()
    {
        $transactions = Transaction::all();
        foreach ($transactions as $transaction) {
            $transaction->category = json_decode($transaction->category);
        }
        return response()->json(['transactions' => $transactions], 201);
    }
    public function update(Request $request)
    {
        $id = $request['id'];
        $transaction = Transaction::find($id);
    
        if (!$transaction) {
            return response()->json(['error' => 'Transaction not found'], 404);
        }
    
        $transaction->title = $request['title'];
        $transaction->category = json_encode($request['category']);
        $transaction->amount = (int)$request['amount'];
        $transaction->author = $request['author'];
        $transaction->description = $request['description'];
        $transaction->transaction_type = $request['transaction_type'];
        $transaction->date = $request['date'];
        $transaction->save();
        $transaction->category = json_decode($transaction->category);

    
        return response()->json($transaction, 200);
    }
    public function destroy($id)
	{
		$transaction = Transaction::find($id);
		$transaction->delete();

		return response()->json(['message' => 'Transaction deleted successfully']);
	}
    
}
