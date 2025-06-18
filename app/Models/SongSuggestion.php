<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SongSuggestion extends Model
{
    protected $fillable = [
        'title',
        'artist',
        'album',
        'cover',
        'spotify_id',
        'user_id',
        'username',
        'spotify_url',
    ];
}
