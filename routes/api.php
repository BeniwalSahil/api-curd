<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ProductController;

Route::post('/register',[AuthController::class,'register']);
Route::post('/verify-otp',[AuthController::class,'verifyOtp']);
Route::post('/login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout',[AuthController::class,'logout']);
});



Route::apiResource('products',ProductController::class);

// Route::get('/',[App\Http\Controllers\APIController::class,'getUser']);
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


// Route::get('/test',function(){
//     return response()->json([['name' => 'Sahil Beniwal']]);
// });


// Route::any('/',function(){
//     return response()->json(['name'=> 'SAHIL BENIWAL']);
// });
