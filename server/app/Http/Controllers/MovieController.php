<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{

    /**
     * @lrd:start
     * Return all the movies with filter
     * @lrd:end
     */
    public function index(Request $request)
    {
        $filters = ['title', 'release_date', 'genre_id'];
        $movies = \App\Models\Movie::query();

        foreach ($filters as $filter) {
            if ($request->has($filter)) {
                $movies->where($filter, $request->$filter);
            }
        }

        return response()->json([
            'movies' => $movies->paginate(10),
        ]);
    }


    /**
     * @lrd:start
     * Return a specific movie
     * @lrd:end
     */
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

    /**
     * @LRDparam title string|max:255
     * @LRDparam release_date date
     * @LRDparam poster_path string
     * @LRDparam backdrop_path string
     * @LRDparam overview string
     */
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

    /**
     * @LRDparam title string|max:255
     * @LRDparam release_date date
     * @LRDparam poster_path string
     * @LRDparam backdrop_path string
     * @LRDparam overview string
     */
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

    /**
     * @lrd:start
     * Delete a specific movie
     * @lrd:end
     */
    public function destroy(\App\Models\Movie $movie)
    {
        $movie->delete();

        return response()->json([
            'message' => 'Successfully deleted movie',
        ]);
    }

}
