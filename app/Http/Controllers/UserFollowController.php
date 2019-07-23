<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserFollow;

class UserFollowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function userfollow(){
        $userfollow = new UserFollow;
        $userfollow->followee_id = \Request::get('followee');
        $userfollow->follower_id = auth()->user()->id;
        $userfollow->save();
    }
    
    public function userunfollow(){
        $userunfollow = UserFollow::where(['followee_id'=>\Request::get('id'),'follower_id'=>auth()->user()->id]);
        $userunfollow->delete();
    }
}
