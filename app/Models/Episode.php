<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Title
{ 
    use HasFactory; 


    public $type = 'tvEpisode';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

        public function genres()
    {
        return $this->belongsToMany(Genre::class, 'titles_genres', 'title_id', 'genre_id');
    }

    public function series()
    {
        return $this->belongsToMany(Series::class, 'titles_episodes', 'episode_id', 'title_id')->withPivot('seasonNumber', 'episodeNumber');
    }
}

