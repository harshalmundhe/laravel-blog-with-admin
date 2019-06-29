@extends("layouts.app")
@section('title')
    {{$post->title}}
@endsection

@section("include_js")
    <script src="{{ asset('js/jssocials.min.js') }}"></script>
    <script>
        $("#share").jsSocials({
            shares: ["email", "twitter", "facebook", "linkedin",  "whatsapp"],
            showLabel: false,
        });
    </script>
@endsection

@section("include_css")
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jssocials.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jssocials-theme-flat.css') }}" />
@endsection

@section("content")
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <p class='pt-3'>
    <a href="/posts" class="btn btn-info"><i class='fa fa-arrow-left'></i> Back</a>
    </p>
    <section id="blog">
    <div class="blog">
            <div class="row">
                 <div class="col-md-8">
                    
                    <div class="container">
                    <img src="/storage/cover_images/{{$post->cover_image}}" style="width:100%">
                    
                    <h2>{{$post->title}}</h2>
                    <div class="row">
                    <div class='col-md-6'>
                    <small><strong>Created At:</strong> {{$post->created_at}}
                    <br>
                    <strong>Author:</strong> {{$post->user->name}}</small>
                    <br>
                    <strong>Category:</strong> {{$categories[$post->category]}}
                    <br>
                    <strong>Tags:</strong> 
                    @foreach($tags as $tag)
                        <button><a href="tag/{{ $tag->id}}">{{ ucfirst($tag->name) }}</a></button>
                    @endforeach
                    </small></div>
                    
                    <div class='col-md-6'>
                        <a href="javascript:void(0);" class='btn float-right likebtn' data-post_id="{{ $post->id }}"
                        data-action="{{ $liked==false?'like':'unlike' }}"
                        ><i class='fa {{ $liked!=false?'text-success':'' }} fa-thumbs-up likethumb'></i> <span class='likecount'>{{$like_count}}</span></a>
                    </div>
                    </div>
                    <br>
                    <div class='post-body'>
                    {!! $post->body !!}</div>
                     <div id="share"></div>
                    <hr>
                    @if(!Auth::guest())
                        @if(Auth::user()->id == $post->user_id)
                            <div class="row">
                            <div class="col-md-6">
                            <a href="/posts/{{$post->id}}/edit" class="btn btn-info"><i class='fa fa-pencil'></i> Edit</a>
                            </div>
                            <div class="col-md-6">    
                            {!! Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST']) !!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete',['class'=>'btn btn-danger float-right'])}}
                            {!! Form::close() !!}
                            </div>
                            </div>
                            <br clear="all">
                        @endif
                    @endif
                    <hr>
                    </div>
                    <div class="container">
                    <h3>Latest Comments</h3>
                    
                       <ul class="list-group">
                        @foreach($comments as $comment_arr)
                        <li class="list-group-item">    
                        
                            <div class="media">
                            <a class="media-left" href="#">
                              <img class="rounded-circle smallimg" src="images/blog/avatar3.png">
                            </a>
                            <div class="commentbody media-body">
                              <h4 class="media-heading user_name">{{ $comment_arr->name }}</h4>
                              <p>{!! nl2br(e($comment_arr->body)) !!}
                              
                              <br>
                            <small><a href="">Like</a></small></p>
                            </div>
                          </div>
                        </li>
                        @endforeach
                        </ul>
                        </div>
                        <div class="container">
                    <h3>Add New Comments</h3>
                        
                        {!! Form::open(['action'=>['CommentController@store'],'method'=>'POST']) !!}
                        <input type='hidden' name='post_id' value='{{ $post->id }}'>
                        
                        <div class='panel'>
                            <div class='panel-body'>
                                <div class="form-group">
                                {{Form::label('name','Name')}}
                                @if(Auth::guest())
                                {{ Form::text('name','',['placeholder'=>'Name','class'=>'form-control']) }}
                                @else
                                {{ Form::text('name',Auth::user()->name,['placeholder'=>'Name','class'=>'form-control','readonly'=>'readonly']) }}
                                @endif
                                </div>
                                <div class="form-group">
                                {{Form::label('email','Email')}}
                                @if(Auth::guest())
                                {{ Form::email('email','',['placeholder'=>'Email','class'=>'form-control']) }}
                                @else
                                {{ Form::email('email',Auth::user()->email,['placeholder'=>'Email','class'=>'form-control','readonly'=>'readonly']) }}
                                @endif
                                
                                </div>
                                <div class="form-group">
                                {{Form::label('body','Comment')}}
                                {{ Form::textarea('body','',['placeholder'=>'Your Comment','class'=>'form-control']) }}
                                </div>
                                <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="6Lf636UUAAAAAELGEU_8piyhv_ff4T8TsK9_aH47"></div>
                                </div>
                                <div class="form-group">
                                {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                        </div>
                </div><!--/.col-md-8-->
            
                @include("inc.blog-sidebar")
    			
            </div><!--/.row-->
        </div>
    </section><!--/#blog-->
@endsection
