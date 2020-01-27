@push('styles')
<link href='{{asset('css/recipelist.css')}}' rel='stylesheet'>
@endpush

@extends('layouts.app')
   
@section('content')

<recipe-list></recipe-list>


  {{-- <div id="listrecipes">
   <a href="{{ route('create') }}" class="btn btn-success mb-2">Add</a> 
   <br>
    <div class="">
       <div class="recipes">
 
               @foreach($recipes as $recipe)
                  <div class="recipe">
                     
                     <img  src="/recipe_images/{{$recipe->image}}" alt="">
                     <div>
                        <h2>{{ $recipe->title }}</h2>
                        <h4>{{ \Illuminate\Support\Str::limit($recipe->description, 50, $end='...') }}</h4>      
                     </div>
                     <div>
                        <a href="{{ route('show',$recipe->id)}}" class="btn btn-primary">Show</a>
                        <h6>{{ date('Y-m-d', strtotime($recipe->created_at)) }}</h6>
                     
                     </div>
                 </div>
               @endforeach
           
            </div> 
            <div id="pagination">
               
               {!! $recipes->links() !!}

            </div>
    </div>
  </div> --}}
 @endsection