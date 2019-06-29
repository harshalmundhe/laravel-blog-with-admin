<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class SettingsController extends Controller
{
    public function index(){
        
        $user_id = auth()->user()->id;
        $user_details =  User::find($user_id);
        
        
        
        $data = array(
            "title" => "Account Settings",
            "user_details" => $user_details,
            
        );
        return view("settings")->with($data);
    }
    
    
    public function update(){
        
    }
}
