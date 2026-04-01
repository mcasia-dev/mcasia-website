<?php

namespace App\Filament\Resources\OurImpactResource\Pages;

use App\Filament\Resources\Concerns\HandlesSeoFormData;
use App\Filament\Resources\OurImpactResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOurImpact extends CreateRecord
{
    use HandlesSeoFormData;

    protected static string $resource = OurImpactResource::class;
}
