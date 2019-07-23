<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\FollowController;

class AjaxController extends Controller
{
    public function index($function){
        switch($function){
            case 'userlikes':
                LikeController::like();
            break;
            case 'userunlikes':
                LikeController::unlike();
            break;
            case 'userfollow':
                FollowController::userfollow();
            break;
            case 'userunfollow':
                FollowController::userunfollow();
            break;
        }
    }
}
