<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


   public function getAll(){
       $user= new \App\Models\User();
       foreach(User::all() as $user){
           echo $user->firstname;
       }
   }

}
