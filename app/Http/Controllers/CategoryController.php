<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use DB;
use App\Http\Controllers\PostsController;

class CategoryController extends Controller
{
    public function getTopCategoryWithCount($limit = 5){
        $cat_count_arr = [];        
        $cat_count_arr = DB::select("SELECT c.id,p.`category`,c.category,COUNT(p.id) as count FROM `posts` p join categories c on p.category=c.id WHERE `deleted_at` is null GROUP by p.category order by count desc limit ".$limit);
        return $cat_count_arr;
    }
    
    public function showPost($cat_id){
        $PostController = new PostsController();
        $sidebardata = $PostController->getSidebarData();
        $posts = Post::where("category",$cat_id)->get();
        $category = Category::find($cat_id);
        return view("posts.category")->with(["posts"=>$posts,"category"=>$category,'sidebardata'=>$sidebardata]);
    }
}
