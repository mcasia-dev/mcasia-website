<?php

namespace App\Filament\Resources\OurChannelResource\Pages;

use App\Filament\Resources\Concerns\HandlesSeoFormData;
use App\Filament\Resources\OurChannelResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOurChannel extends CreateRecord
{
    use HandlesSeoFormData;

    protected static string $resource = OurChannelResource::class;
}
