@extends('layouts.app')
@section('content')
@foreach ($users as $user)
<div id="listusers">
    <div id="listshit">
        <a href="{{ route('usershow',$user->id)}}"><h1>{{$user->name}}</h1></a>
    <h1>{{$user->city}}</h1>
    <img src="/storage/cover_images/{{$user->image}}" alt="">
    </div>
</div>
@endforeach
@endsection