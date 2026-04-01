<?php

namespace App\Filament\Resources\SalesAvenueResource\Pages;

use App\Filament\Resources\SalesAvenueResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSalesAvenue extends EditRecord
{
    protected static string $resource = SalesAvenueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected array $seoData = [];

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['seo'] = $this->record->seo?->toArray() ?? [];

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->seoData = $data['seo'] ?? [];

        unset($data['seo']);

        return $data;
    }

    protected function afterSave(): void
    {
        $seoData = array_filter($this->seoData, fn ($value) => filled($value));

        if ($seoData === []) {
            $this->record->deleteSeo();

            return;
        }

        $this->record->saveSeo($this->seoData);
    }
}
