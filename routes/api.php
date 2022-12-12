<?php

use App\Events\WhenAccountIsUpdated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('accounts', \App\Http\Controllers\AccountsController::class);

Route::get('/test-broadcast', function (Request $request) {
    $account = \App\Models\Accounts::all()->first();
//    dd($account);
    event(new WhenAccountIsUpdated($account));
    return response()->json((object)["messages" => "success"]);
});
