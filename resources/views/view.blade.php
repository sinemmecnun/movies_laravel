@extends('layout')
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card uper">
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
        <div class="form-group">
            <label for="name">Name:</label>
            <p>{{ $movie->name }}</p>
        </div>

        <div class="form-group">
            <label for="genre">Genre:</label>
            <p>{{ $movie->genre }}</p>
        </div>

        <div class="form-group">
            <label for="rating">Rating:</label>
            <p>
                @for ($i = 0; $i < $movie->rating; $i+=1)
                    <img src="https://cdn-icons-png.flaticon.com/128/1828/1828884.png" width="25px">
                @endfor
            </p>
        </div>

        <div class="form-group">
            <label for="date_watched">Date watched:</label>
            <p>{{ $movie->date_watched }}</p>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <p>{{ $movie->description }}</p>
        </div>

        <div class="form-group">
            <label for="comment">Comment:</label>
            <p>{{ $movie->comment }}</p>
        </div>

        @if(Auth::user()->id == $movie->userID)
        <div class="btn-group">
            <a href="{{ route('movies.edit', $movie->id)}}" class="btn btn-primary">Edit</a>

            <form action="{{ route('movies.destroy', $movie->id)}}" method="post" onsubmit="return confirm('The record will be deleted');">
            @csrf
            @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div>
        @endif
  </div>
</div>
@endsection
