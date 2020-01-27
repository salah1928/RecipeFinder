@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   @guest
                      <h1>Guest</h1> 
                      <h5>Welcome to Recipe Finder</h5>
                      <div>
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                      </div>
                   @endguest
                    @auth
                        
                  <div>
                    <img style="width:20%" class="m-auto" src="/storage/cover_images/{{Auth::user()->image}}" alt="">
                    <h1>{{Auth::user()->name}}</h1>
                  </div>
                  <div>
                  <p>{{Auth::user()->age}}</p>
                  <p>{{Auth::user()->gender}}</p>
                  <p>{{Auth::user()->city}}</p>
                  </div>
                  @foreach (Auth::user()->recipes as $recipe)
                <h3>{{$recipe->title}}</h3>
                <h3>{{$recipe->created_at}}</h3>

                  @endforeach
                    @endauth
                </div>
          
            </div>
        </div>
    </div>
</div>
@endsection
