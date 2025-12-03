<?php

namespace App\Filament\Resources\Legals\Pages;

use App\Filament\Resources\Legals\LegalsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLegals extends ListRecords
{
    protected static string $resource = LegalsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
