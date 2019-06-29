<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\ReCaptcha;
use App\Comment;
use DB;

class CommentController extends Controller
{
    public function store(Request $request)
    {
    	$request->validate([
            'body'=>'required',
            'name'=>'required',
            'email'=>'required|email',
            'g-recaptcha-response'=>['required',new ReCaptcha]
        ]);
        
        $comment = new Comment;
        $comment->name = $request->input('name');
        $comment->post_id = $request->input('post_id');
        $comment->body = $request->input('body');
        $comment->email = $request->input('email');
        $comment->save();
        
        return back()->with('success', 'Comment submitted awaiting admin approval');
    }
    
    public function getAllComments($post_id){
        
        if(!is_numeric($post_id)) return '';
        
        $all_comments =  Comment::where(['post_id'=>$post_id,'approved'=>true])->get();
        
        return $all_comments;
        
    }
    
    public function getRecentComments($limit=5){
        $recent_comments = [];
        
        $recent_comments = DB::select("SELECT c.`body`,p.title,p.slug,u.name,c.user_id FROM `comments` c join `posts` p on (p.id= c.post_id) left join users u on (c.user_id = u.id) WHERE c.`deleted_at` is null and c.`approved` is true and p.`deleted_at` is null ORDER by c.`created_at` desc LIMIT ".$limit);
        
        return $recent_comments;
    }
}
