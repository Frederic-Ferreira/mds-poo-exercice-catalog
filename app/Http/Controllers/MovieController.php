<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Builder;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function show($id)
    {
        $movie = Movie::where('id', $id)->first();

        return view('movie', ['movie' => $movie]);
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function list(Request $request)
    {
        $orderBy = $request->query('order_by');
        $order = $request->query('order');
        $genre = $request->query('genre');
        
        $query = Movie::query();
        if (request('order_by') && request('order')) {
            $movies = $query->orderBy($orderBy, $order);
        }

        if (request('genre')) {
            $genre = Genre::where('label', $genre)->first();
            $genre_id = $genre->id;
            $movies = Movie::whereHas('genres', function (Builder $movieQuery) use ($genre_id) {
                $movieQuery->where('genre_id', $genre_id);
            });
        }

        if(request('genre') || request('order_by')) {
            $movies = $movies->simplePaginate(20); 
        } else {
            $movies = $query->simplePaginate(20);
        }

        return view('movies', ['movies' => $movies]);
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function random()
    {
        $movie = Movie::inRandomOrder()->get()->first();

        return view('movie', ['movie' => $movie]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
