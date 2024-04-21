@extends('layout')
@section('content')
<style>
.uper {
    margin-top: 40px;
}
</style>
<div class="uper">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
    @endif

    @if(session()->get('error'))
    <div class="antialiased">
        {{ session()->get('error') }}
    </div><br />
    @endif

    <a href="{{ route('movies.create')}}" class="btn btn-success">ADD</a>
    <div class="float-end" style='display:inline-block'>
        Hello, {{ Auth::user()->name }}
        <a href="{{ route('logout') }}" class="btn btn-dark" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    <div class='grid text-center' style='display:flex'>
        @foreach($movies as $movie)
            @if($movie->userID == Auth::user()->id || Auth::user()->isAdmin==1)
            <div class="card g-col-4">
                <div class="card-body">
                    <h2>{{$movie->name}}</h2>
                    <p>{{$movie->genre}}</p>
                    <p>
                    @for ($i = 0; $i < $movie->rating; $i+=1)
                        <img src="https://cdn-icons-png.flaticon.com/128/1828/1828884.png" width="25px">
                    @endfor
                    </p>
                    <p>Date watched: {{$movie->date_watched}}</p>
                    <a href="{{ route('movies.show', $movie->id)}}" class="btn btn-primary">View</a>
                </div>
            </div>
            @endif
        @endforeach
    </div>
    {{ $movies->links() }}
<div>
@endsection
