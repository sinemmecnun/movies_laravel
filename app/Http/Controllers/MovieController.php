<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::paginate(14);
        return view('index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'genre' => 'required|max:255',
            'rating' => 'required|integer|between:1,5',
            'description' => 'required|max:255',
            'comment' => 'required|max:255',
            'date_watched' => 'required',
            'userID' => 'required|integer'
        ]);

        $movie = Movie::create($validatedData);

        return redirect('/movies')->with('success', 'The movie is saved to your watchlist');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Movie::findOrFail($id);
        return view('view', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie = Movie::findOrFail($id);
        return view('edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'genre' => 'required|max:255',
            'rating' => 'required|integer|between:1,5',
            'description' => 'required|max:255',
            'comment' => 'required|max:255',
            'date_watched' => 'required',
            'userID' => 'required|integer'
        ]);
        Movie::whereId($id)->update($validatedData);

        return redirect('/movies')->with('success', 'The movie\'s data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return redirect('/movies')->with('success', 'The movie has been deleted from your watchlist');
    }
}
