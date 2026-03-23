<?php

namespace App\Filament\Resources\OurChannelResource\Pages;

use App\Filament\Resources\OurChannelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOurChannel extends EditRecord
{
    protected static string $resource = OurChannelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
