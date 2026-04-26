<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function add(Request $request){
        $user = auth()->user();

        $exists = Wishlist::where('user_id',$user_id)
        ->where('product_id',$request->product_id)
        ->first();

        if($exists){
            return response()->json([
                'status' => false,
                'message' => 'Already in wishlist'
            ]);
        }

        Wishlist::create([
            'user_id' => $user_id,
            'product_id' => $request->product_id
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Added to Wishlist'
        ]);

    }

    //remove


    public function remove(){
        Wishlist::where('user_id',$user_id)
        ->where('product_id', $request->product_id)
        ->first();

        return response()->json([
            'status' => true,
            'message' => 'Removed From Wishlist '
        ]);
    }
 
        // list
        public function list(){
            $wishlist = Wishlist::where('user_id',auth()->id())
            ->with('product')
            ->get();
            return response()->json($wishlist);
        }
}
