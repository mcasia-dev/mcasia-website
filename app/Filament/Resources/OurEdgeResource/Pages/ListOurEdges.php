<?php

namespace App\Filament\Resources\OurEdgeResource\Pages;

use App\Filament\Resources\OurEdgeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOurEdges extends ListRecords
{
    protected static string $resource = OurEdgeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
