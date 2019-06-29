@extends("layouts.app")
@section("content")

        

<section id="blog">
        <div class="center">
            <h2>Blogs</h2>
            <p class="lead">The Best Business Blogs Every Entrepreneur Should Be Reading</p>
        </div>

        <div class="blog">
            <div class="row">
                 <div class="col-md-8">
                    @if(count($posts)>0)
                    @foreach($posts as $post)
                    <div class="blog-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-2 text-center">
                                <div class="entry-meta">
                                    
                                    <span id="publish_date">{{ date('F jS \\a\\t g:ia', strtotime($post->created_at)) }}</span>
                                    <span><i class="fa fa-user"></i> <a href="#">{{ucfirst($post->user->name)}}</a></span>
                                    <span><i class="fa fa-comment"></i> <a href="blog-item.html#comments">{{ $lc_arr[$post->id]['comment_count'] }} Comments</a></span>
                                    <span><i class="fa fa-heart"></i><a href="#">{{ $lc_arr[$post->id]['like_count'] }} Likes</a></span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-10 blog-content">
                                <a href="/posts/{{$post->slug}}"><img class="img-responsive img-blog" src="/storage/cover_images/{{$post->cover_image}}" width="100%" alt="" /></a>
                                <h2><a href="/posts/{{$post->slug}}">{{$post->title}}</a></h2>
                                <h3>{{$post->excerpt}}...</h3>
                                <a class="btn btn-primary readmore" href="/posts/{{$post->slug}}">Read More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>    
                    </div><!--/.blog-item-->
                    @endforeach
                        {{$posts->links()}}
                    @else
                        <p>No Posts Found</p>
                    @endif    
                </div><!--/.col-md-8-->

                
                @include("inc.blog-sidebar")
    			
            </div><!--/.row-->
        </div>
    </section><!--/#blog-->


@endsection