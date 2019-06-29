@extends("layouts.app")

@section("title")
    Search: {{ $search }}
@endsection

@section("content")

        

<section id="blog">
        
        <div class="blog">
            <div class="row">
                 <div class="col-md-8">
                 <h2>Search Result for {{ $search }}</h2>
                    @if(count($posts)>0)
                    @foreach($posts as $post)
                    <div class="blog-item">
                        <div class="row">
                            
                            <div class="col-xs-12 col-sm-10 blog-content">
                                <a href="/posts/{{$post->slug}}"></a>
                                <h2><a href="/posts/{{$post->slug}}">{{$post->title}}</a></h2>
                                <h3>{{$post->excerpt}}...</h3>
                                <a class="btn btn-primary readmore" href="/posts/{{$post->slug}}">Read More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>    
                    </div><!--/.blog-item-->
                    @endforeach
                        
                    @else
                        <p>No Posts Found</p>
                    @endif    
                </div><!--/.col-md-8-->

                
                @include("inc.blog-sidebar")
    			
            </div><!--/.row-->
        </div>
    </section><!--/#blog-->


@endsection