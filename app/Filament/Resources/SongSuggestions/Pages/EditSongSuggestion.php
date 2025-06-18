<?php

namespace App\Filament\Resources\SongSuggestions\Pages;

use App\Filament\Resources\SongSuggestions\SongSuggestionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSongSuggestion extends EditRecord
{
    protected static string $resource = SongSuggestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
