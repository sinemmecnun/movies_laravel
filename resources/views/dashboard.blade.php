<!-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    @section('content')
    @if(session()->get('success'))
        <div class="alert alert-success">
        {{ session()->get('success') }}
        </div><br />
    @endif
    @if(session()->get('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div><br />
    @endif
    <a href="{{ route('movies.create')}}" class="btn btn-success">ADD</a>
    <div class="float-end">
        {{ Auth::user()->name }}
        <a href="{{ route('logout') }}" class="btn btn-dark" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Name</td>
                <td>Genre</td>
                <td>Rating</td>
                <td>Description</td>
                <td>Comment</td>
                <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
            <tr>
                <td>{{$movie->name}}</td>
                <td>{{$movie->genre}}</td>
                <td>
                    <!-- {{$movie->score}} -->
                @for ($i = 0; $i < $movie->rating; $i+=1)
                    <img src="https://cdn-icons-png.flaticon.com/128/1828/1828884.png" width="25px">
                @endfor
                </td>
                <td>{{$movie->description}}</td>
                <td>{{$movie->comment}}</td>
                <td>
                    @if(Auth::user()->isAdmin==1)
                    <a href="{{ route('movies.edit', $movie->id)}}" class="btn btn-primary">Edit</a></td>
                    @endif
                <td>
                    @if(Auth::user()->isAdmin==1)
                    <form action="{{ route('movies.destroy', $movie->id)}}" method="post" onsubmit="return confirm('The record will be deleted');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $movies->links() }}
    <div>
    @endsection
</x-app-layout> -->
