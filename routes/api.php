<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ObligatoryController;
use App\Http\Controllers\PiggyBankController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/signup', [AuthController::class, 'createAccount']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/transactions', [TransactionController::class,'getAllTransactions'])->middleware('auth:sanctum');
Route::post('/updateTransactions', [TransactionController::class,'update'])->middleware('auth:sanctum');
Route::delete('/deleteTransaction/{id}', [TransactionController::class,'destroy'])->middleware('auth:sanctum');
Route::get('/piggy', [PiggyBankController::class,'getPiggy'])->middleware('auth:sanctum');
Route::post('/editPiggy', [PiggyBankController::class,'editPiggy'])->middleware('auth:sanctum');
Route::post('/addMoney', [PiggyBankController::class,'addMoney'])->middleware('auth:sanctum');
Route::delete('/crashPiggy/{id}', [PiggyBankController::class,'destroy'])->middleware('auth:sanctum');

Route::get('/account', [AccountController::class,'get'])->middleware('auth:sanctum');
Route::post('/editAccount', [AccountController::class,'editAccount'])->middleware('auth:sanctum');
Route::get('/subscription', [SubscriptionController::class,'get'])->middleware('auth:sanctum');
Route::post('/editSubscription', [SubscriptionController::class,'edit'])->middleware('auth:sanctum');
Route::get('/obligatory', [ObligatoryController::class,'get'])->middleware('auth:sanctum');
Route::post('/editObligatory', [ObligatoryController::class,'edit'])->middleware('auth:sanctum');

Route::post('/statistics', [StatisticController::class, 'get'])->middleware('auth:sanctum');