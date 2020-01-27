@push('styles')
<link href='{{asset('css/recipeshow.css')}}' rel='stylesheet'>
    
@endpush
@extends('layouts.app')

@section('content')

<recipe-show :recipe="{{$recipe_info}}" :steps="{{$steps}}" :allow="{{$allow}}" :user="{{$user}}" :comments="{{ json_encode($comments) }}"></recipe-show>



{{-- <a href="/recipes">back</a>
    <h1>Title: {{$recipe_info->title}}</h1>
    <h3>Description: {{$recipe_info->description}}</h3>
@foreach (json_decode($recipe_info->ingredients) as $item)
   <h4> {{$item}}</h4>
@endforeach
<img width="50%" src="/recipe_images/{{$recipe_info->image}}" alt="">
@auth
@if (Auth::user()->id == $recipe_info->user_id)
<a href="{{ route('edit',$recipe_info->id)}}" class="btn btn-primary">Edit</a>
<form action="{{ route('destroy', $recipe_info->id)}}" method="post">
    {{ csrf_field() }}
    @method('DELETE')
    <button class="btn btn-danger" type="submit">Delete</button>
  </form>
@endif
@endauth
<h5>{{$user}}</h5>
@foreach ($steps as $step)
<h5>STEP :{{$step->name}}</h5>
<h6>{{$step->description}}</h6>
<img width="200px" src="/step_images/{{$step->image}}" alt="">
@endforeach
<form action="{{route('commentadd')}}" method="post">
<textarea name="content" id="" cols="30" rows="10"></textarea>
<button type="submit">comment</button>
</form>
@foreach ($comments as $comment)
<h5>{{$comment->user->name}} said:</h5>
<p>{{$comment->content}}</p>
@endforeach --}}
@endsection