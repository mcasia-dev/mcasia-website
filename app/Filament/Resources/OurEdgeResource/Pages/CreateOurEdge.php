<?php

namespace App\Filament\Resources\OurEdgeResource\Pages;

use App\Filament\Resources\Concerns\HandlesSeoFormData;
use App\Filament\Resources\OurEdgeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOurEdge extends CreateRecord
{
    use HandlesSeoFormData;

    protected static string $resource = OurEdgeResource::class;
}
