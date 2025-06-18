<?php

namespace App\Filament\Resources\SongSuggestions\Pages;

use App\Filament\Resources\SongSuggestions\SongSuggestionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSongSuggestion extends CreateRecord
{
    protected static string $resource = SongSuggestionResource::class;
}
