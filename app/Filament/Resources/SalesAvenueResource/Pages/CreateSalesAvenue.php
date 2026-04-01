<?php

namespace App\Filament\Resources\SalesAvenueResource\Pages;

use App\Filament\Resources\SalesAvenueResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSalesAvenue extends CreateRecord
{
    protected static string $resource = SalesAvenueResource::class;

    protected array $seoData = [];

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->seoData = $data['seo'] ?? [];

        unset($data['seo']);

        return $data;
    }

    protected function afterCreate(): void
    {
        $seoData = array_filter($this->seoData, fn ($value) => filled($value));

        if ($seoData !== []) {
            $this->record->saveSeo($this->seoData);
        }
    }
}
