<?php

namespace App\Filament\Resources\OurEdgeResource\Pages;

use App\Filament\Resources\Concerns\HandlesSeoFormData;
use App\Filament\Resources\OurEdgeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOurEdge extends EditRecord
{
    use HandlesSeoFormData;

    protected static string $resource = OurEdgeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
