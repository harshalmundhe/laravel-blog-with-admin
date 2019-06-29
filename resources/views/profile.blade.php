@extends("layouts.app")

@section("title")
    Profile {{$profile->name}}
@endsection

@section("content")
    
<div class="container m-5 pb-5">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-2">
      <img src="{{ asset('images/user.png') }}"  alt="" class="img-thumbnail">
    </div>
    <div class="col-md-6">
      <blockquote>
        <h5>{{$profile->name}}</h5>
        <small><cite title="Source Title">{{ $profile->state }},{{ $profile->country }}</cite></small>
      </blockquote>
      <p>
        <strong>Experience:</strong> {{$profile->experience}} <br>
        <strong>Total Projects:</strong> {{$profile->totalprojects}}
      </p>
        <p>
            {!! $profile->description !!}
        </p>
    <p>
        <a href="#" class="btn btn-info"><i class="fab fa-facebook fa-2x"></i></a>
        <a href="#" class="btn btn-info"><i class="fab fa-twitter fa-2x"></i></a>
        <a href="#" class="btn btn-info"><i class="fab fa-linkedin fa-2x"></i></a> 
    </p>
        <p>
            <a href="#" class="btn btn-success">Follow</a>
            <a href="#" class="btn btn-success float-right"><img src="{{ asset('images/user-plus.png') }}"> Add Friend</a>
        </p>
    </div>
    
  </div>
</div>
@endsection
