
<aside class="col-md-4">
    <div class="widget search">
        {{ Form::open(['action'=>'PostsController@searchPost','method'=>'POST']) }}
            <div class="input-group">
                <input type="text" class="form-control search_box" name="search_box" autocomplete="off" placeholder="Search Here">
                <div class="input-group-append">
                  <button class="btn btn-secondary" type="submit">
                    <i class="fa fa-search"></i>
                  </button>
                </div>
              </div>
        {{ Form::close() }}
    </div><!--/.search-->
    
    <div class="widget categories">
        <h3>Recent Comments</h3>
        <div class="row">
            <div class="col-sm-12">
                
                @foreach ($sidebardata['recent_comments'] as $recent_comments)
                <div class="single_comments">
                    <img src="images/blog/avatar3.png" alt=""  />
                    <p>{!! str_limit($recent_comments->body,50) !!}</p>
                    <div class="entry-meta small muted">
                        <span>By <a href="profile/{{ $recent_comments->user_id }}">{{ $recent_comments->name }}</a></span <span>On <a href="{{ $recent_comments->slug }}">{{ $recent_comments->title }}</a></span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>                     
    </div><!--/.recent comments-->
     

    <div class="widget categories">
        <h3>Categories</h3>
        <div class="row">
            <div class="col-sm-6">
                <ul class="blog_category">
                    @foreach($sidebardata['categories'] as $category)
                    <li><a href="category/{{ $category->id }}">{{ $category->category }} <span class="badge">{{ $category->count }}</span></a></li>
                    @endforeach
                </ul>
            </div>
        </div>                     
    </div><!--/.categories-->
    
    <div class="widget archieve">
        <h3>Archieve</h3>
        <div class="row">
            <div class="col-sm-12">
                <ul class="blog_archieve">
                    @foreach($sidebardata['archieves'] as $archieve)
                    <li><a href="archieve/{{ $archieve->year }}"><i class="fa fa-angle-double-right"></i> {{ $archieve->year }} <span class="float-right">({{ $archieve->count }})</span></a></li>
                    @endforeach
                </ul>
            </div>
        </div>                     
    </div><!--/.archieve-->
    
    <div class="widget tags">
        <h3>Tag Cloud</h3>
        <ul class="tag-cloud">
            @foreach($sidebardata['tags'] as $tag)
            <li><a class="btn btn-xs btn-primary" href="tag/{{$tag->id}}">{{ ucfirst($tag->name) }}</a></li>
            @endforeach
        </ul>
    </div><!--/.tags-->
    
    <div class="widget blog_gallery">
        <h3>Our Gallery</h3>
        <ul class="sidebar-gallery">
            <li><a href="#"><img src="images/blog/gallery1.png" alt="" /></a></li>
            <li><a href="#"><img src="images/blog/gallery2.png" alt="" /></a></li>
            <li><a href="#"><img src="images/blog/gallery3.png" alt="" /></a></li>
            <li><a href="#"><img src="images/blog/gallery4.png" alt="" /></a></li>
            <li><a href="#"><img src="images/blog/gallery5.png" alt="" /></a></li>
            <li><a href="#"><img src="images/blog/gallery6.png" alt="" /></a></li>
        </ul>
    </div><!--/.blog_gallery-->
</aside>  