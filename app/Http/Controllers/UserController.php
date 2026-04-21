<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\table_student;
class UserController extends Controller
{
    public function showUserData(){
        $alluser = table_student::
        orderBy('id','desc')
        ->simplepaginate(5);
        return view('allUserfs',Compact('alluser'));
        // $alluser = DB::table('table_student')->get();
        // return view('allUserfs',Compact('alluser'));
    }
    public function showuserform(){
        return view('newuser');
    }
    public function CreateUser(Request $request){
        $allUser = DB::table('table_student')->insert([
            'name' => $request->name_f,
            'email'=> $request->email_f,
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
        return response()->json($allUser);
    }

    public function editUser($id){
        $allUser = DB::table('table_student')->where('id',$id)->first();
        return view('editUser',Compact('allUser'));
    }

    public function getUpdate(Request $request,$id){
        $updateUser = DB::table('table_student')
        ->where('id',$id)
        ->update([
            'name'=>$request->name_f,
            'email'=>$request->email_f,
            'updated_at'=>now()
        ]);
        return response()->json($updateUser);
    }

    public function deleteUser($id){
        $deleeteUser = DB::table('table_student')->where('id',$id)->delete();
        return response()->json($deleeteUser);
    }
    // public function showUserData(){
    //     $user = DB::table('table_student')->get();
    //     return response()->json($user);
    // }

    public function SingleView($id){
        $singleuser = DB::table('table_student')->where('id',$id)->first();
        return view('details',Compact('singleuser'));

    }
}
