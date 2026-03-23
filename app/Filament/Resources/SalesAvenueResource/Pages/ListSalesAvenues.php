<?php

namespace App\Filament\Resources\SalesAvenueResource\Pages;

use App\Filament\Resources\SalesAvenueResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSalesAvenues extends ListRecords
{
    protected static string $resource = SalesAvenueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
