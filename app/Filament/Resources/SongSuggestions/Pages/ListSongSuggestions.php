<?php

namespace App\Filament\Resources\SongSuggestions\Pages;

use App\Filament\Resources\SongSuggestions\SongSuggestionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSongSuggestions extends ListRecords
{
    protected static string $resource = SongSuggestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
