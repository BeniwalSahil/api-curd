<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Models\Photo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = DB::table('student_table')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'mobile' => $request->mobile,
            'email' => $request->email
        ]);
        if($user){
            $user = table_student::all();
            return redirect('allUserfs');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhotoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        return view('allUserfs', Compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo , $id)
    {
        $user = DB::table('student_table')->where(
            'id', $id)->first();
        return view('editUser',Compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhotoRequest $request, Photo $photo,$id)
    {
        $user  = DB::table('student_table')->where('id',$id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'updated_at' => now()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo,$id)
    {
        $user = DB::table('student_table')->where('id',$id)->delete();
        if($user){
            $user = table_student::all();
            return view('allUserfs',Compact('user'));
        }
    }
    public function singleview(Request $request, $id){
        $user = DB::table('student_table')->where('id',$id)->first();
        return view('details',Compact('user
        '));
    }
}
