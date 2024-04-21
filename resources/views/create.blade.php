@extends('layout')
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Movie
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
      <form method="post" action="{{ route('movies.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Movie name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="genre">Genre:</label>
              <input type="text" class="form-control" name="genre"/>
          </div>
          <div class="form-group">
              <label for="rating">Rating (out of 5):</label>
              <input type="number" class="form-control" name="rating"/>
          </div>
          <div class="form-group">
              <label for="date_watched">Date watched:</label>
              <input type="date" class="form-control" name="date_watched"/>
          </div>
          <div class="form-group">
              <label for="description">Description:</label>
              <input type="text" class="form-control" name="description"/>
          </div>
          <div class="form-group">
              <label for="comment">Comment:</label>
              <input type="text" class="form-control" name="comment"/>
          </div>
          <div class="form-group" style='display:none'>
              <input type="text" class="form-control" name="userID" value='{{Auth::user()->id}}'/>
          </div>
          <button type="submit" class="btn btn-primary">Add Movie</button>
      </form>
  </div>
</div>
@endsection
