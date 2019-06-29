<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class UserAccountController extends Controller
{
    public function index(){
        $user_id = auth()->user()->id;
        $user_details =  User::find($user_id);
        
        
        
        $data = array(
            "title" => "My Account",
            "user_details" => $user_details,
            
        );
        return view("myaccount")->with($data);
    }
    
    public function showPublicProfile($user_id){
        //$data =  User::find($user_id)->join("user_details")->get();
        $data = DB::table('users')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->where('users.id',$user_id)
            ->get();
        
        if(isset($data[0])){
            return view("profile")->with(['profile'=>$data[0]]);
        }else{
           return error(404); 
        }
        
    }
}
