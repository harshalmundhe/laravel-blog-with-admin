<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;

class LikeController extends Controller
{
    static function like(){
        $ip =  \Request::ip();
        $likes = new Like;
        $likes->ip = $ip;
        $likes->post_id = \Request::get('post');
        if(\Request::get('comment_id')){
            $likes->comment_id = \Request::get('comment_id');
        }
        $likes->save();
    }
    static function unlike(){
        $ip =  \Request::ip();
        $likes = new Like;
        $post_id = \Request::get('post');
        $comment_id = null;
        if(\Request::get('comment_id')){
            $comment_id = \Request::get('comment_id');
        }
        $likes = Like::where(['ip'=>$ip,'post_id'=>$post_id,'comment_id'=>$comment_id]);
        $likes->delete();
    }
    
    static function isLiked($post_id,$comment_id=null){
        $ip =  \Request::ip();
        $likes = new Like;
        
        $likes = Like::where(['ip'=>$ip,'post_id'=>$post_id,'comment_id'=>$comment_id])->get()->count();
        
        if($likes){
            return true;
        }else{
            return false;
        }
        
    }
    
    static function getLikeCount($post_id,$comment_id = null){
        $count = Like::where(['post_id'=>$post_id,'comment_id'=>$comment_id])->get()->count();
        return $count;
    }
}
