<?php

namespace App\Filament\Resources\Services;

use App\Filament\Resources\Services\Pages\CreateServices;
use App\Filament\Resources\Services\Pages\EditServices;
use App\Filament\Resources\Services\Pages\ListServices;
use App\Filament\Resources\Services\Schemas\ServicesForm;
use App\Filament\Resources\Services\Tables\ServicesTable;
use App\Models\Service;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class ServicesResource extends Resource
{
    protected static ?string $model = Service::class;
    protected static string|UnitEnum|null $navigationGroup = 'Services';

    public static function form(Schema $schema): Schema
    {
        return ServicesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServicesTable::configure($table);
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
            'index' => ListServices::route('/'),
            'create' => CreateServices::route('/create'),
            'edit' => EditServices::route('/{record}/edit'),
        ];
    }
}
