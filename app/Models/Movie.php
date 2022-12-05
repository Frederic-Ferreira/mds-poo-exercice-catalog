<?php

namespace App\Models;

use App\Models\Scopes\GlobalScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Title
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

        /**
     * Indicates if the model should be timestamped.
     *
     * @var string
     */
    public $type = 'movie';

    /**
     * The roles that belong to the user.
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'titles_genres', 'title_id', 'genre_id');
    }
}
