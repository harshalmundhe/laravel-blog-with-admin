@extends("layouts.app")
@section("content")
    
    <h1>Create Post</h1>
    
    {{ Form::open(['action'=>'PostsController@store','method'=>'POST','enctype'=>'multipart/form-data']) }}
    <div class="form-group">
    {{Form::label('title','Title')}}
    {{ Form::text('title','',['placeholder'=>'Title','class'=>'form-control']) }}
    </div>
    <div class="form-group">
    {{Form::label('body','Body')}}
    {{ Form::textarea('body','',['id'=>'article-ckeditor','placeholder'=>'Body','class'=>'form-control']) }}
    </div>
    <div class="form-group">
    {{Form::label('cover image','Cover Image')}}
    {{Form::file('cover_image',['class'=>'form-control-file'])}}
    </div>
    <div class="form-group">
    {{Form::label('category','Category')}}
    {{Form::select('category',$categories,null,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    </div>
    {{ Form::close() }}
@endsection

@section("include_js")
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection 