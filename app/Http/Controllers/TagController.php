<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Post;
use DB;
use App\Http\Controllers\PostsController;

class TagController extends Controller
{
    
    public function showPost($tag_id){
        $PostController = new PostsController();
        $sidebardata = $PostController->getSidebarData();
        $posts = $this->getAllPostsForTag($tag_id);
        $tag = Tag::find($tag_id);
        $all_data = DB::select('select p.id,b.like_count,c.comment_count from posts p left join (SELECT post_id,count(id) as like_count FROM user_likes group by post_id) b on (p.id = b.post_id)  left join (SELECT post_id,count(id)  as comment_count FROM comments WHERE approved is true and parent_id is null group by post_id) c on (c.post_id=p.id)'); //with query
        $lc_arr = array();
        foreach($all_data as $data){
            $lc_arr[$data->id]['like_count'] = isset($data->like_count)?$data->like_count:0;
            $lc_arr[$data->id]['comment_count'] = isset($data->comment_count)?$data->comment_count:0;
        }
        
        
        return view("posts.tag")->with(['tag'=>$tag,'posts'=>$posts,'lc_arr'=>$lc_arr,'sidebardata'=>$sidebardata]);
    }
    
    public function getAllPostsForTag($tag_id){
        //return App\Tag::with('post')->where('id',$tag_id)->get();
        return Tag::find($tag_id)->post;
    }
    
}
