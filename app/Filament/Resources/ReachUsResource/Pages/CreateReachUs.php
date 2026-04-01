<?php

namespace App\Filament\Resources\ReachUsResource\Pages;

use App\Filament\Resources\Concerns\HandlesSeoFormData;
use App\Filament\Resources\ReachUsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateReachUs extends CreateRecord
{
    use HandlesSeoFormData;

    protected static string $resource = ReachUsResource::class;
}
