<?php

namespace App\Filament\Resources\ProductCategoryResource\Pages;

use App\Filament\Resources\Concerns\HandlesSeoFormData;
use App\Filament\Resources\ProductCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProductCategory extends CreateRecord
{
    use HandlesSeoFormData;

    protected static string $resource = ProductCategoryResource::class;
}
