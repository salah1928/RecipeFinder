@extends('layouts.app')
@section('content')
<h1>{{$name}}</h1>
<h1>{{$email}}</h1>
<h1>{{$age}}</h1>
<h1>{{$gender}}</h1>
<h1>{{$city}}</h1>
<img width="50%" src="/storage/cover_images/{{$image}}" alt="">
@endsection