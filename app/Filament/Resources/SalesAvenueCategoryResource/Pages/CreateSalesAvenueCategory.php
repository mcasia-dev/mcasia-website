<?php

namespace App\Filament\Resources\SalesAvenueCategoryResource\Pages;

use App\Filament\Resources\Concerns\HandlesSeoFormData;
use App\Filament\Resources\SalesAvenueCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSalesAvenueCategory extends CreateRecord
{
    use HandlesSeoFormData;

    protected static string $resource = SalesAvenueCategoryResource::class;
}
