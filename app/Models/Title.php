<?php

namespace App\Models;

use App\Models\Scopes\GlobalScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory; 


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'titles';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public $type = ['movie', 'tvEpisode', 'tvSeries', 'tvMiniSeries'];

            /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {

        static::addGlobalScope(new GlobalScope);
    }

    /**
     * The roles that belong to the user.
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movies_genres');
    }

    public function series()
    {
        return $this->belongsToMany(Series::class, 'titles_episodes', 'title_id', 'episode_id');
    }
}
