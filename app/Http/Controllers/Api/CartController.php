<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    //add to cart
    public function add(Request $request){
        $user = auth()->user();

        $cart = Cart::where('user_id',$user->id)
        ->where('product_id',$request->product_id)
        ->first();

        if($cart){
           $cart->increment('quantity');
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $request->product_id,
                'quantity' => 1
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Added To Cart'
        ]);

    }

    public function update(Request $request){
        Cart::where('user_id',auth()->id())
        ->where('product_id',$request->product_id)
        ->update(['quantity'=>$request->quantity]);

        return response()->json([
            'status'=>true,
            'message'=>'Cart updated'
        ]);
    }

    // remove item

    public function remove(Request $request){
        Cart::where('user_id',auth()->id())
        ->where('product_id',$request->product_id)
        ->delete();

         return response()->json([
            'status'=>true,
            'message'=>'Item removed'
        ]);
    }

    // list

    public function list(){
        $cart = Cart::where('user_id',auth()->id())
        ->with('product')
        ->get();

        return response()->json($cart);
    }
}
