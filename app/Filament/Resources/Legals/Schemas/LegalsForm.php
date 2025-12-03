<?php

namespace App\Filament\Resources\Legals\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LegalsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(table: 'legals', column: 'slug', ignoreRecord: true)
                    ->maxLength(255)
                    ->columnSpan(1),
                TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(1),
                RichEditor::make('content')
                    ->label('Content')
                    ->required()
                    ->columnSpan(2),
            ]);
    }
}
