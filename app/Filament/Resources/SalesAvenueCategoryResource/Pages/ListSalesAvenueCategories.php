<?php

namespace App\Filament\Resources\SalesAvenueCategoryResource\Pages;

use App\Filament\Resources\SalesAvenueCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSalesAvenueCategories extends ListRecords
{
    protected static string $resource = SalesAvenueCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
