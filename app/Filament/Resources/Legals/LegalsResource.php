<?php

namespace App\Filament\Resources\Legals;

use App\Filament\Resources\Legals\Pages\CreateLegals;
use App\Filament\Resources\Legals\Pages\EditLegals;
use App\Filament\Resources\Legals\Pages\ListLegals;
use App\Filament\Resources\Legals\Schemas\LegalsForm;
use App\Filament\Resources\Legals\Tables\LegalsTable;
use App\Models\Legal;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class LegalsResource extends Resource
{
    protected static ?string $model = Legal::class;
    protected static string|UnitEnum|null $navigationGroup = 'Settings';

    public static function form(Schema $schema): Schema
    {
        return LegalsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LegalsTable::configure($table);
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
            'index' => ListLegals::route('/'),
            'create' => CreateLegals::route('/create'),
            'edit' => EditLegals::route('/{record}/edit'),
        ];
    }
}
