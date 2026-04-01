<?php

namespace App\Filament\Resources\ReachUsResource\Pages;

use App\Filament\Resources\Concerns\HandlesSeoFormData;
use App\Filament\Resources\ReachUsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReachUs extends EditRecord
{
    use HandlesSeoFormData;

    protected static string $resource = ReachUsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
