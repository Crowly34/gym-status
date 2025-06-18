<?php

namespace App\Filament\Resources\SongSuggestions;

use App\Filament\Resources\SongSuggestions\Pages\CreateSongSuggestion;
use App\Filament\Resources\SongSuggestions\Pages\EditSongSuggestion;
use App\Filament\Resources\SongSuggestions\Pages\ListSongSuggestions;
use App\Filament\Resources\SongSuggestions\Schemas\SongSuggestionForm;
use App\Filament\Resources\SongSuggestions\Tables\SongSuggestionsTable;
use App\Models\SongSuggestion;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SongSuggestionResource extends Resource
{
    protected static ?string $model = SongSuggestion::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SongSuggestionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SongSuggestionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSongSuggestions::route('/'),
            'create' => CreateSongSuggestion::route('/create'),
            'edit' => EditSongSuggestion::route('/{record}/edit'),
        ];
    }
}
