<?php

namespace App\Filament\Resources\SongSuggestions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SongSuggestionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('artist')
                    ->label('Artist')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('album')
                    ->label('Album')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('spotify_id')
                    ->label('Spotify ID')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('username')
                    ->label('Username')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
