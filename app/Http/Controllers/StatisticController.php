<?php

namespace App\Http\Controllers;

use App\Models\Obligatory;
use App\Models\Subscription;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function get(Request $request)
    {

        $startDate = Carbon::createFromFormat('m/d/Y', $request['date_from'])->format('Y-m-d');
        $endDate = Carbon::createFromFormat('m/d/Y', $request['date_to'])->format('Y-m-d');
    
        // Query transactions
        $transactions = Transaction::whereBetween('date', [$startDate, $endDate])->get();
    
        // Query subscriptions
        $subscriptions = Subscription::whereBetween('date_from', [$startDate, $endDate])->get();
    
        $expenses = $transactions->merge($subscriptions);
        // Return the results
        return response()->json($expenses, 200);

    }
}
