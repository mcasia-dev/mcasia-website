<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\Concerns\HandlesSeoFormData;
use App\Filament\Resources\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEvent extends CreateRecord
{
    use HandlesSeoFormData;

    protected static string $resource = EventResource::class;
}
