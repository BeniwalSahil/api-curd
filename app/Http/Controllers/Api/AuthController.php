<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;



class AuthController extends Controller
{
    // Register
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'mobile' => 'required'
        ]);

        $otp = rand(10000,30000);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'  => Hash::make($request->password),
            'mobile' => $request->mobile,
            'otp' => $otp
        ]);


        // Send OTP via Fast2SMS
        $response = Http::withHeaders([
            'aut    horization' => env('FAST2SMS_API_KEY'),
            'accept' => 'application/json',
        ])->post('https://www.fast2sms.com/dev/bulkV2',[
            'route' => 'q',
            'message' => 'Your OTP is '.$otp,
            'language' => 'english',
            'numbers' => $request->mobile
        ]);

        return response()->json([
            'status' => true,
            'message' => 'OTP Sent on Mobile',
            'debug' => $response->json()
        ]);

        // Mail::raw("Your OTP is:" . $otp , function($message) use ($user){
        //     $message->to($user->email)
        //     ->subject('Your OTP Code');
        // });

        // $token = $user->createToken('auth_token')->plainTextToken;
        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'User Registered Successfully',
        //     'access_token' => $token
        // ]);
    }

    // verfiy otp
    public function verifyOtp(Request $request){

        $user = User::where('mobile', $request->mobile)
        ->where('otp',$request->otp)
        ->first();

        if(!$user){
            return response()->json([
                'status' => false,
                'message' => 'Invalid OTP'
            ]);
        }

        $user->update([
            'otp' => null,
            'is_verified' => 1
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Mobile verified'
        ]);

        // $request->validate([
        //     'email' => 'required',
        //     'otp' => 'required'
        // ]);

        // $user = User::where('email',$request->email)
        // ->where('otp',$request->otp)
        // ->first();

        // if(!$user){
        //     return response()->json([
        //         'status ' => false,
        //         'message' => 'Invalid OTP'
        //     ]);
        // }

        // $user->update([
        //     'otp' => true,
        //     'is_verified' => 1
        // ]);

        // $token = $user->createToken('auth_token')->plainTextToken;

        // return response()->json([
        //     'status' => true,
        //     'message' => 'Account Verified',
        //     'token' => $token
        // ]);
    }


    // login
    public function login(Request $request){
       if(!Auth::attempt($request->only('email','password'))){
        return response()->json([
            'status' => false,
            'message' => 'Invalid Email or Password'
        ],401);
       }
       $user = User::where('email',$request->email)->firstOrFail();
       $token = $user->createToken('auth_token')->plainTextToken;
       return response()->json([
        'status' => true,
        'message' => 'User Logged In Successfully',
        'access_token' => $token
       ]);
    }

    // logout
    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return response()->json([
            'status' => true,
            'message' => 'User Logged Out Successfully'
        ]);
    }
}
