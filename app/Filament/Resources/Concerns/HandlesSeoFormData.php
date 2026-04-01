<?php

namespace App\Filament\Resources\Concerns;

trait HandlesSeoFormData
{
    protected array $seoData = [];

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->seoData = $data['seo'] ?? [];

        unset($data['seo']);

        return $data;
    }

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

    protected function afterCreate(): void
    {
        $seoData = array_filter($this->seoData, fn ($value) => filled($value));

        if ($seoData !== []) {
            $this->record->saveSeo($this->seoData);
        }
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
