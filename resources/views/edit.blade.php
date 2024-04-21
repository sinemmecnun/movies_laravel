@extends('layout')
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card uper">
  <div class="card-header">
    Edit
  </div>
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
      <form method="post" action="{{ route('movies.update', $movie->id) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $movie->name }}"/>
            </div>

            <div class="form-group">
                <label for="genre">Genre:</label>
                <input type="text" class="form-control" name="genre" value="{{ $movie->genre }}"/>
            </div>

            <div class="form-group">
                <label for="rating">Rating:</label>
                <input type="number" class="form-control" name="rating" value="{{ $movie->rating }}"/>
            </div>

            <div class="form-group">
                <label for="date_watched">Date watched:</label>
                <input type="date" class="form-control" name="date_watched" value="{{ $movie->date_watched }}"/>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" name="description" value="{{ $movie->description }}"/>
            </div>

            <div class="form-group">
                <label for="comment">Comment:</label>
                <input type="text" class="form-control" name="comment" value="{{ $movie->comment }}"/>
            </div>

            <div class="form-group" style='display:none'>
              <input type="text" class="form-control" name="userID" value='{{Auth::user()->id}}'/>
            </div>

          <button type="submit" class="btn btn-primary">Update Data</button>
      </form>
  </div>
</div>
@endsection
