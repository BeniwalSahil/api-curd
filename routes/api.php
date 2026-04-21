<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

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