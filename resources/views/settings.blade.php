@extends('layouts.app')

@section('content')
    <h1>Account Settings</h1>
        
    {{ Form::open(['action'=>'SettingsController@update','method'=>'POST','enctype'=>'multipart/form-data']) }}
    
    {{ Form::close() }}
@endsection