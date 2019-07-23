@extends("layouts.app")

@section("title")
    Profile {{$profile->name}}
@endsection

@section("content")
    <div class="container">
<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 image-section">
                <img src="https://png.pngtree.com/thumb_back/fw800/back_pic/00/08/57/41562ad4a92b16a.jpg">
            </div>
            <div class="row user-left-part">
                <div class="col-md-3 col-sm-3 col-xs-12 user-profil-part pull-left">
                    <div class="row ">
                        <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                            <img src="https://www.jamf.com/jamf-nation/img/default-avatars/generic-user-purple.png" class="rounded-circle">
                           
                        </div>
                        @if(!Auth::guest())
                            @if(Auth::user()->id != $profile->id) 
                        <div class="col-md-12 col-sm-12 col-xs-12 user-detail-section1 text-center">
                            <a href="#" class="btn btn-info btn-block follow"><i class="fas fa-user-plus"></i> Add Friend</a>
                            <br>
                            <div class="dropdown">
                                <button class="btn btn-info btn-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-bell"></i> Following
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item text-dark" href="#">Unfollow</a>
                                </div>
                            </div>
                        </div>
                            @endif
                        @endif
                        
                       
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12 pull-right profile-right-section">
                    <div class="row profile-right-section-row">
                        <div class="col-md-12 profile-header">
                            <div class="row">
                                <div class="col-md-8 col-sm-6 col-xs-6 profile-header-section1 pull-left">
                                    <h2>{{$profile->name}}</h2>
                                    <h3>{{ $profile->profession }}</h3>
                                    <i>{{ $profile->state }},{{ $profile->country }}</i>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 profile-header-section1">
                                    <strong>Share</strong> <a href="#" class="btn btn-outline-secondary"><i class="fab fa-facebook"></i></a>
                                    <a href="#" class="btn btn-outline-secondary"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="btn btn-outline-secondary"><i class="fab fa-linkedin"></i></a>
                                        
                                    <div class="row user-detail-row">
                                    <div class="col-md-12 col-sm-12 user-detail-section2 text-center">
                                    <div class="border"></div>
                                    <p>FOLLOWER</p>
                                    <span>320</span>
                                    </div>                           
                                    </div>
                                    <div class="row user-detail-row">
                                    <div class="col-md-12 col-sm-12 user-detail-section2 text-center">
                                    <div class="border"></div>
                                    <p>FRIEND</p>
                                    <span>320</span>
                                    </div>                           
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                       
                                                
                                    <div class="row">
                                            <div class="col-md-3">
                                                <label><strong>Experience</strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$profile->experience}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label><strong>Total Projects</strong></label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$profile->totalprojects}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                 {!! $profile->description !!}
                                            </div>
                                        </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section("contents")
<div class="container mt-5">
    <div class="row">
    <div class="col-md-12 text-right profile-image" style='background-image: url("https://mdbootstrap.com/img/Photos/Horizontal/Nature/full page/img(20).jpg");'>
      <img src="{{ asset('images/user.png') }}"  alt="" class="img-thumbnail profile-card">
    </div>
    </div>
  <div class="row">
    <div class="col-md-12">
    <div class="text-center">
      <blockquote>
        <h5>{{$profile->name}}</h5>
        <small><cite title="Source Title">{{ $profile->state }},{{ $profile->country }}</cite></small>
      </blockquote>
      <p>
        <strong>Experience:</strong> {{$profile->experience}} <br>
        <strong>Total Projects:</strong> {{$profile->totalprojects}}
      </p>
    </div>
        <p>
            {!! $profile->description !!}
        </p>
    <p>
        <a href="#" class="btn btn-outline-secondary"><i class="fab fa-facebook"></i></a>
        <a href="#" class="btn btn-outline-secondary"><i class="fab fa-twitter"></i></a>
        <a href="#" class="btn btn-outline-secondary"><i class="fab fa-linkedin"></i></a> 
    </p>
        @if(!Auth::guest())
            @if(Auth::user()->id != $profile->id)
                
                <div class="row">
                    <div class="col-md-6">
                    <div class="dropdown">
                      <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell"></i> Following
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item text-dark" href="#">Unfollow</a>
                      </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <a href="#" class="btn btn-info float-right"><i class="fas fa-user-plus"></i> Add Friend</a>
                    </div>
                </div>
            @endif
        @endif
    </div>
    
  </div>
</div>
@endsection
