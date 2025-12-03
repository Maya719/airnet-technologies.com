<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(1),

                Select::make('features')
                    ->label('Features')
                    ->relationship('features', 'name')
                    ->multiple()
                    ->preload()
                    ->columnSpan(1),
            ]);
    }
}
