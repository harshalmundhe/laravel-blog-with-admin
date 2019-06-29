<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\LikeController;

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
        }
    }
}
