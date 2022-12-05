<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;
use App\Models\Episode;
use App\Models\Title;
use Illuminate\Database\Eloquent\Builder;

class SeriesController extends Controller
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
        $serie = Series::where('id', $id)->first();
        $serieId = $serie->id;
        $episodes = $serie->episodes;

        // $episodes = Episode::where('series_id', $serieId)->simplePaginate(20);
        // 'serieId' => $serieId

        return view('serie', ['serie' => $serie, 'episodes' => $episodes, 'serieId' => $serieId]);
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function season($id, $season_num)
    {
        $serie = Series::where('id', $id)->first();
        $serieId = $serie->id;
        $episodes = $serie->episodes()->wherePivot('seasonNumber', $season_num)->simplePaginate(20);

        return view('episodes', ['episodes' => $episodes, 'serieId' => $serieId]);
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function episode($id, $season_num, $episode_num)
    {
        $serie = Series::where('id', $id)->first();
        $serieId = $serie->id;
        $episode = $serie->episodes()->wherePivot('seasonNumber', $season_num)->wherePivot('episodeNumber', $episode_num)->first();

        return view('episode', ['episode' => $episode, 'serieId' => $serieId]);
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
        
        $query = Series::query();
        if (request('order_by') && request('order')) {
            $series = $query->orderBy($orderBy, $order);
        } 
        
        if(request('genre') || request('order_by')) {
            $series = $series->simplePaginate(20); 
        } else {
            $series = $query->simplePaginate(20);
        }
        return view('series', ['series' => $series]);
    }

            /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function random()
    {
        $serie = Series::inRandomOrder()->get()->first();

        return view('randomSerie', ['serie' => $serie]);
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
