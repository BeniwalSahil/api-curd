<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\StudentController;
// use App\Http\Controllers\PageController;
// use App\Http\Controllers\ProvisionServer;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\AuthController;

Route::get('/register',function(){
    return view('register');
});
Route::get('login',function(){
    return view('login');
});

Route::get('/index',[ProductController::class,'index']);
Route::resource('products',ProductController::class);

Route::get('/newuser',[UserController::class,'showuserform']);
Route::post('/newuser',[UserController::class,'CreateUser'])->name('newuser');
Route::get('/allUserfs',[UserController::class,'showUserData']);
Route::get('/editUser/{id}',[UserController::class,'editUser'])->name('editUser');
Route::post('/updateUser/{id}',[UserController::class,'getUpdate'])->name('updateUser');
Route::get('/deeleteUser/{id}',[UserController::class,'deleteUser'])->name('deleteUser');
Route::get('/details/{id}',[UserController::class,'SingleView'])->name('routeDetails');

// Route::get('/newuser',[StudentController::class,'showForm']);
// Route::post('/newuser',[StudentController::class,'addUser'])->name('newuser');

// Route::get('/allUserfs',[StudentController::class,'Users']);
// Route::get('/editUser/{id}',[StudentController::class,'editUser'])->name('editUser');
// Route::POST('/updateUser/{id}',[StudentController::class,'updateUser'])->name('updateUser');
// Route::get('/deleteUser/{id}',[StudentController::class,'deleteUser'])->name('deleteUser');
// Route::get('/details/{id}',[StudentController::class,'singleview'])->name('routeDetails');

// Route::get('/provision-server',[ProvisionServer::class,'__invoke']);

// Route::get('/blog',[PageController::class,'blog']);
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home',[PageController::class,'home']);
// Route::get('/about',[PageController::class,'about']);
