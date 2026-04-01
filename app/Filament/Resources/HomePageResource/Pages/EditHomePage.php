<?php

namespace App\Filament\Resources\HomePageResource\Pages;

use App\Filament\Resources\Concerns\HandlesSeoFormData;
use App\Filament\Resources\HomePageResource;
use Filament\Resources\Pages\EditRecord;

class EditHomePage extends EditRecord
{
    use HandlesSeoFormData;

    protected static string $resource = HomePageResource::class;
}
