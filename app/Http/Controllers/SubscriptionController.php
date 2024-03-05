<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function get()
    {
        $subscriptions = Subscription::all();
        foreach ($subscriptions as $subscription) {
            $subscription->category = json_decode($subscription->category);
        }
        return response()->json(['subscriptions' => $subscriptions], 201);
    }
    public function edit(Request $request)
    {
        $id = $request['id'];
        $subscription = Subscription::find($id);
    
        if (!$subscription) {
            return response()->json(['error' => 'not found'], 404);
        }
    
        $subscription->title = $request['title'];
        $subscription->category = json_encode($request['category']);
        $subscription->amount = (int)$request['amount'];
        $subscription->description = $request['description'];
        $subscription->date_to = $request['date_to'];
        $subscription->date_from = $request['date_from'];
        $subscription->save();
        $subscription->category = json_decode($subscription->category);

    
        return response()->json($subscription, 200);
    }
}
