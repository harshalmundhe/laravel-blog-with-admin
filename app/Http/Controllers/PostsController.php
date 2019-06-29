<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Config;
use App\Post;
use App\Category;
use App\Tag;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use DB;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show','searchPost']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $sidebardata = $this->getSidebarData();
        
        //$posts =  Post::all(); //get all
        //$posts = Post::orderBy('title','desc')->get(); // order by
        //$posts = Post::where('title','Test Post 2')->get(); //where clause
        //$posts = DB::select('SELECT * FROM posts'); //with query
        //$posts = Post::orderBy('title','desc')->take(2)->get(); //limit
        $posts = Post::orderBy('created_at','desc')->paginate(10); //pagination
        $all_data = DB::select('select p.id,b.like_count,c.comment_count from posts p left join (SELECT post_id,count(id) as like_count FROM user_likes group by post_id) b on (p.id = b.post_id)  left join (SELECT post_id,count(id)  as comment_count FROM comments WHERE approved is true and parent_id is null group by post_id) c on (c.post_id=p.id)'); //with query
        $lc_arr = array();
        foreach($all_data as $data){
            $lc_arr[$data->id]['like_count'] = isset($data->like_count)?$data->like_count:0;
            $lc_arr[$data->id]['comment_count'] = isset($data->comment_count)?$data->comment_count:0;
        }
        
        return view("posts.index")->with(['posts'=>$posts,'lc_arr'=>$lc_arr,'sidebardata'=>$sidebardata]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('category','id');
        return view("posts.create")->with("categories",$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required',
            'cover_image'=>'image|nullable|max:1999'
        ]);
        
        if($request->hasfile('cover_image')){
            
            $filenamewithext = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenamewithext,PATHINFO_FILENAME);
            
            $ext = $request->file('cover_image')->getClientOriginalExtension();
            
            $filenametostore = $filename."_".time().".".$ext;
            
            $path = $request->file('cover_image')->storeAs('public/cover_images',$filenametostore);
        }else{
            $filenametostore = "noimage.jpg";
        }
        
        
        $excerpt = substr(strip_tags($request->input('body')),0,200);
        
        
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $filenametostore;
        $post->excerpt = $excerpt;
        $post->category = $request->input('category');
        $post->slug = str_slug($request->input('title'),'-');
        $post->likes = 0;
        
        $post->save();
        
        return redirect('posts')->with('success','Post Created');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $sidebardata = $this->getSidebarData();
        $post =  Post::where('slug',$slug)->first();
        if($post){
            
            $categories_arr = Category::all();
            foreach($categories_arr as $category){
                $categories[$category->id] = $category->category;
            }
    
            $CommentController = new CommentController();
            $all_comments = $CommentController->getAllComments($post->id);
            
            $likeController = new LikeController();
            $liked = $likeController->isLiked($post->id);
            
            $like_count = $likeController->getLikeCount($post->id);
            
            $tagConroller = new TagController();
            $tags = Post::find($post->id)->tag;
            
            return view("posts.show")->with(['post'=>$post,'comments'=>$all_comments,'liked'=>$liked,'like_count'=>$like_count,'categories'=>$categories,'sidebardata'=>$sidebardata,'tags'=>$tags]);
        }else{
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::pluck('category','id');
        $post =  Post::find($id);
        
        if(auth()->user()->id != $post->user_id){
            return redirect('/posts')->with("error","Unauthoized access");
        }
        return view("posts.edit")->with(['post'=>$post,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required'
        ]);
        $filenametostore = "";
        
        if($request->hasfile('cover_image')){
            
            $filenamewithext = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenamewithext,PATHINFO_FILENAME);
            
            $ext = $request->file('cover_image')->getClientOriginalExtension();
            
            $filenametostore = $filename."_".time().".".$ext;
            
            $path = $request->file('cover_image')->storeAs('public/cover_images',$filenametostore);
        }
        
        $excerpt = substr(strip_tags($request->input('body')),0,200);
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->excerpt = $excerpt;
        $post->category = $request->input('category');
        $post->slug = str_slug($request->input('title'),'-');
        if($filenametostore!=""){
            $post->cover_image = $filenametostore;
        }
        $post->save();
        
        return redirect('posts')->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id != $post->user_id){
            return redirect('/posts')->with("error","Unauthoized access");
        }
        $post->delete();
        Storage::delete('public/cover_images/'.$post->cover_image);
        
        return redirect('posts')->with('success','Post Deleted');
    }
    
    
    public function getSidebarData(){
        $data = [];
        $Category = new CategoryController();
        $categories = $Category->getTopCategoryWithCount(Config::get('site-setting.category_count'));
        
        $Comment = new CommentController();
        $recent_comments = $Comment->getRecentComments(Config::get('site-setting.recent_comment_count'));
        
        $data['recent_comments'] = $recent_comments;
        $data['categories'] = $categories;
        $data['archieves'] = $this->getPostsArchieve(Config::get('site-setting.archieve_data_count'));
        $data['tags'] = Tag::inRandomOrder()->take(20)->get();
        return $data;
    }
    
    
    public function getPostsArchieve($limit=5){
        
        $archieve_data = DB::select("select * from (SELECT DISTINCT(year(created_at)) as year,count(id) as count FROM `posts` WHERE deleted_at is null GROUP by year order by year desc) foo where year!=year(CURRENT_DATE) LIMIT ".$limit);
        
        return $archieve_data;
    }
    
    public function showArchievePost($year){
        $posts = Post::whereYear('created_at','2018')->get();
        $sidebardata = $this->getSidebarData();
        
        return view("posts.archieve")->with(['year'=>$year,'posts'=>$posts,'sidebardata'=>$sidebardata]);
    }
    
    
    public function searchPost(Request $request){
        $search = $request->input('search_box');
        $posts = Post::where('title', 'like', '%'.$search.'%')->get();
        $sidebardata = $this->getSidebarData();
        
        return view("posts.search")->with(['search'=>$search,'posts'=>$posts,'sidebardata'=> $sidebardata]);
    }
    
}
