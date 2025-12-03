<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ServicesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->columnSpan(1),

                Select::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->required()
                    ->columnSpan(1),

                RichEditor::make('description')
                    ->label('Description')
                    ->columnSpan(2),

                FileUpload::make('thumbnail')
                    ->label('Thumbnail URL')
                    ->disk('public')
                    ->directory('services/thumbnails')
                    ->required()
                    ->columnSpan(1),

                TextInput::make('price')
                    ->label('Price')
                    ->numeric()
                    ->required()
                    ->default(0)
            ]);
    }
}
