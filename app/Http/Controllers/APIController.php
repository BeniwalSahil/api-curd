<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class APIController extends Controller
{
   public function getUser(){
    $data = Http::get('https://jsonplaceholder.typicode.com/users');
    return response()->json($data->json());
   }
}