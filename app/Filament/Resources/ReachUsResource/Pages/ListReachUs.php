<?php

namespace App\Filament\Resources\ReachUsResource\Pages;

use App\Filament\Resources\ReachUsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReachUs extends ListRecords
{
    protected static string $resource = ReachUsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
