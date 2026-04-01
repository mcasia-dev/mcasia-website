<?php

namespace App\Filament\Resources\OurStoryResource\Pages;

use App\Filament\Resources\OurStoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOurStory extends CreateRecord
{
    protected static string $resource = OurStoryResource::class;

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
