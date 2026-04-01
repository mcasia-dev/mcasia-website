<?php

namespace App\Filament\Resources\SalesAvenueCategoryResource\Pages;

use App\Filament\Resources\Concerns\HandlesSeoFormData;
use App\Filament\Resources\SalesAvenueCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSalesAvenueCategory extends EditRecord
{
    use HandlesSeoFormData;

    protected static string $resource = SalesAvenueCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
