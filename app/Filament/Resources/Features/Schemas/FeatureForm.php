<?php

namespace App\Filament\Resources\Features\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FeatureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->columnSpan(1),

                TextInput::make('price')
                    ->label('Price')
                    ->prefix('$')
                    ->numeric()
                    ->required()
                    ->default(0)
                    ->columnSpan(1),

                RichEditor::make('description')
                    ->label('Description')
                    ->columnSpan(2)
            ]);
    }
}
