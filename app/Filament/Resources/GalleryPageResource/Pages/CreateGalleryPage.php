<?php

namespace App\Filament\Resources\GalleryPageResource\Pages;

use App\Filament\Resources\GalleryPageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGalleryPage extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;
    protected static bool $canCreateAnother = false;

    protected static string $resource = GalleryPageResource::class;

    
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),

        ];
    }
}
