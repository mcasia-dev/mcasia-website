<?php

namespace App\Filament\Resources\BrandResource\Pages;

use App\Filament\Resources\BrandResource;
use App\Filament\Resources\Concerns\HandlesSeoFormData;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBrand extends CreateRecord
{
    use HandlesSeoFormData;

    protected static string $resource = BrandResource::class;
}
