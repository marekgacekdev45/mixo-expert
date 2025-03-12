<?php

namespace App\Filament\Resources\GalleryPageResource\Pages;

use App\Filament\Resources\GalleryPageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGalleryPage extends EditRecord
{

    use EditRecord\Concerns\Translatable;

    protected static string $resource = GalleryPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
