<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Series extends Title
{
    use HasFactory;


    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public $type = ['tvSeries', 'tvMiniSeries'];

    public function episodes()
    {
        return $this->belongsToMany(Episode::class, 'titles_episodes', 'title_id', 'episode_id')->withPivot('seasonNumber', 'episodeNumber');
    }
}

