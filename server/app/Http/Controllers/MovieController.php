<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    //

    public function index(Request $request)
    {
        $movies = \App\Models\Movie::query();

        if ($request->has('title')) {
            $movies->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->has('release_date')) {
            $movies->where('release_date', $request->release_date);
        }

        return response()->json([
            'movies' => $movies->get(),
        ]);
    }

    public function show($id)
    {
        $movie = \App\Models\Movie::find($id);

        if (!$movie) {
            return response()->json([
                'message' => 'Movie not found',
            ], 404);
        }

        return response()->json([
            'movie' => $movie,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'release_date' => 'required|date',
            'poster_path' => 'required|string',
            'backdrop_path' => 'required|string',
            'overview' => 'required|string',
        ]);

        $movie = \App\Models\Movie::create($request->all());

        return response()->json([
            'message' => 'Successfully created movie',
            'movie' => $movie,
        ]);
    }

    public function update(Request $request, \App\Models\Movie $movie)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'release_date' => 'required|date',
            'poster_path' => 'required|string',
            'backdrop_path' => 'required|string',
            'overview' => 'required|string',
        ]);

        $movie->update($request->all());

        return response()->json([
            'message' => 'Successfully updated movie',
            'movie' => $movie,
        ]);
    }

    public function destroy(\App\Models\Movie $movie)
    {
        $movie->delete();

        return response()->json([
            'message' => 'Successfully deleted movie',
        ]);
    }

}
