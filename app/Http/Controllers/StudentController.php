<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\table_student;

class StudentController extends Controller
{
    // public function showUserData(){
    //     $users = DB::table('table_student')->simplePaginate(5);
    //     return view('allUserfs',['data'=>$users]);
    // }
    public function Users(){
        // $users = DB::table('table_student')
        // ->orderBy('id','desc')
        // ->simplePaginate(5);
        // return view('allUserfs',['data'=>$users]);
        $users = table_student::
        orderBy('id','desc')
        ->simplePaginate(1);
        return view('allUserfs',Compact('users'));
    }

    // form show
    public function showForm(){
        return view('newuser');
    }

    // insert data
    public function addUser(Request $request){
        $user = DB::table('table_student')->insert([
            'name' => $request->name_f,
            'email' => $request->email_f,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        if($user){
                $users = table_student::all();
                return view('allUserfs', compact('users'));
            }else{
                return "Data Insertion Failed";
            }
    }

    public function editUser($id){
        $user = DB::table('table_student')->where('id',$id)->first();
        return view('editUser',Compact('user'));
    }

    public function updateUser(Request $request, $id){
        $user = DB::table('table_student')
            ->where('id', $id)
            ->update([
                'name' => $request->name_f,
                'email' => $request->email_f,
                'updated_at' => now()
            ]);

        return redirect('/allUserfs');
    }

    public function deleteUser($id){
        $user = DB::table('table_student')
        ->where('id',$id)
        ->delete();
        if($user){
             $users = table_student::all();
             return view('allUserfs', compact('users'));
         }else{
             return "Data Deletion Failed";
         }
    }
    public function singleview($id){
        $user = DB::table('table_student')->where('id',$id)->first();
        return view('details',Compact('user'));
    }
}
//    public function addUser(){
//         $student = DB::table('table_student')->insert([
//             'name' => 'SAHIL BENIWAL',
//             'email' => 'skb.beniwal.7s3@gmail.com',
//             'created_at' => now(),
//             'updated_at' => now()
//         ]);
//         if($student){
//             return "Data Inserted Successfully";
//         }else{
//             return "Data Insertion Failed";
//         }
//    }
