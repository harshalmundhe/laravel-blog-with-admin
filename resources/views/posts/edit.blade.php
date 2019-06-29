@extends("layouts.app")
@section("content")
    
    <h1>Edit Post</h1>
    {{ Form::open(['action'=>['PostsController@update',$post->id],'method'=>'POST','enctype'=>'multipart/form-data']) }}
    <div class="form-group">
    {{Form::label('title','Title')}}
    {{ Form::text('title',$post->title,['placeholder'=>'Title','class'=>'form-control']) }}
    </div>
    <div class="form-group">
    {{Form::label('body','Body')}}
    {{ Form::textarea('body',$post->body,['id'=>'article-ckeditor','placeholder'=>'Body','class'=>'form-control']) }}
    </div>
    <div class="form-group">
    {{Form::file('cover_image')}}
    </div>
        <div class="form-group">
    {{Form::label('category','Category')}}
    {{Form::select('category',$categories,$post->category,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {{ Form::close() }}
    </div>
@endsection

@section("include_js")
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection    